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

@if ($content)
    <form action="{{ route('update.content', ['videoId' => $content->id]) }}" method="post" enctype="multipart/form-data" id="formup">
        @csrf
        <input type="hidden" name="video_id" value="{{ $content->id }}">
        <input type="hidden" name="old_thumb" value="{{ $content->thumb }}">
        <input type="hidden" name="old_video" value="{{ $content->pdf }}">

        <p>Kategori Buku <span>*</span></p>
        <select name="kategori" class="box" required>
            <option value="{{ $content->kategori }}" selected>{{ $content->kategori }}</option>
            <option value="Novel">Novel</option>
            <option value="Komik">Komik</option>
            <option value="Buku Pelajaran">Buku Pelajaran</option>
        </select>

        <p>Judul Materi <span>*</span></p>
        <input type="text" name="judul" maxlength="100" required placeholder="Enter video title" class="box" value="{{ $content->judul }}">

        <p>Deskripsi Materi <span>*</span></p>
        <textarea name="deskripsi" class="box" required placeholder="Write description" maxlength="1000" cols="30" rows="10">{{ $content->deskripsi }}</textarea>

        

        <p>Status Buku <span>*</span></p>
        <select name="tingkatan" class="box" required>
            <option value="{{ $content->tingkatan }}" selected>{{ $content->tingkatan }}</option>
            <option value="Kelas 1">Kelas 1</option>
            <option value="Kelas 2">Kelas 2</option>
            <option value="Kelas 3">Kelas 3</option>
            <option value="Kelas 4">Kelas 4</option>
            <option value="Kelas 5">Kelas 5</option>
            <option value="Kelas 6">Kelas 6</option>
            <option value="Umum">Umum</option>
        </select>

        <p>Unggah Foto Materi</p>
        <img src="../uploaded_files/{{ $content->thumb }}" alt="">
        <input type="file" name="thumb" accept="image/*" class="box" id="image">
        <small id="image-error" style="display: none; font-size: 1.7rem; color: #888; text-align: center;">Ukuran gambar terlalu besar maksimal 2MB</small>

        <p>Unggah Video Materi</p>
        {{-- <video src="../uploaded_files/{{ $content->pdf }}" controls></video> --}}
        <input type="file" name="pdf" accept="video/*" class="box" id="video">
        <small id="video-error" style="display: none; font-size: 1.7rem; color: #888; text-align: center;">Ukuran video terlalu besar maksimal 50MB</small>

        <input type="submit" value="Update" name="update" class="btn">
    </form>
@else
    <p class="empty">Video tidak ditemukan! <a href="add_content.php" class="btn" style="margin-top: 1.5rem;">Tambah Video</a></p>
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
