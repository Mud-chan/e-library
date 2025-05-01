@extends('components.spheader')
@section('main')
<link rel="stylesheet" href="{{ asset('assets/css/admin_style.css') }}">
{{-- <script src="{{ asset('assets/js/admin_script.js') }}"></script> --}}

<header class="header">

    <section class="flex">

        <a href="{{ url('/dashboardsp') }}" class="logo">Tutor</a>

        {{-- <form action="{{ route('tutor.caritutor') }}" method="post" class="search-form">
            @csrf
            <input type="text" name="search" placeholder="Cari Tutor..." required maxlength="100">
            <button type="submit" class="fas fa-search" name="search_btn"></button>
        </form> --}}

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="toggle-btn" class="fas fa-sun"></div>
        </div>

        <div class="profile">

            <img src="{{ asset('uploaded_files/' . $userImage) }}" alt="">
            <h3>{{ $userName }}</h3>
            <span>{{ $userProfesi }}</span>
            <a href="{{ url('/profilesp') }}" class="btn">View Profile</a>

            <a href="{{ route('logoutsp') }}" onclick="return confirm('Anda Yakin Ingin Logout?');"
            class="delete-btn">log out</a>

        </div>

    </section>

</header>


    <section class="video-form">

        <h1 class="heading">Update Buku</h1>

        @if ($siswa)
        <form action="{{ route('update.siswa', ['siswaId' => $siswa->id]) }}" method="post" enctype="multipart/form-data" id="formup">
            @csrf
            <input type="text" name="siswa_id" value="{{ $siswa->id }}">
            <input type="text" name="old_image" value="{{ $siswa->image }}">

            <p>Foto Siswa</p>
            @if ($siswa->image)
                <img src="{{ asset('uploaded_files/' . $siswa->image) }}" alt="Foto Siswa" width="150">
            @endif
            <input type="file" name="image" accept="image/*" class="box">
            <small id="image-error" style="display: none; font-size: 1.7rem; color: #888; text-align: center;">Ukuran gambar terlalu besar maksimal 2MB</small>

            <p>Nama Siswa <span>*</span></p>
            <input type="text" name="nama" maxlength="100" required placeholder="Masukkan Nama Siswa" class="box" value="{{ $siswa->nama }}">

            <p>Jenis Kelamin<span>*</span></p>
            <select name="jenis_kelamin" class="box" required>
                <option value="{{ $siswa->jenis_kelamin }}" selected>{{ $siswa->jenis_kelamin }}</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <p>Kelas<span>*</span></p>
            <select name="kelas" class="box" required>
                <option value="{{ $siswa->kelas }}" selected>{{ $siswa->kelas }}</option>
                <option value="Kelas 1">Kelas 1</option>
                <option value="Kelas 2">Kelas 2</option>
                <option value="Kelas 3">Kelas 3</option>
                <option value="Kelas 4">Kelas 4</option>
                <option value="Kelas 5">Kelas 5</option>
                <option value="Kelas 6">Kelas 6</option>
            </select>


            <p>Email Siswa <span>*</span></p>
            <input type="email" name="email" maxlength="1000" required placeholder="Masukkan Email Siswa" class="box" value="{{ $siswa->email }}">

            <p>Password Lama</p>
            <input type="password" name="old_pass" placeholder="Kosongkan jika tidak ingin mengganti" class="box">

            <p>Password Baru</p>
            <input type="password" name="new_pass" placeholder="Password baru" class="box">

            <p>Konfirmasi Password</p>
            <input type="password" name="cpass" placeholder="Konfirmasi password" class="box">




            <input type="submit" value="Update Siswa" name="update" class="btn">
        </form>
        @else
            <p class="empty">Siswa tidak ditemukan!</p>
        @endif


<script>
    const form = document.getElementById('formup');
    const imageField = document.getElementById('image');
    const imageError = document.getElementById('image-error');
    const videoField = document.getElementById('video');
    const videoError = document.getElementById('video-error');

    form.addEventListener('submit', function(event) {
        if (imageField.files[0] && imageField.files[0].size > 2048 * 1024) {
            event.preventDefault();
            imageError.style.display = 'block';
        } else {
            imageError.style.display = 'none';
        }

        if (videoField.files[0] && videoField.files[0].size > 50 * 1024 * 1024) {
            event.preventDefault();
            videoError.style.display = 'block';
        } else {
            videoError.style.display = 'none';
        }
    });
</script>


@endsection
