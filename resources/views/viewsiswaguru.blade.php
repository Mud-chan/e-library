@extends('components.adminheader')
@section('main')
    <link rel="stylesheet" href="{{ asset('assets/css/admin_style.css') }}">
    {{-- <script src="{{ asset('assets/js/admin_script.js') }}"></script> --}}

    <header class="header">

        <section class="flex">

            <a href="{{ url('/dashboardguru') }}" class="logo">Guru.</a>

            <form action="{{ route('siswa.carisiswaguru') }}" method="post" class="search-form">
                @csrf
                <input type="text" name="search" placeholder="Cari Siswa..." required maxlength="100">
                <button type="submit" class="fas fa-search" name="search_btn"></button>
            </form>

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

                <a href="{{ route('logoutad') }}" onclick="return confirm('Anda Yakin Ingin Logout?');"
                    class="delete-btn">logout</a>
            </div>

        </section>

    </header>

    <section class="contents">

        <div class="heading2">


        </div>

        <div class="box-container">
            @if (count($contents) > 0)
                @foreach ($contents as $content)
                    <div class="box" style="text-align: center">
                        <div class="flex">
                        </div>
                        <img src="../uploaded_files/{{ $content->image }}" class="thumb" alt="">
                        <h3 class="title">Nama : {{ $content->nama }}</h3>
                        <h4 class="title">{{ $content->email }} {{ $content->kelas }}</h3>
                            {{-- <form action="{{ route('delete_siswa') }}" method="post" class="flex-btn">
                                @csrf
                                <input type="hidden" name="id" value="{{ $content->id }}">
                                <a href="{{ route('update.siswa.form', ['siswaId' => $content->id]) }}"
                                    class="option-btn">Ubah</a>
                                <button type="submit" class="delete-btn"
                                    onclick="return confirm('Anda Yakin Ingin Menghapus Siswa?');">Hapus</button>
                            </form> --}}
                    </div>
                @endforeach
            @else
                <p class="empty">Belum ada Siswa Yang di Tambahkan</p>
            @endif

        </div>

        <div class="page">
            <div class="pagination">
                <ul> <!-- pages or li are comes from javascript --> </ul>
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
    </script>
@endsection
