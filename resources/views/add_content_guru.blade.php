@extends('components.adminheader')
@section('main')
    <link rel="stylesheet" href="{{ asset('assets/css/admin_style.css') }}">
    <script src="{{ asset('assets/js/admin_script.js') }}"></script>



    <header class="header">

        <section class="flex">

            <a href="{{ url('/dashboardguru') }}" class="logo">Guru</a>



            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <div id="search-btn" class="fas fa-search"></div>
                <div id="user-btn" class="fas fa-user"></div>
            </div>

            <div class="profile">

                <img src="{{ asset('uploaded_files/' . $guruImage) }}" alt="">
                <h3>{{ $guruName }}</h3>
                <span>{{ $guruProfesi }}</span>
                <a href="{{ url('/profileaguru') }}" class="btn">Lihat Profil</a>

                <a href="{{ route('logoutad') }}" onclick="return confirm('Anda Yakin Ingin Keluar?');"
                    class="delete-btn">Keluar</a>

            </div>

        </section>

    </header>

    <section class="video-form">

        <h1 class="heading">Tambahkan Buku</h1>

        @if (session('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif

        <form action="{{ route('upload_content_guru') }}" method="post" enctype="multipart/form-data" id="formup">
            @csrf
            <p>Kategori<span>*</span></p>
            <select name="kategori" class="box" required>
                <option value="" selected disabled>-- Kategori --</option>
                <option value="Kunci Jawaban">Kunci Jawaban</option>
                <option value="Buku Cerita">Buku Cerita</option>
                <option value="Novel">Novel</option>
                <option value="Komik">Komik</option>
                <option value="Buku Pelajaran">Buku Pelajaran</option>
            </select>
            <p>Judul Buku <span>*</span></p>
            <input type="text" name="judul" maxlength="100" required placeholder="Masukkan judul Buku" class="box">
            <p>Deskripsi Buku <span>*</span></p>
            <textarea name="deskripsi" class="box" required placeholder="Masukkan deskripsi" maxlength="1000" cols="30"
                rows="10"></textarea>
            <p>Kelas<span>*</span></p>
            <select name="tingkatan" class="box" required>
                <option value="" selected disabled>-- Kelas --</option>
                <option value="Kelas 1">Kelas 1</option>
                <option value="Kelas 2">Kelas 2</option>
                <option value="Kelas 3">Kelas 3</option>
                <option value="Kelas 4">Kelas 4</option>
                <option value="Kelas 5">Kelas 5</option>
                <option value="Kelas 6">Kelas 6</option>
                <option value="Karya Guru">Karya Guru</option>
                <option value="Umum">Umum</option>
            {{-- <p>Sesi Kursus <span>*</span></p>
            <select name="playlist" class="box" required>
                <option value="" disabled selected>-- Pilih Kursus --</option>
                @if (count($playlists) > 0)
                    @foreach ($playlists as $playlist)
                        <option value="{{ $playlist->id }}">{{ $playlist->title }}</option>
                    @endforeach
                @else
                    <option value="" disabled>Tidak ada materi yang dibuat!</option>
                @endif
            </select> --}}
            </select>
            <p>Sampul Buku (jpg/jpeg/png)<span>*</span></p>
            <input type="file" name="thumb" accept="image/*"  class="box" id="image">
            <small id="image-error" style="display: none; font-size: 1.7rem; color: #888; text-align: center;">*Ukuran file terlalu besar (maks. 5 MB)</small>
            <p>Unggah Buku (pdf)<span>*</span></p>
            <input type="file" name="pdf" accept="application/pdf"  class="box" id="video">
            <small id="video-error" style="display: none; font-size: 1.7rem; color: #888; text-align: center;">*Ukuran file terlalu besar (maks. 43 MB)</small>
            <input type="submit" value="Tambah Buku" name="submit" class="btn">
        </form>

    </section>
    <script>
        const form = document.getElementById('formup');
        const imageField = document.getElementById('image');
        const imageError = document.getElementById('image-error');
        const videoField = document.getElementById('video');
        const videoError = document.getElementById('video-error');

        form.addEventListener('submit', function(event) {
            if (imageField.files[0].size > 6048 * 3024) {
                event.preventDefault();
                imageError.style.display = 'block';
            } else {
                imageError.style.display = 'none';
            }
            if (videoField.files[0].size > 50 * 2048 * 1024) {
                event.preventDefault();
                videoError.style.display = 'block';
            } else {
                videoError.style.display = 'none';
            }
        });
    </script>

@endsection
