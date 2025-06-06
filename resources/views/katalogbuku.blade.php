<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('assets/images/logo2.png') }}">
    <title>Katalog Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('assets/css/katalogbuku.css') }}">
    <script async src="https://cse.google.com/cse.js?cx=50277ad2efc244574"></script>
</head>
<style>
    .autocomplete-box {
        position: absolute;
        background: #fff;
        max-height: 300px;
        overflow-y: auto;
        color: black;
        z-index: 999;
        width: 50%;

        left: 50%;
        transform: translateX(-50%);
        top: 10%;
        /* atur sesuai kebutuhan, atau pakai 50% + translateY(-50%) jika ingin tengah vertikal */


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
    }

    .autocomplete-box .item:hover {
        background: #f0f0f0;
    }

    .autocomplete-box .item img {
        width: 40px;
        height: 60px;
        object-fit: cover;
        margin-right: 10px;
    }
</style>

<body>

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

            // Sembunyikan saat klik luar
            $(document).click(function(e) {
                if (!$(e.target).closest('#search-input, #search-results').length) {
                    $('#search-results').hide();
                }
            });
        });
    </script>









    <!-- Navbar -->
    <header class="header">

        <section class="flex">

            <a href="{{ url('/katalogbuku') }}" class="logo">Siswa</a>

            <div class="search-type-selector">
            <button type="button" class="search-type-btn active" onclick="setSearchType('basic')">Biasa</button>
            <button type="button" class="search-type-btn" onclick="setSearchType('gcse')">Lanjutan</button>
            </div>


            <div id="basicSearchForm" class="search-form">
            <form action="{{ route('caribuku') }}" method="post" class="search-form" autocomplete="off">
                @csrf
                <input type="text" id="search-input" name="search" placeholder="Cari Buku..." required
                    maxlength="100">
                <button type="submit" class="fas fa-search" name="search_btn"></button>
            </form>
            </div>

            <div id="gcseSearchWrapper" class="gcse-search-wrapper inactive">
                <div class="gcse-search"></div>
            </div>

            <div class="logo-kanan">


                <div class="dropdown">
                    <button class="dropbtn">
                        <p style="font-weight: 600;">Jenis Buku</p>
                    </button>
                    <div class="dropdown-content">
                        @foreach (['Umum', 'Kelas 1', 'Kelas 2', 'Kelas 3', 'Kelas 4', 'Kelas 5', 'Kelas 6', 'Karya Guru'] as $tingkatan)
                            <form action="{{ route('caribuku') }}" method="POST">
                                @csrf
                                <input type="hidden" name="search" value="{{ $tingkatan }}">
                                <button type="submit">{{ $tingkatan }}</button>
                            </form>
                        @endforeach
                    </div>
                </div>

                <div class="icons">
                    <div id="search-btn" class="fas fa-search"></div>
                    <div id="user-btn" class="fas fa-user"></div>


                </div>

            </div>
            <div class="profile">

                <img src="{{ asset('uploaded_files/' . $userImage) }}" alt="">
                <h3>{{ $userName }}</h3>
                <span>Siswa</span>
                <a href="{{ url('/profilesiswa') }}" class="btn">Lihat Profil</a>
                <a href="{{ url('/historybuku') }}" class="btn">History</a>
                <a href="{{ url('/bookmarkbuku') }}" class="btn">Bookmark</a>
                <a href="{{ url('/recommend') }}" class="btn">SPK TOPSIS</a>

                <a href="{{ route('logoutsiswa') }}" onclick="return confirm('Anda Yakin Ingin Keluar?');"
                    class="delete-btn">Keluar</a>

            </div>

        </section>


    </header>
    <div id="search-results" class="autocomplete-box"></div>



    <!-- Katalog Buku -->
    <section class="katalog-buku">

        <h3><span class="ikon-bulet"></span> Jelajah Buku</h3>
        <div class="genre" style="display: flex; gap: 10px;">
            <form action="{{ route('caribuku') }}" method="POST">
                @csrf
                <input type="hidden" name="search" value="Komik">
                <button type="submit">Komik</button>
            </form>

            <form action="{{ route('caribuku') }}" method="POST">
                @csrf
                <input type="hidden" name="search" value="Buku Cerita">
                <button type="submit">Buku Cerita</button>
            </form>


            <form action="{{ route('caribuku') }}" method="POST">
                @csrf
                <input type="hidden" name="search" value="Buku Pelajaran">
                <button type="submit">Buku Pelajaran</button>
            </form>

            <form action="{{ route('caribuku') }}" method="POST">
                @csrf
                <input type="hidden" name="search" value="Novel">
                <button type="submit">Novel</button>
            </form>
        </div>

        <h3><span class="ikon-bulet"></span> Buku Populer</h3>
        <div class="grid-buku">
            @foreach ($popularBooks as $book)
                <div class="kartu-buku">
                    <a href="{{ route('detailbukusiswa.content', ['videoId' => $book->id]) }}"
                        style="text-decoration: none; color: black;">
                        <img src="../uploaded_files/{{ $book->thumb }}" alt="Buku"
                            class="img-fluid rounded shadow-sm" />
                        <p class="judul">{{ $book->judul }}</p>
                        <div class="label-genre">
                            <span class="badge">{{ $book->kategori }}</span>
                            <span class="badge">{{ $book->tingkatan }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>


        @if (isset($recommendedBooks) && count($recommendedBooks) > 0)
            <h3><span class="ikon-bulet"></span> Rekomendasi untuk Kamu</h3>
            <div class="grid-buku">
                @foreach ($recommendedBooks as $book)
                    <div class="kartu-buku">
                        <a href="{{ route('detailbukusiswa.content', ['videoId' => $book->id]) }}"
                            style="text-decoration: none; color: black;">
                            <img src="../uploaded_files/{{ $book->thumb }}" alt="Buku"
                                class="img-fluid rounded shadow-sm" />
                            <p class="judul">{{ $book->judul }}</p>
                            <div class="label-genre">
                                <span class="badge">{{ $book->kategori }}</span>
                                <span class="badge">{{ $book->tingkatan }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <h3><span class="ikon-bulet"></span> Rekomendasi Buku</h3>
            <p>Tidak ada rekomendasi buku untukmu saat ini. Ayo baca beberapa buku terlebih dahulu!😄</p>
        @endif

        <h3><span class="ikon-bulet"></span> Baru Ditambahkan</h3>
        <div class="grid-buku">

            @if ($contents->count() > 0)
                @foreach ($contents as $content)
                    <div class="kartu-buku">
                        <a href="{{ route('detailbukusiswa.content', ['videoId' => $content->id]) }}"
                            style="text-decoration: none; color: black;">
                            <img src="../uploaded_files/{{ $content->thumb }}" alt="Buku"
                                class="img-fluid rounded shadow-sm" />
                            <p class="judul">{{ $content->judul }}</p>
                            <div class="label-genre">
                                <span class="badge">{{ $content->kategori }}</span>
                                <span class="badge">{{ $content->tingkatan }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <p class="empty">Tidak ada buku baru yang ditambahkan!</p>
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
                liTag +=
                    `<li class="newbtn prev" onclick="changePage(${page - 1})"><span><i class="fas fa-angle-left"></i> Prev</span></li>`;
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
                liTag +=
                    `<li class="newbtn next" onclick="changePage(${page + 1})"><span>Next <i class="fas fa-angle-right"></i></span></li>`;
            }
            element.innerHTML = liTag;
            return liTag;
        }

        function changePage(page) {
            const url = new URL(window.location.href);
            url.searchParams.set('page', page);
            window.location.href = url.toString();
        }

        document.querySelector('.dropbtn').addEventListener('click', function() {
            const dropdownContent = document.querySelector('.dropdown-content');
            const dropdown = document.querySelector('.dropdown');


            const isVisible = dropdownContent.style.display === 'block';
            dropdownContent.style.display = isVisible ? 'none' : 'block';


            if (isVisible) {
                dropdown.classList.remove('active');
            } else {
                dropdown.classList.add('active');
            }
        });


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

    buttons.forEach(btn => btn.classList.remove('active'));
    document.querySelector(`.search-type-btn[onclick*="${type}"]`).classList.add('active');
}

document.addEventListener('DOMContentLoaded', function () {
    setSearchType('basic');
});

    </script>
    <script src="{{ asset('assets/js/admin_script.js') }}"></script>
</body>

</html>
