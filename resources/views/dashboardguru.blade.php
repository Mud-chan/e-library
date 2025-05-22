@extends('components.adminheader')
@section('main')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<header class="header">

    <section class="flex">

        <a href="{{ url('/dashboardguru') }}" class="logo">Guru</a>

        {{-- <form action="{{ route('pages.carisiswasp') }}" method="post" class="search-form">
            @csrf
            <input type="text" name="search" placeholder="Cari Siswa..." required maxlength="100">
            <button type="submit" class="fas fa-search" name="search_btn"></button>
        </form> --}}
        <form action="" method="post" class="search-form">
            @csrf
            <input type="text" name="search" placeholder="Cari Siswa..." required maxlength="100">
            <button type="submit" class="fas fa-search" name="search_btn"></button>
        </form>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>



        <div class="profile">

            <img src="{{ asset('uploaded_files/' . $guruImage) }}" alt="">
            <h3>{{ $guruName }}</h3>
            <span>{{ $guruProfesi }}</span>
            <a href="{{ url('profileguru') }}" class="btn">view profile</a>

            <a href="{{ route('logoutad') }}" onclick="return confirm('Anda Yakin Ingin Logout?');"
            class="delete-btn">log out</a>

        </div>

    </section>

</header>


    <section class="dashboard">






        <div class="content">

            <main>
                {{-- <div class="header">
                    <div class="left">
                        <h1>Dashboard</h1>
                    </div>
                </div> --}}

                <!-- Insights -->
                <ul class="insights">
                    <a href="{{ route('contentguru.index') }}">
                        <li>
                            <i class='bx bx-book-open'></i>
                            <span class="info">
                                <h3>
                                    {{ $totalBuku }}
                                </h3>
                                <p>Total Buku</p>
                            </span>
                        </li>
                    </a>

                    <a href="{{ route('siswaguru.index') }}">
                        <li><i class='bx bx-user'></i>
                            <span class="info">
                                <h3>
                                    {{ $totalUsers }}
                                </h3>
                                <p>Total Siswa</p>
                            </span>
                        </li>
                    </a>
                    {{-- <a href="{{ route('tutor.index') }}">
                        <li><i class='bx bx-user'></i>
                            <span class="info">
                                <h3>

                                </h3>
                                <p>Total Guru</p>
                            </span>
                        </li>
                    </a> --}}
                </ul>
                <!-- End of Insights -->

                <div class="bottom-data">
                    <div class="orders">
                        <div class="col">
                            <h3>Siswa Chart</h3>
                            <form method="GET" action="{{ route('pages.dashboardsp') }}" class="mb-3">
                                <input type="month" name="month" value="{{ $selectedMonthsis }}" class="form-control"
                                    style="width: 200px; background-color: #28c76f; color: white; border: none; padding: 8px; border-radius: 5px;">
                                <button type="submit" class="btn btn-success mt-2">Tampilkan</button>
                            </form>
                            {!! $barChartSiswa->container() !!}
                        </div>
                    </div>
                    <div class="orders">
                        <div class="col">
                            <h3>Guru Chart</h3>
                            <form method="GET" action="{{ route('pages.dashboardsp') }}" class="mb-3">
                                <input type="month" name="month" value="{{ $selectedMonth }}" class="form-control"
                                    style="width: 200px; background-color: #28c76f; color: white; border: none; padding: 8px; border-radius: 5px;">
                                <button type="submit" class="btn btn-success mt-2">Tampilkan</button>
                            </form>
                            {!! $barChartGuru->container() !!}
                        </div>
                    </div>
                    <div class="orders">
                        <div class="col">
                            <h3>Buku Paling Banyak Dibaca</h3>
                            <form method="GET" action="{{ route('pages.dashboardsp') }}" class="mb-3">
                                <input type="month" name="month" value="{{ $selectedMonth }}" class="form-control"
                                    style="width: 200px; background-color: #28c76f; color: white; border: none; padding: 8px; border-radius: 5px;">
                                <button type="submit" class="btn btn-success mt-2">Tampilkan</button>
                            </form>
                            {!! $barChartBuku->container() !!}
                        </div>
                    </div>

                </div>



            </main>

        </div>





    </section>
    <script src="{{ $barChartSiswa->cdn() }}"></script>
    {{ $barChartSiswa->script() }}
    <script src="{{ $barChartGuru->cdn() }}"></script>
    {{ $barChartGuru->script() }}
    <script src="{{ $barChartBuku->cdn() }}"></script>
    {{ $barChartBuku->script() }}
@endsection
