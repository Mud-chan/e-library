<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin ({{ $userName }})</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script async src="https://cse.google.com/cse.js?cx=627a280c18021424e"></script>

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin_style.css') }}">
    <link rel="icon" href="{{ asset('assets/images/logo2.png') }}">

</head>

<body>
    <div class="side-bar">

        <div class="close-side-bar">
            <i class="fas fa-times"></i>
        </div>

        <div class="profile">

            <img src="{{ asset('uploaded_files/' . $userImage) }}" alt="">
            <h3>{{ $userName }}</h3>
            <span>{{ $userProfesi }}</span>
            <a href="{{ url('profilesp') }}" class="btn">Lihat Profil</a>

        </div>

        <nav class="navbar">
            <a href="{{ url('/dashboardsp') }}"><i class="fas fa-home"></i><span>Beranda</span></a>
            <a href="{{ route('contentsp.index') }}"><i class="fa-solid fa-book"></i><span>Buku</span></a>
            <a href="{{ route('tutor.index') }}"><i class="fa-solid fa-user-graduate"></i><span>Guru</span></a>
            <a href="{{ route('siswa.index') }}"><i class="fas fa-graduation-cap"></i><span>Siswa</span></a>

            {{-- <a href=""><i class="fa-solid fa-circle-dollar-to-slot"></i><span>Peminjaman</span></a> --}}
            <a href="{{ route('logoutsp') }}" onclick="return confirm('Anda Yakin Ingin Logout?');"><i class="fas fa-right-from-bracket"></i><span>Log out</span></a>

        </nav>

    </div>

    <!-- side bar section ends -->
    <main>
        @yield('main')
    </main>
    <script src="{{ asset('assets/js/admin_script.js') }}"></script>
</body>

</html>
