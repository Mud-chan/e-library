<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Katalog Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('assets/css/katalogbuku.css') }}">
</head>
<body>

  <!-- Navbar -->
  <header class="header">

    <section class="flex">

        <a href="{{ url('/katalogbuku') }}" class="logo">Siswa</a>

        <form action="{{ route('caribuku') }}" method="post" class="search-form">
            @csrf
            <input type="text" name="search" placeholder="Cari Tutor..." required maxlength="100">
            <button type="submit" class="fas fa-search" name="search_btn"></button>
        </form>

        <div class="icons">
            {{-- <div id="menu-btn" class="fas fa-bars"></div> --}}
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>

        <div class="profile">

            <img src="{{ asset('uploaded_files/' . $userImage) }}" alt="">
            <h3>{{ $userName }}</h3>
            <span>{{ $userProfesi }}</span>
            <a href="{{ url('/profilesp') }}" class="btn">View Profile</a>
            <a href="{{ url('/historybuku') }}" class="btn">History</a>
            <a href="{{ url('/bookmarkbuku') }}" class="btn">Bookmark</a>

            <a href="{{ route('logoutsiswa') }}" onclick="return confirm('Anda Yakin Ingin Logout?');"
            class="delete-btn">log out</a>

        </div>

    </section>

</header>

  <!-- Katalog Buku -->
  <section class="katalog-buku">

    <h3><span class="ikon-bulet"></span> History</h3>
    <div class="grid-buku">

        @if ($historyBooks->count() > 0)
        @foreach ($historyBooks as $content)
        <div class="kartu-buku">
            <a href="{{ route('detailbukusiswa.content', ['videoId' => $content->id]) }}" style="text-decoration: none; color: black;">
                <img src="{{ asset('uploaded_files/' . $content->thumb) }}" alt="Buku" class="img-fluid rounded shadow-sm" />
                <p class="judul">{{ $content->judul }}</p>
                <div class="label-genre">
                <span class="badge">{{ $content->kategori }}</span>
                <span class="badge">{{ $content->tingkatan }}</span>
                </div>
            </a>
        </div>
        @endforeach
    @else
        <p class="empty">Tidak ada hasil yang ditemukan!</p>
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
</script>
<script src="{{ asset('assets/js/admin_script.js') }}"></script>
</body>
</html>
