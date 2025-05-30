@extends('components.adminheader')
@section('main')
<link rel="stylesheet" href="assets/css/admin_style.css">

<header class="header">

    <section class="flex">

        <a href="{{ url('/dashboardguru') }}" class="logo">Guru</a>

        {{-- <form action="{{ route('detailsiswa.carisiswadalam') }}" method="post" class="search-form">
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
            <a href="{{ url('/profilesp') }}" class="btn">Lihat Profil</a>

            <a href="{{ route('logoutad') }}" onclick="return confirm('Anda Yakin Ingin Logout?');"
            class="delete-btn">log out</a>

        </div>

    </section>

</header>

<section class="tutor-profile" style="min-height: calc(100vh - 19rem);">

    <h1 class="heading">Detail Profil</h1>

    @if (session('success'))
    <div class="modal-box" id="success-message">
        <i class="fa-solid fa-check-to-slot"></i>
        <h2>Sukses</h2>
        <h3>{{ session('success') }}</h3>
        <div class="but">
            <button class="tutupbut" onclick="closeModalAndClearSession()">OK</button>
        </div>
    </div>
    @elseif (session('error'))
        <div id="error-message" class="popup-message">{{ session('error') }}</div>
    @endif

    <div class="details">

       <div class="tutor">
        <img src="{{ asset('uploaded_files/' . $guruImage) }}" alt="">
        <h3>{{ $guruName }}</h3>
        <span>{{ $guruProfesi }}</span>
        <a href="{{ route('tutors.editguru', $tutorsId) }}" class="inline-btn">Update Profil</a>
       </div>

       <div class="flex">

        <div class="box">
           <span>{{ $totalUsers }}</span>
           <p>Total Siswa</p>
           <a href="{{ route('siswaguru.index') }}" class="btn">Lihat Siswa</a>
        </div>
        <div class="box">
           <span>{{ $totalBuku }}</span>
           <p>Total Buku</p>
           <a href="{{ route('contentguru.index') }}" class="btn">Lihat Buku</a>
        </div>
        {{-- <div class="box">
           <span></span>
           <p>total comments</p>
           <a href="" class="btn">view comments</a>
        </div> --}}
     </div>

    </div>

 </section>
@endsection
