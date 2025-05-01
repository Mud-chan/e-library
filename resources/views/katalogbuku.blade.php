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
    <h3><span class="ikon-bulet"></span> Buku Cerita Terbaru</h3>
    <div class="grid-buku">
      <div class="kartu-buku">
        <img src="{{ asset('assets/images/buku1.png') }}" alt="Buku" class="img-fluid rounded shadow-sm" />
        <p class="judul">Cerita Nusantara</p>
        <div class="label-genre">
          <span class="badge">Budaya</span>
          <span class="badge">Fiksi</span>
        </div>
      </div>
      <div class="kartu-buku">
        <img src="{{ asset('assets/images/buku1.png') }}" alt="Buku" class="img-fluid rounded shadow-sm" />
        <p class="judul">Cerita Si Kancil</p>
        <div class="label-genre">
          <span class="badge">Budaya</span>
          <span class="badge">Fiksi</span>
        </div>
      </div>
      <div class="kartu-buku">
        <img src="{{ asset('assets/images/buku1.png') }}" alt="Buku" class="img-fluid rounded shadow-sm" />
        <p class="judul">Menulis Alphabet</p>
        <div class="label-genre">
          <span class="badge">Budaya</span>
          <span class="badge">Fiksi</span>
        </div>
      </div>
      <div class="kartu-buku">
        <img src="{{ asset('assets/images/buku1.png') }}" alt="Buku" class="img-fluid rounded shadow-sm" />
        <p class="judul">Belajar Ganti Busi</p>
        <div class="label-genre">
          <span class="badge">Budaya</span>
          <span class="badge">Fiksi</span>
        </div>
      </div>
    </div>

    <h3><span class="ikon-bulet"></span> Baru Ditambahkan</h3>
    <div class="grid-buku">
      <div class="kartu-buku">
        <img src="{{ asset('assets/images/buku1.png') }}" alt="Buku" class="img-fluid rounded shadow-sm" />
        <p class="judul">Talaga Warna</p>
        <div class="label-genre">
          <span class="badge">Budaya</span>
          <span class="badge">Fiksi</span>
        </div>
      </div>
      <div class="kartu-buku">
        <img src="{{ asset('assets/images/buku1.png') }}" alt="Buku" class="img-fluid rounded shadow-sm" />
        <p class="judul">Cerita Rakyat</p>
        <div class="label-genre">
          <span class="badge">Budaya</span>
          <span class="badge">Fiksi</span>
        </div>
      </div>
      <div class="kartu-buku">
        <img src="{{ asset('assets/images/buku1.png') }}" alt="Buku" class="img-fluid rounded shadow-sm" />
        <p class="judul">Harry Pura</p>
        <div class="label-genre">
          <span class="badge">Budaya</span>
          <span class="badge">Fiksi</span>
        </div>
      </div>
      <div class="kartu-buku">
        <img src="{{ asset('assets/images/buku1.png') }}" alt="Buku" class="img-fluid rounded shadow-sm" />
        <p class="judul">Timun Silver</p>
        <div class="label-genre">
          <span class="badge">Budaya</span>
          <span class="badge">Fiksi</span>
        </div>
      </div>
    </div>

    <h3><span class="ikon-bulet"></span> Eksplorasi Genre</h3>
    <div class="genre">
      <button>Budaya</button>
      <button>Fiksi</button>
      <button>Pelajaran</button>
      <button>Non-Fiksi</button>
      <button>Non-Pelajaran</button>
    </div>
  </section>
  <script src="{{ asset('assets/js/admin_script.js') }}"></script>
</body>
</html>