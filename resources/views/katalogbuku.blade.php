<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Katalog Buku</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #28c76f;
      padding: 10px 20px;
      color: white;
      font-weight: bold;
    }

    .search-section {
      display: flex;
      gap: 5px;
    }

    .search-section input[type="text"] {
      padding: 5px 10px;
      border-radius: 5px;
      border: none;
    }

    .search-section button {
      padding: 5px 15px;
      background-color: white;
      color: #28c76f;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }

    .content {
      position: relative;
      width: 100%;
      height: 300px;
      overflow: hidden;
    }

    .main-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .overlay .credit {
      position: absolute;
      bottom: 10px;
      right: 20px;
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      padding: 5px 10px;
      font-size: 12px;
      border-radius: 5px;
    }

    .katalog-buku {
      padding: 40px 20px;
      max-width: 1200px;
      margin: auto;
    }

    h3 {
      font-size: 20px;
      font-weight: bold;
      margin: 30px 0 10px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .ikon-bulet {
      width: 12px;
      height: 12px;
      background-color: #28c76f;
      border-radius: 50%;
      display: inline-block;
    }

    .grid-buku {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .kartu-buku {
      background: white;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      padding: 10px;
      text-align: center;
    }

    .kartu-buku img {
      width: 100%;
      height: 200px;
      border-radius: 10px;
      object-fit: cover;
    }

    .kartu-buku .judul {
      font-size: 14px;
      margin-top: 10px;
      font-weight: bold;
    }

    .label-genre {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-top: 10px;
      flex-wrap: wrap;
    }

    .badge {
      background-color: #28c76f;
      color: white;
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: bold;
    }

    .genre {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    .genre button {
      padding: 8px 15px;
      border: none;
      border-radius: 20px;
      background-color: #28c76f;
      color: white;
      cursor: pointer;
      font-weight: bold;
    }
  </style>
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

</body>
</html>