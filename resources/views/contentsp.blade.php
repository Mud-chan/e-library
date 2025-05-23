@extends('components.spheader')
@section('main')
<link rel="stylesheet" href="{{ asset('assets/css/admin_style.css') }}">
<style>
    .autocomplete-box {
        position: absolute;
        background: #fff;
        max-height: 300px;
        overflow-y: auto;
        color: black;
        z-index: 999;
        width: 50%;
        text-decoration: none;
        left: 50%;
        transform: translateX(-50%);
        top: 10%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 6px;
    }

    .autocomplete-box .item {
        display: flex;
        align-items: center;
        padding: 10px;
        color: black;
        cursor: pointer;
        border-bottom: 1px solid #eee;
        text-decoration: none;
        font-size: 150%;
    }

    .autocomplete-box .item:hover {
        background: #f0f0f0;
    }

    .autocomplete-box .item img {
        width: 60px;
        height:100px;
        object-fit: cover;
        margin-right: 10px;
    }
</style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search-input').on('input', function() {
                let query = $(this).val();
                if (query.length >= 2) {
                    $.ajax({
                        url: '{{ route('ajax.cari.buku') }}',
                        method: 'GET',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            let resultsBox = $('#search-results');
                            resultsBox.empty();

                            if (data.length === 0) {
                                resultsBox.append(
                                    '<div class="item">Buku tidak ditemukan</div>');
                            } else {
                                data.forEach(item => {
                                    resultsBox.append(`
                                    <a href="/detail-buku-siswa/${item.id}" class="item">
                                        <img src="/uploaded_files/${item.thumb}" alt="">
                                        <div>
                                            <strong>${item.judul}</strong><br>
                                            <small>${item.kategori}, ${item.tingkatan}</small>
                                        </div>
                                    </a>
                                `);
                                });
                            }

                            resultsBox.show();
                        }
                    });
                } else {
                    $('#search-results').hide();
                }
            });

            $(document).click(function(e) {
                if (!$(e.target).closest('#search-input, #search-results').length) {
                    $('#search-results').hide();
                }
            });
        });
    </script>

<header class="header">
    <section class="flex">
        <a href="{{ url('/dashboardsp') }}" class="logo">Admin</a>

        <div class="search-type-selector">
            <button type="button" class="search-type-btn active" onclick="setSearchType('basic')">Biasa</button>
            <button type="button" class="search-type-btn" onclick="setSearchType('gcse')">Lanjutan</button>
        </div>

        <form id="basicSearchForm" action="{{ route('caricontentsp') }}" method="post" class="search-form">
            @csrf
            <input type="text" name="search"  id="search-input" placeholder="Cari Materi..." required maxlength="100">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>

        <div id="gcseSearchWrapper" class="gcse-search-wrapper inactive">
            <div class="gcse-search"></div>
        </div>


        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>

        </div>

        <div class="profile">
            <img src="{{ asset('uploaded_files/' . $userImage) }}" alt="">
            <h3>{{ $userName }}</h3>
            <span>{{ $userProfesi }}</span>
            <a href="{{ url('/profileadmin') }}" class="btn">View Profile</a>
            <a href="{{ route('logoutsp') }}" onclick="return confirm('Anda Yakin Ingin Logout?');" class="delete-btn">Log out</a>
        </div>
    </section>
</header>

