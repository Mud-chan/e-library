<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Katalog Buku</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('assets/css/katalog_buku.css') }}">
</head>
<body>

  <!-- Navbar -->
  {{-- <div class="navbar">
    <div>Home</div>
    <div class="search-section">
      <input type="text" placeholder="Search here............" />
      <button>Search</button>
    </div>
    <div>👤 Diego</div>
  </div> --}}


  <header class="header">

    <section class="flex">

        <a href="{{ url('/dashboardsp') }}" class="logo">Tutor</a>

        <form action="post" method="post" class="search-form">
            @csrf
            <input type="text" name="search" placeholder="Cari Tutor..." required maxlength="100">
            <button type="submit" class="fas fa-search" name="search_btn"></button>
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="toggle-btn" class="fas fa-sun"></div>
        </div>

        <div class="profile">

            <img src="{{ asset('assets/images/demo/frame1.png') }}" alt="">
            <h3>Rohman</h3>
            <span>Admin</span>
            <a href="{{ url('/profilesp') }}" class="btn">View Profile</a>

            <a href="{{ route('logoutsp') }}" onclick="return confirm('Anda Yakin Ingin Logout?');"
            class="delete-btn">log out</a>

        </div>

    </section>

</header>


  <!-- Katalog Buku -->
  <section class="katalog-buku">
    <h3><span class="ikon-bulet"></span> Buku Populer</h3>
    <div class="grid-buku">
        @foreach ($popularBooks as $book)
          <div class="kartu-buku">
            <a href="{{ route('detailbukusiswa.content', ['videoId' => $book->id]) }}" style="text-decoration: none; color: black;">
                <img src="../uploaded_files/{{ $book->thumb }}" alt="Buku" class="img-fluid rounded shadow-sm" />
                <p class="judul">{{ $book->judul }}</p>
                <div class="label-genre">
                <span class="badge">{{ $book->kategori }}</span>
                <span class="badge">{{ $book->tingkatan }}</span>
                </div>
            </a>
          </div>
        @endforeach
      </div>

    <h3><span class="ikon-bulet"></span> Baru Ditambahkan</h3>
    <div class="grid-buku">

      @if ($contents->count() > 0)
            @foreach ($contents as $content)
            <div class="kartu-buku">
                <a href="{{ route('detailbukusiswa.content', ['videoId' => $content->id]) }}" style="text-decoration: none; color: black;">
                    <img src="../uploaded_files/{{ $content->thumb }}" alt="Buku" class="img-fluid rounded shadow-sm" />
                    <p class="judul">{{ $content->judul }}</p>
                    <div class="label-genre">
                    <span class="badge">{{ $content->kategori }}</span>
                    <span class="badge">{{ $content->tingkatan }}</span>
                    </div>
                </a>
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

    <h3><span class="ikon-bulet"></span> Eksplorasi Kategori</h3>
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

  </section>
  <script src="{{ asset('assets/js/admin_script.js') }}"></script>
</body>
</html>
