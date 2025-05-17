@extends('components.spheader')
@section('main')
<link rel="stylesheet" href="{{ asset('assets/css/admin_style.css') }}">
{{-- <script src="{{ asset('assets/js/admin_script.js') }}"></script> --}}

<header class="header">

    <section class="flex">

        <a href="{{ url('/dashboardsp') }}" class="logo">Admin</a>

        {{-- <form action="{{ route('tutor.caritutor') }}" method="post" class="search-form">
            @csrf
            <input type="text" name="search" placeholder="Cari Tutor..." required maxlength="100">
            <button type="submit" class="fas fa-search" name="search_btn"></button>
        </form> --}}

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
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

        <h1 class="heading">Update Guru</h1>

        @if ($playlists)
    <form action="{{ route('update.tutor', ['guruId' => $playlists->id]) }}" method="post" enctype="multipart/form-data" id="formup">
        @csrf
        <input type="hidden" name="guru_id" value="{{ $playlists->id }}">
        <input type="hidden" name="role" value="{{ $playlists->role }}">

        <p>Foto Guru</p>
        @if ($playlists->image)
            <img src="{{ asset('uploaded_files/' . $playlists->image) }}" alt="Foto Guru" width="150">
        @endif
        <input type="file" name="image" accept="image/*" class="box" id="image">
        <small id="image-error" style="display: none; font-size: 1.7rem; color: #888; text-align: center;">Ukuran gambar terlalu besar maksimal 2MB</small>

        <p>Nama Guru <span>*</span></p>
        <input type="text" name="nama" maxlength="100" required placeholder="Masukkan Nama Guru" class="box" value="{{ $playlists->nama }}">

        <p>Mengajar Pada Kelas..<span>*</span></p>
            <select name="mengampu" class="box" required>
                <option value="{{ $playlists->mengampu }}" selected>{{ $playlists->mengampu }}</option>
                <option value="Kelas 1">Kelas 1</option>
                <option value="Kelas 2">Kelas 2</option>
                <option value="Kelas 3">Kelas 3</option>
                <option value="Kelas 4">Kelas 4</option>
                <option value="Kelas 5">Kelas 5</option>
                <option value="Kelas 6">Kelas 6</option>
            </select>

        <p>Email Guru <span>*</span></p>
        <input type="email" name="email" maxlength="100" required placeholder="Masukkan Email Guru" class="box" value="{{ $playlists->email }}">

        <p>Password Lama</p>
        <input type="password" name="old_pass" placeholder="Kosongkan jika tidak ingin mengganti" class="box">

        <p>Password Baru</p>
        <input type="password" name="new_pass" placeholder="Password baru" class="box">

        <p>Konfirmasi Password</p>
        <input type="password" name="cpass" placeholder="Konfirmasi password" class="box">

        <input type="submit" value="Update Guru" name="update" class="btn">
    </form>
    @else
        <p class="empty">Guru tidak ditemukan!</p>
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