<section class="contents">
    <div id="search-results" class="autocomplete-box"></div>
    <div class="heading2">
        <h1>Daftar Buku</h1> <a href="{{ route('add_content') }}" id="plus" class="btn" style="margin-bottom: 1rem; width:20%">Tambah Buku</a>

    </div>




    @if (session('success'))
        <div class="modal-box" id="success-message">
            <i class="fa-solid fa-check-to-slot"></i>
            <h2>Success</h2>
            <h3>{{ session('success') }}</h3>
            <div class="but">
                <button class="tutupbut" onclick="closeModalAndClearSession()">OK</button>
            </div>
        </div>
    @elseif (session('error'))
        <div id="error-message" class="popup-message">{{ session('error') }}</div>
    @endif

    @if (session('sucesup'))
        <div class="modal-up" id="success-message">
            <i class="fa-solid fa-thumbs-up"></i>
            <h2>Success</h2>
            <h3>{{ session('sucesup') }}</h3>
            <div class="butup">
                <button class="tutupbutup" onclick="closeModalAndClearSession()">OK</button>
            </div>
        </div>
    @elseif (session('errorup'))
        <div id="error-message" class="popup-message">{{ session('error') }}</div>
    @endif

    <div class="box-container">


        @if ($contents->count() > 0)
            @foreach ($contents as $content)
                <div class="box">
                    <div class="flex">
                        <div>
                            <i class="fas fa-dot-circle" style="{{ $content->status == 'active' ? 'color:limegreen' : 'color:red' }}"></i>
                            <span style="{{ $content->status == 'active' ? 'color:limegreen' : 'color:red' }}">{{ $content->status }}</span>
                        </div>
                        <div>
                            <i class="fas fa-calendar"></i><span>{{ $content->date }}</span>
                        </div>
                    </div>
                    <img src="../uploaded_files/{{ $content->thumb }}" class="thumb" alt="">
                    <h3 class="title">{{ $content->judul }}</h3>
                    <form action="{{ route('delete_video') }}" method="post" class="flex-btn">
                        @csrf
                        <input type="hidden" name="id" value="{{ $content->id }}">
                        <a href="{{ route('update.content', ['videoId' => $content->id]) }}" class="option-btn">Ubah</a>
                        <button type="submit" class="delete-btn" onclick="return confirm('Anda Yakin Ingin Menghapus Buku?');">Hapus</button>
                    </form>
                    <a href="{{ route('detailbukusp.content', ['videoId' => $content->id]) }}" class="btn">Baca Buku</a>

                </div>
            @endforeach
        @else
            <p class="empty">Tidak ada buku yang ditambahkan!</p>
        @endif
    </div>

    <div class="page">
        <div class="pagination">
            <ul>  </ul>
        </div>
    </div>
</section>

<script>
    function closeModalAndClearSession() {
        document.getElementById('success-message').style.display = 'none';
        
    }

    const element = document.querySelector(".pagination ul");
    const totalPages = {{ $totalPages }};
    const currentPage = {{ $currentPage }};

    element.innerHTML = createPagination(totalPages, currentPage);

    function createPagination(totalPages, page) {
        let liTag = '';
        let active;
        let beforePage = page - 1;
        let afterPage = page + 1;
        if (page > 1) {
            liTag += `<li class="newbtn prev" onclick="changePage(${page - 1})"><span><i class="fas fa-angle-left"></i> Prev</span></li>`;
        }

        if (page > 2) {
            liTag += `<li class="first numb" onclick="changePage(1)"><span>1</span></li>`;
            if (page > 3) {
                liTag += `<li class="dots"><span>...</span></li>`;
            }
        }

        // if (page == totalPages) {
        //     beforePage = beforePage - 2;
        // } else if (page == totalPages - 1) {
        //     beforePage = beforePage - 1;
        // }
        if (page == 1) {
            afterPage = afterPage + 2;
        } else if (page == 2) {
            afterPage = afterPage + 1;
        }

        for (var plength = beforePage; plength <= afterPage; plength++) {
            if (plength > totalPages) {
                continue;
            }
            if (plength == 0) {
                plength = plength + 1;
            }
            if (page == plength) {
                active = "active";
            } else {
                active = "";
            }
            liTag += `<li class="numb ${active}" onclick="changePage(${plength})"><span>${plength}</span></li>`;
        }

        if (page < totalPages - 1) {
            if (page < totalPages - 2) {
                liTag += `<li class="dots"><span>...</span></li>`;
            }
            liTag += `<li class="last numb" onclick="changePage(${totalPages})"><span>${totalPages}</span></li>`;
        }

        if (page < totalPages) {
            liTag += `<li class="newbtn next" onclick="changePage(${page + 1})"><span>Next <i class="fas fa-angle-right"></i></span></li>`;
        }
        element.innerHTML = liTag;
        return liTag;
    }

    function changePage(page) {
        const url = new URL(window.location.href);
        url.searchParams.set('page', page);
        window.location.href = url.toString();
    }


    function setSearchType(type) {
    const basicForm = document.getElementById('basicSearchForm');
    const gcseWrapper = document.getElementById('gcseSearchWrapper');
    const buttons = document.querySelectorAll('.search-type-btn');

    if (type === 'basic') {
        basicForm.classList.remove('inactive');
        gcseWrapper.classList.add('inactive');
    } else if (type === 'gcse') {
        basicForm.classList.add('inactive');
        gcseWrapper.classList.remove('inactive');
    }

    // Atur tombol aktif
    buttons.forEach(btn => btn.classList.remove('active'));
    document.querySelector(`.search-type-btn[onclick*="${type}"]`).classList.add('active');
}

document.addEventListener('DOMContentLoaded', function () {
    setSearchType('basic');
});



</script>



@endsection
