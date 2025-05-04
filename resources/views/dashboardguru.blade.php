@extends('components.adminheader')
@section('main')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<header class="header">

    <section class="flex">

        <a href="{{ url('/dashboardguru') }}" class="logo">Admin</a>

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

            <a href="{{ route('logoutsp') }}" onclick="return confirm('Anda Yakin Ingin Logout?');"
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
                    <a href="{{ route('contentsp.index') }}">
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

                    <a href="{{ route('siswa.index') }}">
                        <li><i class='bx bx-user'></i>
                            <span class="info">
                                <h3>
                                    {{ $totalUsers }}
                                </h3>
                                <p>Total Siswa</p>
                            </span>
                        </li>
                    </a>

                    <a href="#" style="color: black">
                        <li><i class='bx bx-exclamation-circle-solid'></i>
                            <span class="info">
                                <h4 style="font-size: 17px">
                                    {{-- Rp  {{ number_format($totalHargaTransaksi, 0, ',', '.') }} --}}
                                </h4>
                                <p>Informasi</p>
                            </span>
                        </li>
                    </a>

                    <a href="{{ route('tutor.index') }}">
                        <li><i class='bx bx-user'></i>
                            <span class="info">
                                <h3>

                                </h3>
                                <p>Total Guru</p>
                            </span>
                        </li>
                    </a>
                </ul>
                <!-- End of Insights -->

                <div class="bottom-data">
                    <div class="orders">
                        <div class="col"><h3>Area Chart</h3>{!! $areaChart->container() !!}</div>
                    </div>

                </div>



            </main>

        </div>





    </section>
    <script src="{{ $areaChart->cdn() }}"></script>
    {{ $areaChart->script() }}
@endsection
