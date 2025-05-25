@extends('components.siswaheader')
@section('main')
<link rel="stylesheet" href="assets/css/siswa_style.css">

<header class="header">

    <section class="flex">

        <a href="{{ url('/katalogbuku') }}" class="logo">Siswa</a>

        {{-- <form action="{{ route('detailsiswa.carisiswadalam') }}" method="post" class="search-form">
            @csrf
            <input type="text" name="search" placeholder="Cari Siswa..." required maxlength="100">
            <button type="submit" class="fas fa-search" name="search_btn"></button>
        </form> --}}

        <div class="icons">


            <div id="user-btn" class="fas fa-user"></div>
        </div>

        <div class="profile">

            <img src="{{ asset('uploaded_files/' . $siswaImage) }}" alt="">
            <h3>{{ $siswaName }}</h3>
                <span>Siswa</span>
            <a href="{{ url('/katalogbuku') }}" class="btn">Katalog Buku</a>
            <a href="{{ url('/historybuku') }}" class="btn">History</a>
            <a href="{{ url('/bookmarkbuku') }}" class="btn">Bookmark</a>
            <a href="{{ route('logoutsp') }}" onclick="return confirm('Anda Yakin Ingin Keluar?');"
            class="delete-btn">Keluar</a>

        </div>

    </section>

</header>

<section class="form-container" style="min-height: calc(100vh - 19rem);">

    <form action="{{ route('siswa.updatesiswa') }}" method="post" enctype="multipart/form-data" id="formup">

        @csrf
        @method('put')
       <h3>Update Profil Siswa</h3>
       <div class="flex">
        <div class="col">
           <p>Nama Siswa : </p>
           <input type="text" name="nama" value="{{ $siswa->nama }}" maxlength="100"  class="box">

           @if ($siswa->image)
           <img src="{{ asset('uploaded_files/' . $siswa->image) }}" alt="Foto Siswa" width="150">
       @endif
        </div>
        <div class="col">
           <p>Password Lama :</p>
           <input type="password" name="old_pass" placeholder="Masukkan password lama" maxlength="20"  class="box">
           <p>Password Baru :</p>
           <input type="password" name="new_pass" placeholder="Masukkan password baru" maxlength="20"  class="box">
           <p>Konfirmasi Password :</p>
           <input type="password" name="cpass" placeholder="Konfirmasi password baru" maxlength="20"  class="box">
        </div>
     </div>
     <p>Unggah Foto Profil </p>
     <input type="file" name="image" accept="image/*"  class="box" id="image">
     <small id="image-error" style="display: none; font-size: 1.7rem; color: #888; text-align: center;">*Ukuran file terlalu besar (maks. 5 MB)</small>
     <input type="submit" name="submit" value="update now" class="btn">

    </form>

 </section>
 <script>
    const form = document.getElementById('formup');
    const imageField = document.getElementById('image');
    const imageError = document.getElementById('image-error');

    form.addEventListener('submit', function(event) {
        if (imageField.files[0].size > 2048 * 1024) {
            event.preventDefault();
            imageError.style.display = 'block';
        } else {
            imageError.style.display = 'none';
        }
    });
</script>
@endsection
