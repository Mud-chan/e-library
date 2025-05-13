@extends('components.adminheader')
@section('main')
<link rel="stylesheet" href="{{ asset('assets/css/admin_style.css') }}">


{{-- <script src="{{ asset('assets/js/admin_script.js') }}"></script> --}}
<header class="header">
    <section class="flex">
        <a href="{{ url('/dashboardguru') }}" class="logo">Guru</a>

        <div class="search-type-selector">
            <button type="button" class="search-type-btn active" onclick="setSearchType('basic')">Biasa</button>
            <button type="button" class="search-type-btn" onclick="setSearchType('gcse')">Lanjutan</button>
        </div>

        <form id="basicSearchForm" action="{{ route('caricontentguru') }}" method="post" class="search-form">
            @csrf
            <input type="text" name="search" placeholder="Cari Materi..." required maxlength="100">
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
            <img src="{{ asset('uploaded_files/' . $guruImage) }}" alt="">
            <h3>{{ $guruName }}</h3>
            <span>{{ $guruProfesi }}</span>
            <a href="{{ url('/profileguru') }}" class="btn">View Profile</a>
            <a href="{{ route('logoutad') }}" onclick="return confirm('Anda Yakin Ingin Logout?');" class="delete-btn">Log out</a>
        </div>
    </section>
</header>

<section class="contents">
    <div class="heading2">
        <h1>Daftar Buku</h1> <a href="{{ route('add_content_guru') }}" id="plus" class="btn" style="margin-bottom: 1rem; width:20%">Tambah Buku</a>

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
    @if (session('errorup'))
        <div class="modal-sal" id="gagal-message">
            <i class="fa-solid fa-circle-exclamation"></i>
            <h2>Gagal</h2>
            <h3>{{ session('errorup') }}</h3>
            <div class="butsal">
                <button class="tutupsal" onclick="closeModalAndClearSession()">OK</button>
            </div>
        </div>
    @elseif (session('errorup'))

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
                    
                    <a href="{{ route('detailbukuguru.content', ['videoId' => $content->id]) }}" class="btn">Baca Buku</a>

                </div>
            @endforeach
        @else
            <p class="empty">Tidak ada buku yang ditambahkan!</p>
        @endif
    </div>

    <div class="page">
        <div class="pagination">
            <ul> <!-- pages or li are comes from javascript --> </ul>
        </div>
    </div>
</section>

<script>
    function closeModalAndClearSession() {
        document.getElementById('success-message').style.display = 'none';
        // Tambahkan kode untuk menghapus sesi jika diperlukan
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
