<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script async src="https://cse.google.com/cse.js?cx=50277ad2efc244574"></script>

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="{{ asset('assets/css/siswa_style.css') }}">
    <link rel="icon" href="{{ asset('assets/images/demo/start-hub-2/logo/sidelogo.png') }}">

</head>

<body>
    <main>
        @yield('main')
    </main>
    <script src="{{ asset('assets/js/siswa_script.js') }}"></script>
</body>

</html>