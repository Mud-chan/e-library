@extends('components.adminheader')
@section('main')
<link rel="stylesheet" href="{{ asset('assets/css/admin_style.css') }}">
{{-- <script src="{{ asset('assets/js/admin_script.js') }}"></script> --}}

<header class="header">

    <section class="flex">

        <a href="{{ url('/dashboardguru') }}" class="logo">Guru</a>
{{--
        <form action="{{ route('detailsiswa.carisiswadalam') }}" method="post" class="search-form">
            @csrf
            <input type="text" name="search" placeholder="Cari Siswa..." required maxlength="100">
            <button type="submit" class="fas fa-search" name="search_btn"></button>
        </form> --}}

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>

        <div class="profile">

            <img src="{{ asset('uploaded_files/' . $guruImage) }}" alt="">
            <h3>{{ $guruName }}</h3>
            <span>{{ $guruProfesi }}</span>
            <a href="{{ url('/profileguru') }}" class="btn">Lihat Profil</a>

            <a href="{{ route('logoutad') }}" onclick="return confirm('Anda Yakin Ingin Keluar?');"
            class="delete-btn">Keluar</a>

        </div>

    </section>

</header>

<section class="form-container" style="min-height: calc(100vh - 19rem);">

    <form action="{{ route('tutors.updateguru', $tutor->id) }}" method="post" enctype="multipart/form-data" id="formup">
        @csrf
        @method('put')
       <h3>Update Profil Guru</h3>
       <div class="flex">
        <div class="col">
           <p>Nama Anda : </p>
           <input type="text" name="nama" placeholder="{{ $tutor->nama }}" maxlength="100"  class="box">

           <p>Mengajar Pada Kelas...<span>*</span></p>
            <select name="mengampu" class="box" required>
                <option value="{{ $tutor->mengampu }}" selected>{{ $tutor->mengampu }}</option>
                <option value="Kelas 1">Kelas 1</option>
                <option value="Kelas 2">Kelas 2</option>
                <option value="Kelas 3">Kelas 3</option>
                <option value="Kelas 4">Kelas 4</option>
                <option value="Kelas 5">Kelas 5</option>
                <option value="Kelas 6">Kelas 6</option>
            </select>
           {{-- <select name="profession" class="box">
              <option value="" selected>{{ $tutor->profession }}</option>
              <option value="developer">developer</option>
              <option value="desginer">designer</option>
              <option value="musician">musician</option>
              <option value="biologist">biologist</option>
              <option value="teacher">teacher</option>
              <option value="engineer">engineer</option>
              <option value="lawyer">lawyer</option>
              <option value="accountant">accountant</option>
              <option value="doctor">doctor</option>
              <option value="journalist">journalist</option>
              <option value="photographer">photographer</option>
           </select> --}}
           <p>Email Anda :</p>
           <input type="email" name="email" placeholder="{{ $tutor->email }}" maxlength="100"  class="box">
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
