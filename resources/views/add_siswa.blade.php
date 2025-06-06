@extends('components.spheader')
@section('main')
    <link rel="stylesheet" href="{{ asset('assets/css/admin_style.css') }}">
    <script src="{{ asset('assets/js/admin_script.js') }}"></script>



    <header class="header">

        <section class="flex">

            <a href="{{ url('/dashboardsp') }}" class="logo">Admin</a>



            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <div id="search-btn" class="fas fa-search"></div>
                <div id="user-btn" class="fas fa-user"></div>
            </div>

            <div class="profile">

                <img src="{{ asset('uploaded_files/' . $userImage) }}" alt="">
                <h3>{{ $userName }}</h3>
                <span>{{ $userProfesi }}</span>
                <a href="{{ url('/profileasp') }}" class="btn">Lihat Profil</a>

                <a href="{{ route('logoutsp') }}" onclick="return confirm('Anda Yakin Ingin Keluar?');"
                    class="delete-btn">Keluar</a>

            </div>

        </section>

    </header>

    <section class="video-form">

        <h1 class="heading">Tambahkan Siswa</h1>

        @if (session('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif

        <form action="{{ route('upload_siswa') }}" method="post" enctype="multipart/form-data" id="formup">
            @csrf
            <p>Nama Siswa<span>*</span></p>
            <input type="text" name="nama" maxlength="100" required placeholder="Masukkan Nama Siswa" class="box">

            <p>Jenis Kelamin<span>*</span></p>
            <select name="jenis_kelamin" class="box" required>
                <option value="" selected disabled>-- Jenis Kelamin --</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <p>Kelas<span>*</span></p>
            <select name="kelas" class="box" required>
                <option value="" selected disabled>-- Kelas --</option>
                <option value="Kelas 1">Kelas 1</option>
                <option value="Kelas 2">Kelas 2</option>
                <option value="Kelas 3">Kelas 3</option>
                <option value="Kelas 4">Kelas 4</option>
                <option value="Kelas 5">Kelas 5</option>
                <option value="Kelas 6">Kelas 6</option>
            </select>
            <p>Email Siswa<span>*</span></p>
            <input type="text" name="email" maxlength="100" required placeholder="Masukkan Email Siswa" class="box">
            <p>Password<span>*</span></p>
            <input type="text" name="password" maxlength="100" required placeholder="Masukkan Password Siswa" class="box">
            <p>Konfirmasi Password<span>*</span></p>
            <input type="text" name="password_confirmation" maxlength="100" required placeholder="Konfirmasi Password Siswa" class="box">

            <p>Foto Siswa<span>*</span></p>
            <input type="file" name="image" accept="image/*"  class="box" id="image">
            <small id="image-error" style="display: none; font-size: 1.7rem; color: #888; text-align: center;">*Ukuran file terlalu besar (maks. 5 MB)</small>
            <input type="submit" value="Tambah Siswa" name="submit" class="btn">
        </form>

    </section>
    <script>
        const form = document.getElementById('formup');
        const imageField = document.getElementById('image');
        const imageError = document.getElementById('image-error');
        const videoField = document.getElementById('video');
        const videoError = document.getElementById('video-error');

        form.addEventListener('submit', function(event) {
            if (imageField.files[0].size > 2048 * 1024) {
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
