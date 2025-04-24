<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Katalog Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/katalogbuku.css') }}">
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div>Home</div>
    <div class="search-section">
      <input type="text" placeholder="Search here............" />
      <button>Search</button>
    </div>
    <div>👤 Diego</div>
  </div>

  <!-- Katalog Buku -->
  <section class="katalog-buku">
    <h3><span class="ikon-bulet"></span> Buku Populer</h3>
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

</body>
</html>
