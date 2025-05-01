<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta content="./assets/images/common/og-image.jpg" property="og:image">
    <link href="assets/vendors/liquid-icon/lqd-essentials/lqd-essentials.min.css" rel="stylesheet">
    <link href="assets/css/theme.min.css" rel="stylesheet">
    <link href="assets/css/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/utility.min.css" rel="stylesheet">
    <link href="assets/css/demo/start-hub-2.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link href="css2?family=Be+Vietnam+Pro:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="icon" href="{{ asset('assets/images/logodummy.png') }}">


    <title>E-Library</title>

    <style>
        .product-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 24px;
            padding: 20px;
        }

        .product-card {
            width: 240px;
            background: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .image-wrapper {
            position: relative;
        }

        .product-thumb {
            width: 100%;
            height: auto;
            border-radius: 12px;
            background-color: #e0e7ff;
            object-fit: cover;
        }

        .title {
            margin-top: 16px;
            font-weight: 600;
            font-size: 18px;
        }

        .desc {
            font-size: 14px;
            color: #6c757d;
            margin: 6px 0;
        }

        .price {
            font-weight: bold;
            font-size: 16px;
            color: #2c3e50;
            margin: 6px 0 12px 0;
        }

        .btn-view {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .btn-view:hover {
            background-color: #0056b3;
        }

        .hubungi-kami {
            text-align: center;
            padding: 50px 20px;
            font-family: Arial, sans-serif;
        }

        .hubungi-kami h2 {
            font-weight: bold;
            font-size: 24px;
        }

        .subjudul {
            color: #28c76f;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .kontainer-form {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .gambar img {
            width: 225px;
            height: 325px;
            border-radius: 20px;
            object-fit: cover;
            display: block;
        }


        .form-kontak {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .form-kontak label {
            font-weight: bold;
            text-align: left;
        }

        .form-kontak input,
        .form-kontak textarea {
            padding: 10px;
            border-radius: 10px;
            border: none;
            background: #d6f5e1;
            font-size: 14px;
        }

        .form-kontak textarea {
            min-height: 100px;
            resize: none;
        }

        .form-kontak button {
            background: #28c76f;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .form-kontak button:hover {
            background: #1fa95a;
        }
        ::-webkit-scrollbar {
            display: none;
        }

        .badge {
        background-color: #28c76f;
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        }


        .grid-buku {
        display: grid;
        grid-template-columns: repeat(auto-fit, 15rem);
        gap: 20px;
        margin-bottom: 30px;
        /* display: flex; */
        gap: 20px;
        justify-content: center;

        }


        .kartu-buku {
        background: white;
        width: 250px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        padding: 10px;
        text-align: center;
        }

        .kartu-buku img {
        width: 230px;
        height: 80%;
        border-radius: 10px;
        object-fit: cover;
        }

        .kartu-buku .judul {
        font-size: 14px;
        margin-top: 10px;
        font-weight: bold;
        }

        @media only screen and (max-width: 500px) {

        .grid-buku {

        flex-wrap: wrap;
        }

        .kartu-buku {
        width: 150px;
        }

        .kartu-buku img {
        width: 130px;
        height: 160px;
        border-radius: 10px;
        object-fit: cover;
        }


    </style>

</head>

<body data-disable-animations-onmobile="true" data-mobile-header-builder="true" data-mobile-header-scheme="gray"
    data-mobile-logo-alignment="default" data-mobile-nav-breakpoint="1199" data-mobile-nav-scheme="dark"
    data-mobile-nav-style="modern" data-mobile-nav-trigger-alignment="right" data-overlay-onmobile="true">
    <div id="wrap">
        <div class="lqd-sticky-placeholder hidden"></div>
        <header class="main-header main-header-overlay" data-sticky-header="true" data-sticky-values-measured="false"
            id="site-header">
            <div class="border-bottom text-white-10 pl-30 pr-10 module-header">
                <div class="container-fluiud flex items-center justify-between">
                    <div class="w-25percent flex items-center justify-start xl:w-15percent lg:w-40percent">
                        <div class="flex navbar-brand-plain py-20 sm:hidden"><a class="navbar-brand flex p-0 relative"
                                href="/" rel="home"><span class="navbar-brand-inner post-rel"><img
                                        alt="image" class="logo-sticky"
                                        src="assets/images/demo/start-hub-2/logo/logo-d-1.svg"> <img alt="E-library"
                                        class="logo-default"
                                        src=""></span></a>
                        </div>
                        <div class="navbar-brand-plain py-20 xxl:hidden xl:hidden sm:flex"><a
                                class="navbar-brand flex p-0 relative" href="/" rel="home"><span
                                    class="navbar-brand-inner post-rel"><img alt="image" class="logo-sticky"
                                        src="assets/images/demo/start-hub-2/logo/logo-mob-d.svg">
                                    <img alt="image" class="logo-default"
                                        src="assets/images/demo/start-hub-2/logo/logo.png"></span></a>
                        </div>
                    </div>
                    <div class="w-50percent flex items-center justify-center header-desktop xl:w-55percent lg:hidden">
                        <div class="module-primary-nav flex link-14">
                            <div aria-expanded="false"
                                class="link-font-medium navbar-collapse inline-flex p-0 lqd-submenu-default-style"
                                role="navigation">
                                <ul class="main-nav flex reset-ul inline-ul lqd-menu-counter-right lqd-menu-items-inline main-nav-hover-fill lqd-submenu-toggle-hover link-white"
                                    data-localscroll="true"
                                    data-localscroll-options="{&quot;itemsSelector&quot;:&quot;> li > a&quot;, &quot;trackWindowScroll&quot;: true, &quot;includeParentAsOffset&quot;: true}"
                                    data-submenu-options="{&quot;toggleType&quot;: &quot;fade&quot;, &quot;handler&quot;: &quot;mouse-in-out&quot;}">
                                    <li class="menu-item-home is-active"><a href="#banner"><span>Beranda</span> </a></li>
                                    <li><a href="#about"><span>Keunggulan</span> </a></li>
                                    <li class="menu-item-has-children position-applied"><a href="#koleksi"><span>Koleksi
                                                Buku</span> <span class="submenu-expander"><svg height="32"
                                                    style="width: 1em; height: 1em;" viewbox="0 0 21 32" width="21"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.5 18.375l7.938-7.938c.562-.562 1.562-.562 2.125 0s.562 1.563 0 2.126l-9 9c-.563.562-1.5.625-2.063.062L.437 12.562C.126 12.25 0 11.876 0 11.5s.125-.75.438-1.063c.562-.562 1.562-.562 2.124 0z"
                                                        fill="currentColor"></path>
                                                </svg> </span> </a></li>
                                    <li><a href="#informasi"><span>Informasi</span> </a></li>
                                    <li><a href="#kontak"><span>Hubungi Kami</span> </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-25percent flex items-center justify-end mr-20 lg:w-60percent lg:mr-0">
                        <div class="flex items-center justify-end">

                            <div class="ml-15 ld-module-sd ld-module-sd-hover ld-module-sd-right xxl:hidden lg:block">
                                <button aria-expanded="false"
                                    class="bg-transparent border-none nav-trigger flex relative items-center justify-center style-6 collapsed"
                                    data-bs-target="#lqd-drawer-mobile" data-bs-toggle="collapse"
                                    data-ld-toggle="true"
                                    data-toggle-options="{&quot;cloneTriggerInTarget&quot;: false, &quot;type&quot;: &quot;click&quot;}"
                                    role="button" type="button">
                                    <span class="bars inline-block relative z-1"><span
                                            class="bars-inner flex flex-col w-full h-full"><span
                                                class="bar inline-block relative"></span> <span
                                                class="bar inline-block relative"></span> <span
                                                class="bar inline-block relative"></span></span></span></button>
                                <div class="ld-module-dropdown collapse absolute" id="lqd-drawer-mobile">
                                    <div class="ld-sd-wrap">
                                        <div class="p-40 ld-sd-inner justify-center flex-col">
                                            <div class="module-primary-nav flex">
                                                <div aria-expanded="false"
                                                    class="w-full navbar-collapse inline-flex p-0 lqd-submenu-default-style"
                                                    id="main-header-collapse" role="navigation">
                                                    <ul class="main-nav flex reset-ul lqd-menu-counter-right lqd-menu-items-block main-nav-hover-default"
                                                        data-localscroll="true"
                                                        data-localscroll-options="{&quot;itemsSelector&quot;:&quot;> li > a&quot;, &quot;trackWindowScroll&quot;: true, &quot;includeParentAsOffset&quot;: true}"
                                                        data-submenu-options="{&quot;toggleType&quot;: &quot;slide&quot;, &quot;handler&quot;: &quot;click&quot;}"
                                                        id="primary-nav">
                                                        <li class="menu-item-home is-active"><a
                                                                class="w-full text-20 text-black font-medium leading-1/5em"
                                                                href="#banner"><span>Beranda</span> <span
                                                                    class="link-icon inline-flex hide-if-empty right-icon"><i
                                                                        class="lqd-icn-ess icon-ion-ios-arrow-down"></i></span></a>
                                                        </li>
                                                        <li><a class="w-full text-20 text-black font-medium leading-1/5em"
                                                                href="#about"><span>Keunggulan</span> <span
                                                                    class="link-icon inline-flex hide-if-empty right-icon"><i
                                                                        class="lqd-icn-ess icon-ion-ios-arrow-down"></i></span></a>
                                                        </li>
                                                        <li class="menu-item-has-children"><a
                                                                class="w-full text-20 text-black font-medium leading-1/5em"
                                                                href="#koleksi"><span>Koleksi Buku</span> <span
                                                                class="link-icon inline-flex hide-if-empty right-icon"><i
                                                                    class="lqd-icn-ess icon-ion-ios-arrow-down"></i></span></a>
                                                        </li>
                                                        <li><a class="w-full text-20 text-black font-medium leading-1/5em"
                                                                href="#informasi"><span>Informasi</span> <span
                                                                    class="link-icon inline-flex hide-if-empty right-icon"><i
                                                                        class="lqd-icn-ess icon-ion-ios-arrow-down"></i></span></a>
                                                        </li>
                                                        <li><a class="w-full text-20 text-black font-medium leading-1/5em"
                                                                href="#kontak"><span>Hubungi Kami</span> <span
                                                                    class="link-icon inline-flex hide-if-empty right-icon"><i
                                                                        class="lqd-icn-ess icon-ion-ios-arrow-down"></i></span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            {{-- <div class="flex justify-start mt-25 gap-25"><a
                                                    class="icon social-icon social-icon-facebook animation-pulse-grow text-26 w-25"
                                                    href="#" target="_blank"><span
                                                        class="sr-only">Facebook</span>
                                                    <svg class="w-1em h-1em relative block" fill="#0000003D"
                                                        viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z">
                                                        </path>
                                                    </svg>
                                                </a><a
                                                    class="icon social-icon social-icon-twitter animation-pulse text-26 w-25-grow"
                                                    href="#" target="_blank"><span
                                                        class="sr-only">Twitter</span>
                                                    <svg class="w-1em h-1em relative block" fill="#0000003D"
                                                        viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                                        </path>
                                                    </svg>
                                                </a><a
                                                    class="icon social-icon social-icon-github animation-pulse-grow text-26 w-25"
                                                    href="#" target="_blank"><span
                                                        class="sr-only">Github</span>
                                                    <svg class="w-1em h-1em relative block" fill="#0000003D"
                                                        viewbox="0 0 496 512" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z">
                                                        </path>
                                                    </svg>
                                                </a></div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="lqd-module-backdrop"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lqd-stickybar-wrap lqd-stickybar-right w-auto items-end pointer-events-none">
                <div class="static flex flex-col flex-grow-1 items-end justify-center vertical-rl p-10 mr-60"><a
                        class="btn btn-solid btn-sm btn-icon-left btn-icon-circle btn-icon-custom-size btn-icon-solid pointer-events-auto horizontal-tb -ml-60 bg-white text-15 font-medium text-gray-600 shadow-md rounded-100 hover:text-white hover:bg-primary"
                        data-lity="#contact-modal" href="#kontak"><span class="btn-txt"
                            data-text="Contact us">Hubungi Kami</span> <span
                            class="btn-icon mr-15 w-35 h-35 text-blue-300 bg-blue-100"><svg class="w-20"
                                fill="currentColor" height="16.522" viewbox="0 0 19.955 16.522" width="19.955"
                                xmlns="http://www.w3.org/2000/svg">
                                <g transform="translate(-6.045 -8.06)">
                                    <path
                                        d="M7.546,14.774l-.158,0a7.354,7.354,0,0,1-4.107-1.245L1.539,14.577c-.637.382-1.049.1-.92-.63l.474-2.69a7.389,7.389,0,0,1,11.055-9.52,7.725,7.725,0,0,0-4.6,13.038Z"
                                        fill="#6abbd7" transform="translate(6.045 8.06)"></path>
                                    <path
                                        d="M0,7.5a7.5,7.5,0,1,1,13.891,3.927l.492,2.79c.124.706-.274.983-.89.612l-1.824-1.095A7.5,7.5,0,0,1,0,7.5Z"
                                        fill="#008aba" transform="translate(11 9.582)"></path>
                                </g>
                            </svg></span></a></div>
            </div>
        </header>
        <main class="content">
            <div id="lqd-contents-wrap">
                <section class="lqd-section banner pt-140 pb-400 transition-all bg-transparent text-white-50 relative"
                    id="banner" style="background-image: linear-gradient(120deg, #62E19F 0%, #2BCA77 100%);">
                    <div class="lqd-shape lqd-shape-bottom" data-negative="false">
                        <svg class="lqd-custom-shape" fill="none" height="461" preserveaspectratio="none"
                            viewbox="0 0 1440 461" width="1440" xmlns="http://www.w3.org/2000/svg">
                            <path class="lqd-shape-fill"
                                d="m0 131.906 34.4-20.017c34.4-19.9 103.2-59.936 171.68-82.979 68.64-23.043 136.8-29.328003 205.44-4.306 68.48 25.022 137.28 81.35 205.76 80.768 68.64-.582 136.8-58.074 205.44-84.608 68.48-26.535 137.28-22.345 205.76-16.06 68.64 6.168 136.8 14.315 205.44 22.811 68.48 8.612 137.28 17.457 171.68 22l34.4 4.422v396.851h-1440z"
                                fill="#49DD90" fill-opacity="1">
                                <animate attributename="d" dur="10s" fill="freeze" repeatcount="indefinite"
                                    values="M0 131.906L34.4 111.889C68.8 91.989 137.6 51.953 206.08 28.91C274.72 5.867 342.88 -0.418001 411.52 24.604C480 49.626 548.8 105.954 617.28 105.372C685.92 104.79 754.08 47.298 822.72 20.764C891.2 -5.771 960 -1.581 1028.48 4.704C1097.12 10.872 1165.28 19.019 1233.92 27.515C1302.4 36.127 1371.2 44.972 1405.6 49.515L1440 53.937V450.788H0L0 131.906Z; M0 122.906L36.5 109C71.5 96.372 102.52 67.98 171 44.937C239.64 21.894 354.36 51.478 423 76.5C491.48 101.522 546.52 19.097 615 18.515C683.64 17.933 799.36 58.534 868 32C936.48 5.46499 1039.52 54.715 1108 61C1176.64 67.168 1190.36 -6.996 1259 1.5C1327.48 10.112 1371.2 35.972 1405.6 40.515L1440 44.937V441.788H0L0 122.906Z; M0 131.906L34.4 111.889C68.8 91.989 137.6 51.953 206.08 28.91C274.72 5.867 342.88 -0.418001 411.52 24.604C480 49.626 548.8 105.954 617.28 105.372C685.92 104.79 754.08 47.298 822.72 20.764C891.2 -5.771 960 -1.581 1028.48 4.704C1097.12 10.872 1165.28 19.019 1233.92 27.515C1302.4 36.127 1371.2 44.972 1405.6 49.515L1440 53.937V450.788H0L0 131.906Z">
                                </animate>
                            </path>
                            <path class="lqd-shape-fill"
                                d="M0 154.75L34.4 142.201C68.8 129.53 137.6 104.433 206.08 99.072C274.72 93.833 342.88 108.453 411.52 122.099C480 135.622 548.8 148.293 617.28 142.811C685.92 137.329 754.08 113.693 822.72 113.693C891.2 113.693 960 137.329 1028.48 152.68C1097.12 168.153 1165.28 175.463 1233.92 184.966C1302.4 194.591 1371.2 206.287 1405.6 212.257L1440 218.105V452.025H0L0 154.75Z"
                                fill="#25BF6F" fill-opacity="1">
                                <animate attributename="d" dur="8s" fill="freeze" repeatcount="indefinite"
                                    values="M0 154.75C0 154.75 12.8 142.902 34.4 142.201C56 141.5 140.02 160.111 208.5 154.75C277.14 149.511 334.36 112.57 403 126.216C471.48 139.739 552.52 190.448 621 184.966C689.64 179.484 745.36 116 814 116C882.48 116 950.52 161.149 1019 176.5C1087.64 191.973 1154.36 123.997 1223 133.5C1291.48 143.125 1371.2 206.287 1405.6 212.257L1440 218.105V452.025H0L0 154.75Z; M0 154.75C0 154.75 33.4 177.201 55 176.5C76.6 175.799 137.52 110.361 206 105C274.64 99.761 332.86 141.104 401.5 154.75C469.98 168.273 527.52 206.982 596 201.5C664.64 196.018 747.86 75 816.5 75C884.98 75 956.52 118.149 1025 133.5C1093.64 148.973 1163.36 87.497 1232 97C1300.48 106.625 1371.2 206.287 1405.6 212.257L1440 218.105V452.025H0L0 154.75Z; M0 154.75C0 154.75 12.8 142.902 34.4 142.201C56 141.5 140.02 160.111 208.5 154.75C277.14 149.511 334.36 112.57 403 126.216C471.48 139.739 552.52 190.448 621 184.966C689.64 179.484 745.36 116 814 116C882.48 116 950.52 161.149 1019 176.5C1087.64 191.973 1154.36 123.997 1223 133.5C1291.48 143.125 1371.2 206.287 1405.6 212.257L1440 218.105V452.025H0L0 154.75Z">
                                </animate>
                            </path>
                            <path class="lqd-shape-fill"
                                d="M0 340.22L34.4 333.92C68.8 327.52 137.6 314.92 206.08 312.22C274.72 309.52 342.88 316.92 411.52 319.72C480 322.52 548.8 320.92 617.28 318.92C685.92 316.92 754.08 314.52 822.72 316.02C891.2 317.52 960 322.92 1028.48 309.42C1097.12 295.92 1165.28 263.52 1233.92 251.02C1302.4 238.52 1371.2 245.92 1405.6 249.52L1440 253.22V453.22H0L0 340.22Z"
                                fill="#096636" fill-opacity="1">
                                <animate attributename="d" dur="6.5s" fill="freeze" repeatcount="indefinite"
                                    values="M0 340.22L34.4 333.92C68.8 327.52 139.02 281.2 207.5 278.5C276.14 275.8 351.86 331.12 420.5 333.92C488.98 336.72 554.52 289 623 287C691.64 285 756.86 332.42 825.5 333.92C893.98 335.42 960 322.92 1028.48 309.42C1097.12 295.92 1163.36 236 1232 223.5C1300.48 211 1371.2 245.92 1405.6 249.52L1440 253.22V453.22H0L0 340.22Z; M0 340.22L37.5 323C71.9 316.6 137.52 336.62 206 333.92C274.64 331.22 339.86 272.2 408.5 275C476.98 277.8 551.02 304 619.5 302C688.14 300 759.36 266.5 828 268C896.48 269.5 962.02 336.5 1030.5 323C1099.14 309.5 1156.36 232.5 1225 220C1293.48 207.5 1364.1 249.62 1398.5 253.22L1440 253.22V453.22H0L0 340.22Z; M0 340.22L34.4 333.92C68.8 327.52 139.02 281.2 207.5 278.5C276.14 275.8 351.86 331.12 420.5 333.92C488.98 336.72 554.52 289 623 287C691.64 285 756.86 332.42 825.5 333.92C893.98 335.42 960 322.92 1028.48 309.42C1097.12 295.92 1163.36 236 1232 223.5C1300.48 211 1371.2 245.92 1405.6 249.52L1440 253.22V453.22H0L0 340.22Z">
                                </animate>
                            </path>
                            <path class="lqd-shape-fill"
                                d="M1440 337.719L1405.6 340.219C1371.2 342.719 1302.4 347.719 1233.92 350.419C1165.28 353.019 1097.12 353.419 1028.48 352.219C960 351.019 891.2 348.419 822.72 357.019C754.08 365.719 685.92 385.719 617.28 395.919C548.8 406.019 480 406.419 411.52 395.919C342.88 385.419 274.72 364.019 206.08 359.419C137.6 354.719 68.8 366.719 34.4 372.719L0 378.719V460.719H1440V337.719Z"
                                fill="#fff" fill-opacity="1">
                                <animate attributename="d" dur="5.5s" fill="freeze" repeatcount="indefinite"
                                    values="M1440 337.719L1405.6 340.219C1371.2 342.719 1303.98 362.8 1235.5 365.5C1166.86 368.1 1090.14 324.2 1021.5 323C953.02 321.8 889.48 383.4 821 392C752.36 400.7 678.64 368.519 610 378.719C541.52 388.819 473.48 414.5 405 404C336.36 393.5 273.64 342.319 205 337.719C136.52 333.019 68.8 366.719 34.4 372.719L0 378.719V460.719H1440V337.719Z; M1440 337.719L1405.6 340.219C1371.2 342.719 1295.98 326.3 1227.5 329C1158.86 331.6 1081.64 391.2 1013 390C944.52 388.8 874.48 364.119 806 372.719C737.36 381.419 675.14 296.3 606.5 306.5C538.02 316.6 471.48 383.219 403 372.719C334.36 362.219 272.64 320.6 204 316C135.52 311.3 68.8 366.719 34.4 372.719L0 378.719V460.719H1440V337.719Z; M1440 337.719L1405.6 340.219C1371.2 342.719 1303.98 362.8 1235.5 365.5C1166.86 368.1 1090.14 324.2 1021.5 323C953.02 321.8 889.48 383.4 821 392C752.36 400.7 678.64 368.519 610 378.719C541.52 388.819 473.48 414.5 405 404C336.36 393.5 273.64 342.319 205 337.719C136.52 333.019 68.8 366.719 34.4 372.719L0 378.719V460.719H1440V337.719Z">
                                </animate>
                            </path>
                        </svg>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col col-12 text-center"
                                data-ca-options="{&quot;animationTarget&quot;: &quot;.animation-element&quot;, &quot;ease&quot;: &quot;power4.out&quot;, &quot;initValues&quot;: {&quot;y&quot;: &quot;30px&quot;, &quot;rotationY&quot; : 40, &quot;opacity&quot; : 0} , &quot;animations&quot;: {&quot;y&quot;: &quot;0px&quot;, &quot;rotationY&quot; : 0, &quot;opacity&quot; : 1}}"
                                data-custom-animations="true">
                                <div class="relative flex flex-col text-center">
                                    <div class="w-auto absolute module-shape-1 -top-5percent -left-10percent sm:hidden"
                                        data-parallax="true"
                                        data-parallax-from="{&quot;x&quot;: &quot;100px&quot;, &quot;y&quot;: &quot;175px&quot;, &quot;rotationZ&quot; : -50}"
                                        data-parallax-options="{&quot;ease&quot;: &quot;linear&quot;, &quot;start&quot;: &quot;top bottom&quot;, &quot;end&quot;: &quot;bottom+=0px top&quot;}"
                                        data-parallax-to="{&quot;x&quot;: &quot;15px&quot;, &quot;y&quot;: &quot;-60px&quot;, &quot;rotationZ&quot; : 20}">
                                        <img alt="3D comment" class="animation-element" height="120"
                                            src="assets/images/demo/start-hub-2/3D/Image-752.png" width="79">
                                    </div>
                                    <div class="w-auto z-1 absolute module-shape-2 top-25percent" data-parallax="true"
                                        data-parallax-from="{&quot;y&quot;: &quot;-114px&quot;, &quot;scaleX&quot; : 0.8, &quot;scaleY&quot; : 0.8}"
                                        data-parallax-options="{&quot;ease&quot;: &quot;linear&quot;, &quot;start&quot;: &quot;top bottom&quot;, &quot;end&quot;: &quot;bottom+=0px top&quot;}"
                                        data-parallax-to="{&quot;y&quot;: &quot;115px&quot;, &quot;scaleX&quot; : 1.3, &quot;scaleY&quot; : 1.3}">
                                        <img alt="3D person" class="animation-element" height="290"
                                            src="assets/images/demo/start-hub-2/3D/3.png" width="110">
                                    </div>
                                    <div class="w-auto absolute module-shape-3 top-10percent sm:hidden"
                                        data-parallax="true"
                                        data-parallax-from="{&quot;y&quot;: &quot;245px&quot;, &quot;scaleX&quot; : 1, &quot;scaleY&quot; : 1, &quot;rotationZ&quot; : -70}"
                                        data-parallax-options="{&quot;ease&quot;: &quot;linear&quot;, &quot;start&quot;: &quot;top bottom&quot;, &quot;end&quot;: &quot;bottom+=0px top&quot;}"
                                        data-parallax-to="{&quot;y&quot;: &quot;-65px&quot;, &quot;scaleX&quot; : 1.1, &quot;scaleY&quot; : 1.1, &quot;rotationZ&quot; : 25}">
                                        <img alt="3D cloud" class="animation-element" height="196"
                                            src="assets/images/demo/start-hub-2/3D/1.png" width="87">
                                    </div>
                                    <div class="w-auto z-1 absolute module-shape-4 top-45percent" data-parallax="true"
                                        data-parallax-from="{&quot;y&quot;: &quot;-50px&quot;, &quot;scaleX&quot; : 1, &quot;scaleY&quot; : 1, &quot;rotationZ&quot; : 78}"
                                        data-parallax-options="{&quot;ease&quot;: &quot;linear&quot;, &quot;start&quot;: &quot;top bottom&quot;, &quot;end&quot;: &quot;bottom+=0px top&quot;}"
                                        data-parallax-to="{&quot;y&quot;: &quot;120px&quot;, &quot;scaleX&quot; : 1.1, &quot;scaleY&quot; : 1.1, &quot;rotationZ&quot; : -39}">
                                        <img alt="3D hand" class="animation-element" height="164"
                                            src="assets/images/demo/start-hub-2/3D/4.png" width="80">
                                    </div>
                                    <div class="relative z-2">
                                        <div class="ld-fancy-heading relative animation-element">
                                            <h1 class="ld-fh-element relative lqd-highlight-custom lqd-highlight-custom-2 mb-0/35em text-white text-50"
                                                data-delay-options="{&quot;elements&quot;: &quot;.lqd-highlight-inner&quot;, &quot;delayType&quot;: &quot;transition&quot;}"
                                                data-inview="true" data-text-rotator="true"
                                                data-transition-delay="true">
                                                <span>E - Library </span>
                                                <mark class="lqd-highlight"><span
                                                        class="lqd-highlight-txt">MI</span>
                                                    <span class="lqd-highlight-inner -bottom-0/1em left-0"><svg
                                                            class="lqd-highlight-pen" height="51"
                                                            viewbox="0 0 51 51" width="51"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M36.204 1.044C32.02 2.814 5.66 31.155 4.514 35.116c-.632 2.182-1.75 5.516-2.483 7.409-3.024 7.805-1.54 9.29 6.265 6.265 1.893-.733 5.227-1.848 7.41-2.477 3.834-1.105 4.473-1.647 19.175-16.27 0 0 10.63-10.546 15.21-15.125C53 8.997 42.021-1.418 36.203 1.044Zm7.263 5.369c3.56 3.28 4.114 4.749 2.643 6.995l-1.115 1.7-4.586-4.543-4.585-4.544 1.42-1.157C39.311 3.18 40.2 3.4 43.467 6.413ZM37.863 13.3l4.266 4.304-11.547 11.561-11.547 11.561-4.48-4.446-4.481-4.447 11.404-11.418c6.273-6.28 11.566-11.42 11.762-11.42.197 0 2.277 1.938 4.623 4.305ZM12.016 39.03l3.54 3.584-3.562 1.098-5.316 1.641c-1.665.516-1.727.455-1.211-1.21l1.614-5.226c1.289-4.177.685-4.191 4.935.113Z">
                                                            </path>
                                                        </svg> <svg aria-hidden="true"
                                                            class="lqd-highlight-brush-svg lqd-highlight-brush-svg-2"
                                                            height="13" preserveaspectratio="none"
                                                            viewbox="0 0 233 13" width="233"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="m.624 9.414-.312-2.48C0 4.454.001 4.454.002 4.454l.035-.005.102-.013.398-.047c.351-.042.872-.102 1.557-.179 1.37-.152 3.401-.368 6.05-.622C13.44 3.081 21.212 2.42 31.13 1.804 50.966.572 79.394-.48 113.797.24c34.387.717 63.927 2.663 84.874 4.429a1048.61 1048.61 0 0 1 24.513 2.34 641.605 641.605 0 0 1 8.243.944l.432.054.149.02-.318 2.479-.319 2.48-.137-.018c-.094-.012-.234-.03-.421-.052a634.593 634.593 0 0 0-8.167-.936 1043.26 1043.26 0 0 0-24.395-2.329c-20.864-1.76-50.296-3.697-84.558-4.413-34.246-.714-62.535.332-82.253 1.556-9.859.612-17.574 1.269-22.82 1.772-2.622.251-4.627.464-5.973.614a213.493 213.493 0 0 0-1.901.22l-.094.01-.028.004Z">
                                                            </path>
                                                        </svg> </span>
                                                </mark>
                                                <span class="txt-rotate-keywords"><span
                                                        class="txt-rotate-keyword active"><span>Ar-Roudhoh</span>
                                                    </span><span class="txt-rotate-keyword"><span>Ar-Roudhoh</span>
                                                    </span><span class="txt-rotate-keyword"></span></span>
                                            </h1>
                                        </div>
                                        <div class="ld-fancy-heading relative mx-25percent sm:m-0 animation-element">
                                            <p
                                                class="ld-fh-element relative text-20 mb-1/65em leading-1/25em font-medium">
                                                Kemudahan Membaca Buku Dimana Saja Kapan Saja</p>
                                        </div>
                                        <div class="relative animation-element">
                                            <a class="btn btn-solid  rounded-100 bg-white font-medium" style="padding:15px 40px; font-weight:600; color:rgb(77, 77, 77);"
                                                href="/logreg">Login
                                                </a>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lqd-sticky-sentinel invisible absolute pointer-events-none"></div>
                </section>
                <section class="lqd-section about pt-85 pb-15 bg-top-center bg-cover transition-all bg-no-repeat"
                    id="about" style="background-image: url('assets/images/demo/start-hub-2/bg/bg.svg');">
                    <div class="absolute w-auto top-30percent module-shape animation-element" data-parallax="true"
                        data-parallax-from="{&quot;y&quot;: &quot;115px&quot;, &quot;rotationZ&quot; : 60}"
                        data-parallax-options="{&quot;ease&quot;: &quot;linear&quot;, &quot;start&quot;: &quot;top bottom&quot;, &quot;end&quot;: &quot;bottom+=0px top&quot;}"
                        data-parallax-to="{&quot;y&quot;: &quot;-170px&quot;, &quot;rotationZ&quot; : -60}"><img
                            alt="3D shape circle" class="w-110" height="218"
                            src="assets/images/demo/start-hub-2/3D/small-cylinder.png" width="218"></div>
                    <div class="container">
                        <div class="row text-center justify-center">
                            <div class="col col-12 col-md-8 col-lg-6 mb-70 text-center relative p-0 module-title"
                                data-ca-options="{&quot;animationTarget&quot;: &quot;.animation-element&quot;, &quot;ease&quot;: &quot;power4.out&quot;, &quot;initValues&quot;: {&quot;y&quot;: &quot;30px&quot;, &quot;opacity&quot; : 0} , &quot;animations&quot;: {&quot;y&quot;: &quot;0px&quot;, &quot;opacity&quot; : 1}}"
                                data-custom-animations="true">
                                <div class="ld-fancy-heading relative animation-element">
                                    <h2 class="ld-fh-element m-0 inline-block relative">Kemudahan Membaca  Buku Dimana Saja</h2>
                                </div>
                                <div class="ld-fancy-heading relative animation-element">
                                    <h2 class="ld-fh-element relative ld-gradient-heading bg-transparent leading-1/2em mb-0/5em"
                                        data-text-rotator="true"
                                        style="background-image: linear-gradient(10deg, #F14DFF 0%, #E38300 85%);">
                                        <span class="txt-rotate-keywords"><span class="txt-rotate-keyword active">Kapan
                                                Saja</span> <span class="txt-rotate-keyword">Kapan
                                                Saja</span> <span class="txt-rotate-keyword">Kapan
                                                Saja</span><span class="txt-rotate-keyword">Kapan
                                                Saja</span></span>

                                    </h2>
                                </div>
                                <p class="animation-element"><span
                                        class="text-16 font-medium leading-1/2em text-blue-400">Keunggulan Website E-Library</p>
                            </div>
                            <div class="col col-12 p-0"></div>
                            <div class="col col-12 col-md-4 mb-30 border-right border-lightgray relative sm:border-0">
                                <div class="px-35 transition-all relative lg:p-0">
                                    <div class="relative iconbox flex flex-grow-1 relative flex-col iconbox-default">
                                        <div class="iconbox-icon-wrap mb-45">
                                            <div class="iconbox-icon-container inline-flex"><img alt="Coding Courses"
                                                    class="w-175" src="assets/images/demo/start-hub-2/3D/poto2.png">
                                            </div>
                                        </div>
                                        <div class="contents">
                                            <h3 class="text-20 mb-0/5em lqd-iconbox-heading">Akses 24 Jam Baca Buku
                                            </h3>
                                            <p>Dengan platform E-Library, kamu bisa membaca ribuan koleksi buku hanya dengan satu klik. Tidak perlu repot membawa buku fisik, cukup buka website kapan saja, di mana saja, lewat smartphone, tablet, atau laptop. Fleksibel untuk semua kebutuhan belajar dan hiburanmu, tanpa batasan waktu.<p>
                                        </div>
                                    </div>
                                </div>
                                <div class="lqd-imggrp-single block absolute right-0 top-10percent sm:hidden"
                                    data-parallax="true" data-parallax-from="{&quot;y&quot;: &quot;0px&quot;}"
                                    data-parallax-options="{&quot;ease&quot;: &quot;linear&quot;, &quot;start&quot;: &quot;top bottom&quot;, &quot;end&quot;: &quot;bottom+=0px top&quot;}"
                                    data-parallax-to="{&quot;y&quot;: &quot;165px&quot;}">
                                    <div
                                        class="lqd-imggrp-img-container inline-flex relative items-center justify-center">
                                        <figure class="w-full relative"><img alt="3D shape line" height="22"
                                                src="assets/images/demo/start-hub-2/3D/Line-8664.svg" width="3">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-md-4 mb-30 border-right border-lightgray relative sm:border-0">
                                <div class="px-35 transition-all relative lg:p-0">
                                    <div class="relative iconbox flex flex-grow-1 relative flex-col iconbox-default">
                                        {{-- <span
                                            class="iconbox-label inline-block absolute top-0 right-0 py-5 px-15 bg-slate-100 text-10 leading-1/5en text-black rounded-100 font-bold uppercase tracking-0/1em">Popular</span> --}}
                                        <div class="iconbox-icon-wrap mb-20">
                                            <div class="iconbox-icon-container inline-flex"><img
                                                    alt="Social Media Advertising" class="w-150"
                                                    src="assets/images/demo/start-hub-2/3D/poto1.png">
                                            </div>
                                        </div>
                                        <div class="contents">
                                            <h3 class="text-20 mb-0/5em lqd-iconbox-heading">Meningkatkan Minat Baca</h3>
                                            <p>Website E-Library kami dirancang untuk membuat pengalaman membaca menjadi lebih menarik dan menyenangkan. Dengan tampilan yang user-friendly, rekomendasi buku yang dipersonalisasi, serta fitur untuk memberikan ulasan, kami berkomitmen untuk membangun budaya membaca di era yang serba digital ini.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="lqd-imggrp-single block absolute right-0 -bottom-5percent sm:hidden"
                                    data-parallax="true" data-parallax-from="{&quot;y&quot;: &quot;0px&quot;}"
                                    data-parallax-options="{&quot;ease&quot;: &quot;linear&quot;, &quot;start&quot;: &quot;top bottom&quot;, &quot;end&quot;: &quot;bottom+=0px top&quot;}"
                                    data-parallax-to="{&quot;y&quot;: &quot;-165px&quot;}">
                                    <div
                                        class="lqd-imggrp-img-container inline-flex relative items-center justify-center">
                                        <figure class="w-full relative"><img alt="3D shape line" height="22"
                                                src="assets/images/demo/start-hub-2/3D/Line-8664.svg" width="3">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-md-4 mb-30">
                                <div class="px-35 transition-all relative lg:p-0">
                                    <div class="relative iconbox flex flex-grow-1 relative flex-col iconbox-default">
                                        <div class="iconbox-icon-wrap mb-100">
                                            <div class="iconbox-icon-container inline-flex"><img
                                                    alt="eCommerce Solutions" class="w-160"
                                                    src="assets/images/demo/start-hub-2/3D/poto3.png">
                                            </div>
                                        </div>
                                        <div class="contents">
                                            <h3 class="text-20 mb-0/5em lqd-iconbox-heading">Simpan Buku yang Disukai
                                            </h3>
                                            <p>Tak perlu khawatir kehilangan buku favorit! Di E-Library, kamu bisa menyimpan buku-buku pilihan ke dalam koleksi pribadi. Kelola daftar bacaanmu, tandai buku yang ingin dibaca, dan lanjutkan membaca kapan pun kamu mau. Semua dalam satu platform yang mudah diakses dan nyaman.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="py-5 bg-white" id="koleksi">
                    <div class="container text-center">
                        <h2 class="fw-bold mb-1">Kumpulan Koleksi Buku</h2>
                        <h5 class="text-success fw-semibold mb-4">MI Ar-Roudhoh</h5>

                        <div class="grid-buku">
                            @if ($contents->count() > 0)
                            @foreach ($contents as $content)
                              <div class="kartu-buku">
                                <a href="{{ route('detailbukusiswa.content', ['videoId' => $content->id]) }}" style="text-decoration: none; color: black;">
                                    <img src="../uploaded_files/{{ $content->thumb }}" alt="Buku" class="img-fluid rounded shadow-sm" />
                                    <p class="judul">{{ $content->judul }}</p>
                                    <div class="label-genre">
                                    <span class="badge">{{ $content->kategori }}</span>
                                    <span class="badge">{{ $content->tingkatan }}</span>
                                    </div>
                                </a>
                              </div>



                              @endforeach
                            @else
                                <p class="empty">Tidak ada buku yang ditambahkan!</p>
                            @endif
                        </div>



                        <!-- Tombol Lihat Semua -->
                        <div class="text-end mt-4">
                            <a href="{{ url('/katalogbuku') }}" class="text-success fw-semibold">Lihat Semua Buku &gt;&gt;</a>
                        </div>
                    </div>
                </section>
                <section class="lqd-section case-studies pt-55 pb-120">
                    <div class="container">
                        <div class="row justify-center">
                            <div class="col col-12 col-xl-4 col-md-8 mb-25 p-0 text-center module-title">
                                <div class="ld-fancy-heading relative">
                                    <h2 class="ld-fh-element relative mb-0/5em">Berita dan Informasi</h2>
                                </div>
                                <div class="ld-fancy-heading relative">
                                    <p class="ld-fh-element mb-0/5em inline-block relative text-16 leading-1/6em">
                                        Berita dan Informasi Seputar E-Library MI Ar-Roudhoh</p>
                                </div>
                            </div>
                            <div class="col col-12">
                                <div class="lqd-pf-grid">

                                    <div class="lqd-pf-row row flex flex-wrap relative -mr-10 -ml-10"
                                        data-liquid-masonry="true"
                                        data-masonry-options="{ &quot;filtersID&quot;:  &quot;#pf-filter-case-stuies&quot; ,  &quot;filtersCounter&quot;:  true }">
                                        <div
                                            class="lqd-pf-column col-md-6 col-12 col-xs-12 masonry-item digital-design ecommerce portfolio-single py-0 px-10">
                                            <article
                                                class="lqd-pf-item lqd-pf-item-style-1 lqd-pf-dark pf-details-h-end relative overflow-hidden liquid-portfolio type-liquid-portfolio status-publish format-standard has-post-thumbnail hentry liquid-portfolio-category-digital-design liquid-portfolio-category-ecommerce liquid-portfolio-category-portfolio-single mb-25 rounded-10">
                                                <div class="lqd-pf-item-inner">
                                                    <div class="lqd-pf-img">
                                                        <figure>
                                                            <figure class="w-full"><img alt="case Studies"
                                                                    class="w-full" height="524"
                                                                    src="assets/images/poster5.jpg"
                                                                    width="1116">
                                                            </figure>
                                                        </figure>
                                                    </div>
                                                    <div class="lqd-pf-details flex flex-wrap relative"><span
                                                            class="lqd-pf-overlay-bg lqd-overlay flex"></span>
                                                        <div
                                                            class="lqd-pf-info flex flex-wrap items-center justify-between w-full px-1/5em py-1/5em bg-white rounded-4">
                                                            <h5 class="lqd-pf-title mt-0 mb-0">Pemahaman Membaca</h5>
                                                            <ul
                                                                class="reset-ul inline-nav lqd-pf-cat inline-flex relative z-2">
                                                                {{-- <li><a href="#">Digital Design</a></li> --}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <a class="lqd-overlay flex lqd-pf-overlay-link fresco"
                                                        data-fresco-group="portfolio"
                                                        href="assets/images/poster5.jpg"></a>
                                                </div>
                                            </article>
                                        </div>
                                        <div
                                            class="lqd-pf-column col-md-6 col-12 col-xs-12 masonry-item ecommerce masonry portfolio-single py-0 px-10">
                                            <article
                                                class="lqd-pf-item lqd-pf-item-style-1 lqd-pf-dark pf-details-h-end relative overflow-hidden liquid-portfolio type-liquid-portfolio status-publish format-standard has-post-thumbnail hentry liquid-portfolio-category-ecommerce liquid-portfolio-category-masonry liquid-portfolio-category-portfolio-single mb-25 rounded-10">
                                                <div class="lqd-pf-item-inner">
                                                    <div class="lqd-pf-img">
                                                        <figure>
                                                            <figure class="w-full"><img alt="case Studies"
                                                                    class="w-full" height="1106"
                                                                    src="assets/images/poster3.jpg"
                                                                    width="1116">
                                                            </figure>
                                                        </figure>
                                                    </div>
                                                    <div class="lqd-pf-details flex flex-wrap relative"><span
                                                            class="lqd-pf-overlay-bg lqd-overlay flex"></span>
                                                        <div
                                                            class="lqd-pf-info flex flex-wrap items-center justify-between w-full px-1/5em py-1/5em bg-white rounded-4">
                                                            <h5 class="lqd-pf-title mt-0 mb-0">Selamat Hari Buku Sedunia!
                                                            </h5>
                                                            <ul
                                                                class="reset-ul inline-nav lqd-pf-cat inline-flex relative z-2">
                                                                {{-- <li><a href="#">Ecommerce</a></li> --}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <a class="lqd-overlay flex lqd-pf-overlay-link fresco"
                                                        data-fresco-group="portfolio"
                                                        href="assets/images/poster3.jpg"></a>
                                                </div>
                                            </article>
                                        </div>
                                        <div
                                            class="lqd-pf-column col-md-6 col-lg-3 col-12 col-xs-12 masonry-item branding custom-print masonry portfolio-single py-0 px-10">
                                            <article
                                                class="lqd-pf-item lqd-pf-item-style-1 lqd-pf-dark pf-details-h-end relative overflow-hidden liquid-portfolio type-liquid-portfolio status-publish format-standard has-post-thumbnail hentry liquid-portfolio-category-branding liquid-portfolio-category-custom-print liquid-portfolio-category-masonry liquid-portfolio-category-portfolio-single mb-25 rounded-10">
                                                <div class="lqd-pf-item-inner">
                                                    <div class="lqd-pf-img">
                                                        <figure>
                                                            <figure class="w-full"><img alt="case Studies"
                                                                    class="w-full" height="520"
                                                                    src="assets/images/poster2.jpg"
                                                                    width="520">
                                                            </figure>
                                                        </figure>
                                                    </div>
                                                    <div class="lqd-pf-details flex flex-wrap relative"><span
                                                            class="lqd-pf-overlay-bg lqd-overlay flex"></span>
                                                        <div
                                                            class="lqd-pf-info flex flex-wrap items-center justify-between w-full px-1/5em py-1/5em bg-white rounded-4">
                                                            <h6 class="lqd-pf-title mt-0 mb-0">Yuk! Baca Yuk</h6>
                                                            <ul
                                                                class="reset-ul inline-nav lqd-pf-cat inline-flex relative z-2">
                                                                {{-- <li><a href="#">Branding</a></li> --}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <a class="lqd-overlay flex lqd-pf-overlay-link fresco"
                                                        data-fresco-group="portfolio"
                                                        href="assets/images/poster2.jpg"></a>
                                                </div>
                                            </article>
                                        </div>
                                        <div
                                            class="lqd-pf-column col-md-6 col-lg-3 col-12 col-xs-12 masonry-item branding digital-design masonry portfolio-single py-0 px-10">
                                            <article
                                                class="lqd-pf-item lqd-pf-item-style-1 lqd-pf-dark pf-details-h-end relative overflow-hidden liquid-portfolio type-liquid-portfolio status-publish format-standard has-post-thumbnail hentry liquid-portfolio-category-branding liquid-portfolio-category-digital-design liquid-portfolio-category-masonry liquid-portfolio-category-portfolio-single mb-25 rounded-10">
                                                <div class="lqd-pf-item-inner">
                                                    <div class="lqd-pf-img">
                                                        <figure>
                                                            <figure class="w-full"><img alt="case Studies"
                                                                    class="w-full" height="520"
                                                                    src="assets/images/poster1.jpg"
                                                                    width="520">
                                                            </figure>
                                                        </figure>
                                                    </div>
                                                    <div class="lqd-pf-details flex flex-wrap relative"><span
                                                            class="lqd-pf-overlay-bg lqd-overlay flex"></span>
                                                        <div
                                                            class="lqd-pf-info flex flex-wrap items-center justify-between w-full px-1/5em py-1/5em bg-white rounded-4">
                                                            <h5 class="lqd-pf-title mt-0 mb-0">Buku Baru Sudah Tersedia
                                                            </h5>
                                                            <ul
                                                                class="reset-ul inline-nav lqd-pf-cat inline-flex relative z-2">
                                                                {{-- <li><a href="#">Branding</a></li> --}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <a class="lqd-overlay flex lqd-pf-overlay-link fresco"
                                                        data-fresco-group="portfolio"
                                                        href="assets/images/poster1.jpg"></a>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col col-12 text-center"><a
                                    class="btn btn-naked btn-icon-right btn-icon-circle btn-icon-custom-size btn-icon-solid btn-icon-ripple text-black"
                                    href="#" target="_blank"><span class="btn-txt"
                                        data-text="See more projects">Lihat Selengkapnya</span>
                                    <span class="btn-icon w-30 h-30 text-black bg-slate-100"><i aria-hidden="true"
                                            class="lqd-icn-ess icon-ion-ios-add"></i></span></a>
                            </div> --}}
                        </div>
                    </div>
                </section>

                <section class="hubungi-kami" id="kontak">
                    <h2>Hubungi Kami</h2>
                    <div class="kontainer-form">
                      <div class="gambar">
                        <img src="{{ asset('assets/images/tlpn.png') }}" alt="Telepon" />
                      </div>
                      <form class="form-kontak" method="POST" action="{{ route('kirim.email') }}">
                        @csrf
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" placeholder="Jamiul Mukmininin" />

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="example@mail.com" />

                        <label for="pesan">Isi Form</label>
                        <textarea id="pesan" name="pesan" placeholder="Type Here………"></textarea>

                        <button type="submit">Submit</button>
                      </form>
                    </div>
                </section>
                <section class="lqd-section connect-top pt-10 relative">
                    <div
                        class="ld-particles-container w-full lqd-particles-as-bg lqd-overlay flex lqd-particle pointer-events-none">
                        <div class="ld-particles-inner lqd-overlay flex" data-particles="true"
                            data-particles-options="{&quot;particles&quot;: {&quot;number&quot;: {&quot;value&quot; : 6} , &quot;color&quot;: {&quot;value&quot; : [&quot;#FDA44C&quot;, &quot;#604CFD&quot;, &quot;#0FBBB4&quot;, &quot;#F85976&quot;]} , &quot;shape&quot;: {&quot;type&quot; : [&quot;circle&quot;]} , &quot;opacity&quot;: {&quot;value&quot; : 1} , &quot;size&quot;: {&quot;value&quot; : 4} , &quot;move&quot;: {&quot;enable&quot;: true, &quot;direction&quot;: &quot;none&quot;, &quot;out_mode&quot;: &quot;bounce&quot;}} , &quot;interactivity&quot; : [], &quot;retina_detect&quot;: true}"
                            id="lqd-particle"></div>
                    </div>

                </section>
                <section class="lqd-section connect-bottom relative -mb-200 z-2" id="contact">
                    <div class="container">
                        <div class="row items-center">
                            <div class="w-25percent lg:w-20percent"></div>
                            <div class="w-50percent lg:w-60percent sm:w-full">
                                <div class="w-full relative flex p-15">
                                    <div
                                        class="w-full flex flex-wrap bg-white transition-all shadow-md -mb-90 mt-0 rounded-6">
                                        <div class="w-50percent flex flex-col sm:w-full bg-bg">
                                            <div
                                                class="module py-35 pr-50 pl-65 border-right border-black-10 transition-all sm:border-right-0 sm:border-bottom">
                                                <div class="ld-fancy-heading relative">
                                                    <h6
                                                        class="ld-fh-element relative font-normal mb-0/75em text-white">
                                                        Email Kami</h6>
                                                </div>
                                                <div class="ld-fancy-heading relative">
                                                    <h2 class="ld-fh-element relative text-white text-20 mb-0">
                                                        daikoasikbetgilak56
                                                        @gmail.com</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-50percent flex flex-col sm:w-full bg-bg2">
                                            <a href="https://wa.me/6285850961108">
                                                <div class="module py-35 pr-50 pl-65 transition-all">
                                                    <div class="ld-fancy-heading relative">
                                                        <h6
                                                            class="ld-fh-element relative font-normal mb-0/75em text-white">
                                                            Kontak Kami</h6>
                                                    </div>
                                                    <div class="ld-fancy-heading relative">
                                                        <h2 class="ld-fh-element relative text-white text-20 mb-0">+62
                                                            858 5096 1108</h2>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-25percent lg:w-20percent sm:hidden">
                                <div class="lqd-imggrp-single block relative" data-float="ease-in">
                                    <div
                                        class="lqd-imggrp-img-container inline-flex relative items-center justify-center">
                                        <figure class="w-full relative"><img alt="shape" height="552"
                                                src="assets/images/demo/start-hub-2/3D/img.png" width="500">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <footer class="main-footer" id="site-footer">
            <section class="lqd-section footer-content pt-270 pb-100 relative bg-transparent transition-all"
                style="background-image: linear-gradient(180deg, #E5DFFC 0%, #fff 100%);">
                <div class="lqd-shape lqd-shape-top" data-negative="false">
                    <svg class="lqd-custom-shape -rotate-180 h-220" fill="none" height="461"
                        preserveaspectratio="none" viewbox="0 0 1440 461" width="1440"
                        xmlns="http://www.w3.org/2000/svg">
                        <path class="lqd-shape-fill"
                            d="m0 131.906 34.4-20.017c34.4-19.9 103.2-59.936 171.68-82.979 68.64-23.043 136.8-29.328003 205.44-4.306 68.48 25.022 137.28 81.35 205.76 80.768 68.64-.582 136.8-58.074 205.44-84.608 68.48-26.535 137.28-22.345 205.76-16.06 68.64 6.168 136.8 14.315 205.44 22.811 68.48 8.612 137.28 17.457 171.68 22l34.4 4.422v396.851h-1440z"
                            fill="#fff" fill-opacity=".09">
                            <animate attributename="d" dur="10s" fill="freeze" repeatcount="indefinite"
                                values="M0 131.906L34.4 111.889C68.8 91.989 137.6 51.953 206.08 28.91C274.72 5.867 342.88 -0.418001 411.52 24.604C480 49.626 548.8 105.954 617.28 105.372C685.92 104.79 754.08 47.298 822.72 20.764C891.2 -5.771 960 -1.581 1028.48 4.704C1097.12 10.872 1165.28 19.019 1233.92 27.515C1302.4 36.127 1371.2 44.972 1405.6 49.515L1440 53.937V450.788H0L0 131.906Z; M0 122.906L36.5 109C71.5 96.372 102.52 67.98 171 44.937C239.64 21.894 354.36 51.478 423 76.5C491.48 101.522 546.52 19.097 615 18.515C683.64 17.933 799.36 58.534 868 32C936.48 5.46499 1039.52 54.715 1108 61C1176.64 67.168 1190.36 -6.996 1259 1.5C1327.48 10.112 1371.2 35.972 1405.6 40.515L1440 44.937V441.788H0L0 122.906Z; M0 131.906L34.4 111.889C68.8 91.989 137.6 51.953 206.08 28.91C274.72 5.867 342.88 -0.418001 411.52 24.604C480 49.626 548.8 105.954 617.28 105.372C685.92 104.79 754.08 47.298 822.72 20.764C891.2 -5.771 960 -1.581 1028.48 4.704C1097.12 10.872 1165.28 19.019 1233.92 27.515C1302.4 36.127 1371.2 44.972 1405.6 49.515L1440 53.937V450.788H0L0 131.906Z">
                            </animate>
                        </path>
                        <path class="lqd-shape-fill"
                            d="M0 154.75L34.4 142.201C68.8 129.53 137.6 104.433 206.08 99.072C274.72 93.833 342.88 108.453 411.52 122.099C480 135.622 548.8 148.293 617.28 142.811C685.92 137.329 754.08 113.693 822.72 113.693C891.2 113.693 960 137.329 1028.48 152.68C1097.12 168.153 1165.28 175.463 1233.92 184.966C1302.4 194.591 1371.2 206.287 1405.6 212.257L1440 218.105V452.025H0L0 154.75Z"
                            fill="#fff" fill-opacity=".28">
                            <animate attributename="d" dur="8s" fill="freeze" repeatcount="indefinite"
                                values="M0 154.75C0 154.75 12.8 142.902 34.4 142.201C56 141.5 140.02 160.111 208.5 154.75C277.14 149.511 334.36 112.57 403 126.216C471.48 139.739 552.52 190.448 621 184.966C689.64 179.484 745.36 116 814 116C882.48 116 950.52 161.149 1019 176.5C1087.64 191.973 1154.36 123.997 1223 133.5C1291.48 143.125 1371.2 206.287 1405.6 212.257L1440 218.105V452.025H0L0 154.75Z; M0 154.75C0 154.75 33.4 177.201 55 176.5C76.6 175.799 137.52 110.361 206 105C274.64 99.761 332.86 141.104 401.5 154.75C469.98 168.273 527.52 206.982 596 201.5C664.64 196.018 747.86 75 816.5 75C884.98 75 956.52 118.149 1025 133.5C1093.64 148.973 1163.36 87.497 1232 97C1300.48 106.625 1371.2 206.287 1405.6 212.257L1440 218.105V452.025H0L0 154.75Z; M0 154.75C0 154.75 12.8 142.902 34.4 142.201C56 141.5 140.02 160.111 208.5 154.75C277.14 149.511 334.36 112.57 403 126.216C471.48 139.739 552.52 190.448 621 184.966C689.64 179.484 745.36 116 814 116C882.48 116 950.52 161.149 1019 176.5C1087.64 191.973 1154.36 123.997 1223 133.5C1291.48 143.125 1371.2 206.287 1405.6 212.257L1440 218.105V452.025H0L0 154.75Z">
                            </animate>
                        </path>
                        <path class="lqd-shape-fill"
                            d="M0 340.22L34.4 333.92C68.8 327.52 137.6 314.92 206.08 312.22C274.72 309.52 342.88 316.92 411.52 319.72C480 322.52 548.8 320.92 617.28 318.92C685.92 316.92 754.08 314.52 822.72 316.02C891.2 317.52 960 322.92 1028.48 309.42C1097.12 295.92 1165.28 263.52 1233.92 251.02C1302.4 238.52 1371.2 245.92 1405.6 249.52L1440 253.22V453.22H0L0 340.22Z"
                            fill="#fff">
                            <animate attributename="d" dur="6.5s" fill="freeze" repeatcount="indefinite"
                                values="M0 340.22L34.4 333.92C68.8 327.52 139.02 281.2 207.5 278.5C276.14 275.8 351.86 331.12 420.5 333.92C488.98 336.72 554.52 289 623 287C691.64 285 756.86 332.42 825.5 333.92C893.98 335.42 960 322.92 1028.48 309.42C1097.12 295.92 1163.36 236 1232 223.5C1300.48 211 1371.2 245.92 1405.6 249.52L1440 253.22V453.22H0L0 340.22Z; M0 340.22L37.5 323C71.9 316.6 137.52 336.62 206 333.92C274.64 331.22 339.86 272.2 408.5 275C476.98 277.8 551.02 304 619.5 302C688.14 300 759.36 266.5 828 268C896.48 269.5 962.02 336.5 1030.5 323C1099.14 309.5 1156.36 232.5 1225 220C1293.48 207.5 1364.1 249.62 1398.5 253.22L1440 253.22V453.22H0L0 340.22Z; M0 340.22L34.4 333.92C68.8 327.52 139.02 281.2 207.5 278.5C276.14 275.8 351.86 331.12 420.5 333.92C488.98 336.72 554.52 289 623 287C691.64 285 756.86 332.42 825.5 333.92C893.98 335.42 960 322.92 1028.48 309.42C1097.12 295.92 1163.36 236 1232 223.5C1300.48 211 1371.2 245.92 1405.6 249.52L1440 253.22V453.22H0L0 340.22Z">
                            </animate>
                        </path>
                        <path class="lqd-shape-fill"
                            d="M1440 337.719L1405.6 340.219C1371.2 342.719 1302.4 347.719 1233.92 350.419C1165.28 353.019 1097.12 353.419 1028.48 352.219C960 351.019 891.2 348.419 822.72 357.019C754.08 365.719 685.92 385.719 617.28 395.919C548.8 406.019 480 406.419 411.52 395.919C342.88 385.419 274.72 364.019 206.08 359.419C137.6 354.719 68.8 366.719 34.4 372.719L0 378.719V460.719H1440V337.719Z"
                            fill="#fff">
                            <animate attributename="d" dur="5.5s" fill="freeze" repeatcount="indefinite"
                                values="M1440 337.719L1405.6 340.219C1371.2 342.719 1303.98 362.8 1235.5 365.5C1166.86 368.1 1090.14 324.2 1021.5 323C953.02 321.8 889.48 383.4 821 392C752.36 400.7 678.64 368.519 610 378.719C541.52 388.819 473.48 414.5 405 404C336.36 393.5 273.64 342.319 205 337.719C136.52 333.019 68.8 366.719 34.4 372.719L0 378.719V460.719H1440V337.719Z; M1440 337.719L1405.6 340.219C1371.2 342.719 1295.98 326.3 1227.5 329C1158.86 331.6 1081.64 391.2 1013 390C944.52 388.8 874.48 364.119 806 372.719C737.36 381.419 675.14 296.3 606.5 306.5C538.02 316.6 471.48 383.219 403 372.719C334.36 362.219 272.64 320.6 204 316C135.52 311.3 68.8 366.719 34.4 372.719L0 378.719V460.719H1440V337.719Z; M1440 337.719L1405.6 340.219C1371.2 342.719 1303.98 362.8 1235.5 365.5C1166.86 368.1 1090.14 324.2 1021.5 323C953.02 321.8 889.48 383.4 821 392C752.36 400.7 678.64 368.519 610 378.719C541.52 388.819 473.48 414.5 405 404C336.36 393.5 273.64 342.319 205 337.719C136.52 333.019 68.8 366.719 34.4 372.719L0 378.719V460.719H1440V337.719Z">
                            </animate>
                        </path>
                    </svg>
                </div>
                <div class="container">
                    <div class="row items-center">
                        <div class="col col-12 col-md-3 flex items-center justify-start"><img alt="logo-ermi"
                                height="21" src="" width="145">
                        </div>

                        <div class="col col-12 mt-5 p-15"><span
                                class="divider w-full flex border-top border-lightgray"></span></div>
                        <div class="col col-12 col-md-8">
                            <div class="ld-fancy-heading relative">
                            </div>
                        </div>
                        <div class="col col-12 col-md-4">

                    </div>
                </div>
            </section>
        </footer>
    </div>
    <form action="/" method="POST">
        @csrf
        <div class="lity-modal lqd-modal lity-hide" data-modal-type="fullscreen" id="contact-modal">
            <div class="lqd-modal-inner">
                <div class="lqd-modal-head"></div>
                <div class="lqd-modal-content link-black">
                    <div class="container">
                        <div class="row min-h-100vh items-center">
                            <div class="w-55percent p-10 sm:w-full">
                                <div class="flex flex-col w-full pr-90 lg:pr-0">
                                    <div class="ld-fancy-heading relative">
                                        <h2
                                            class="ld-fh-element mb-0/5em inline-block relative text-120 font-medium leading-0/8em text-blue-600">
                                            Daftar Sekarang</h2>
                                    </div>
                                    <div class="ld-fancy-heading relative">
                                        <p class="ld-fh-element mb-0/5em inline-block relative text-18">Dan Dapatkan
                                            Pengalaman Belajar Yang Menyenangkan.</p>
                                    </div>
                                    <div class="w-full flex flex-wrap">
                                        <div class="w-50percent flex flex-col p-10 sm:w-full">
                                            <div class="mb-10 ld-fancy-heading relative">
                                                <h6
                                                    class="ld-fh-element mb-0/5em inline-block relative text-black text-14 font-bold tracking-0">
                                                    careers</h6>
                                            </div>
                                            <div class="mb-10 ld-fancy-heading relative">
                                                <p
                                                    class="ld-fh-element mb-0/5em inline-block relative text-16 leading-1/25em">
                                                    Would you like to join our growing team?</p>
                                            </div>
                                            <div class="ld-fancy-heading relative">
                                                <p class="ld-fh-element mb-0/5em inline-block relative"><a
                                                        class="text-16 font-bold leading-1/2em" href="#"><span
                                                            class="__cf_email__"
                                                            data-cfemail="9efdffecfbfbeceddef6ebfcb0fdf1f3">[email&#160;protected]</span></a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="w-50percent flex flex-col p-10 sm:w-full">
                                            <div class="mb-10 ld-fancy-heading relative">
                                                <h6
                                                    class="ld-fh-element mb-0/5em inline-block relative text-black text-14 font-bold tracking-0">
                                                    careers</h6>
                                            </div>
                                            <div class="mb-10 ld-fancy-heading relative">
                                                <p
                                                    class="ld-fh-element mb-0/5em inline-block relative text-16 leading-1/25em">
                                                    Would you like to join our growing team?</p>
                                            </div>
                                            <div class="ld-fancy-heading relative">
                                                <p class="ld-fh-element mb-0/5em inline-block relative"><a
                                                        class="text-16 font-bold leading-1/2em" href="#"><span
                                                            class="__cf_email__"
                                                            data-cfemail="f695978493938485b69e8394d895999b">[email&#160;protected]</span></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-45percent sm:w-full">
                                <div
                                    class="lqd-contact-form lqd-contact-form-inputs-underlined lqd-contact-form-button-block lqd-contact-form-button-lg lqd-contact-form-button-border-none">
                                    <div lang="en-US" role="form">
                                        <div class="screen-reader-response">
                                            <p aria-atomic="true" aria-live="polite" role="status"></p>
                                        </div>
                                        <form action="./assets/php/mailer.php" class="lqd-cf-form"
                                            data-status="init" method="post" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col col-xs-12 col-sm-6 relative py-0"><i
                                                        class="lqd-icn-ess icon-lqd-user"></i> <span
                                                        class="lqd-form-control-wrap"><input aria-invalid="false"
                                                            aria-required="true"
                                                            class="text-13 text-black border-black-20"
                                                            name="name" placeholder="Siapa nama mu?"
                                                            size="40" type="text" value=""></span>
                                                </div>
                                                <div class="col col-xs-12 col-sm-6 relative py-0"><i
                                                        class="lqd-icn-ess icon-lqd-envelope"></i> <span
                                                        class="lqd-form-control-wrap"><input aria-invalid="false"
                                                            aria-required="true"
                                                            class="text-13 text-black border-black-20"
                                                            name="email" placeholder="Alamat Email"
                                                            size="40" type="email" value=""></span>
                                                </div>
                                                <div class="col col-xs-12 col-sm-6 relative py-0"><i
                                                        class="lqd-icn-ess icon-speech-bubble"></i> <span
                                                        class="lqd-form-control-wrap"><input aria-invalid="false"
                                                            aria-required="true"
                                                            class="text-13 text-black border-black-20"
                                                            name="username" placeholder="Username mu"
                                                            size="40" type="text" value=""
                                                            required></span>
                                                </div>
                                                <div class="col col-xs-12 col-sm-6 relative py-0"><i
                                                        class="lqd-icn-ess icon-lqd-dollar"></i> <span
                                                        class="lqd-form-control-wrap"><input aria-invalid="false"
                                                            aria-required="true"
                                                            class="text-13 text-black border-black-20"
                                                            name="password" placeholder="password" size="40"
                                                            type="password" value=""></span></div>
                                                <div class="col col-12 lqd-form-textarea relative py-0"><i
                                                        class="lqd-icn-ess icon-lqd-pen-2"></i> <span
                                                        class="lqd-form-control-wrap">
                                                        <textarea aria-invalid="false" aria-required="true" class="text-13 text-black border-black-20" cols="10"
                                                            name="message" placeholder="Deskripsi singkat tentang proyek/permintaan/konsultasi Anda" rows="6"></textarea>
                                                    </span>
                                                </div>
                                                <div class="col col-xs-12 text-center relative py-0"><button
                                                        class="bg-primary text-white text-17 font-medium leading-1/5em hover:bg-primary hover:text-white rounded-100"
                                                        type="submit" id="submitButton">— daftar —</button>


                                                    <script>
                                                        document.getElementById('submitButton').addEventListener('click', function(event) {
                                                            event.preventDefault(); // Prevent default action (following the href)
                                                            document.querySelector('form').submit(); // Submit the form
                                                        });
                                                    </script>


                                                    <p class="mt-1em text-black"><span>— copy email:</span> <a
                                                            href="#"><span class="__cf_email__"
                                                                data-cfemail="4920272f26092520383c202d643d212c242c3a672a2624">[email&#160;protected]</span></a>
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="lqd-cf-response-output"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lqd-modal-foot"></div>
            </div>
        </div>
    </form>

    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/vendors/jquery.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendors/fastdom/fastdom.min.js"></script>
    <script src="assets/vendors/fresco/js/fresco.js"></script>
    <script src="assets/vendors/lity/lity.min.js"></script>
    <script src="assets/vendors/gsap/minified/gsap.min.js"></script>
    <script src="assets/vendors/gsap/utils/CustomEase.min.js"></script>
    <script src="assets/vendors/gsap/minified/DrawSVGPlugin.min.js"></script>
    <script src="assets/vendors/gsap/minified/ScrollTrigger.min.js"></script>
    <script src="assets/vendors/draw-shape/liquidDrawShape.min.js"></script>
    <script src="assets/vendors/animated-blob/liquidAnimatedBlob.min.js"></script>
    <script src="assets/vendors/fontfaceobserver.js"></script>
    <script src="assets/vendors/tinycolor-min.js"></script>
    <script src="assets/vendors/gsap/utils/SplitText.min.js"></script>
    <script src="assets/vendors/isotope/isotope.pkgd.min.js"></script>
    <script src="assets/vendors/isotope/packery-mode.pkgd.min.js"></script>
    <script src="assets/vendors/flickity/flickity.pkgd.min.js"></script>
    <script src="assets/vendors/draggabilly.pkgd.min.js"></script>
    <script src="assets/vendors/particles.min.js"></script>
    <script src="assets/js/liquid-gdpr.min.js"></script>
    <script src="assets/js/theme.min.js"></script>
    <script src="assets/js/liquid-ajax-contact-form.min.js"></script>
    <div class="lqd-cc lqd-cc--inner fixed pointer-events-none"></div>
    <div
        class="lqd-cc--el lqd-cc-solid lqd-cc-explore flex items-center justify-center rounded-full fixed pointer-events-none">
        <div class="lqd-cc-solid-bg flex absolute lqd-overlay"></div>
        <div class="lqd-cc-solid-txt flex justify-center text-center relative">
            <div class="lqd-cc-solid-txt-inner">Explide</div>
        </div>
    </div>
    <div
        class="lqd-cc--el lqd-cc-solid lqd-cc-drag flex items-center justify-center rounded-full fixed pointer-events-none">
        <div class="lqd-cc-solid-bg flex absolute lqd-overlay"></div>
        <div class="lqd-cc-solid-ext lqd-cc-solid-ext-left inline-flex items-center">
            <svg height="32" style="width: 1em; height: 1em;" viewbox="0 0 32 32" width="32"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19.943 6.07L9.837 14.73a1.486 1.486 0 0 0 0 2.25l10.106 8.661c.96.826 2.457.145 2.447-1.125V7.195c0-1.27-1.487-1.951-2.447-1.125z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <div class="lqd-cc-solid-txt flex justify-center text-center relative">
            <div class="lqd-cc-solid-txt-inner">Drag</div>
        </div>
        <div class="lqd-cc-solid-ext lqd-cc-solid-ext-right inline-flex items-center">
            <svg height="32" style="width: 1em; height: 1em;" viewbox="0 0 32 32" width="32"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.768 25.641l10.106-8.66a1.486 1.486 0 0 0 0-2.25L11.768 6.07c-.96-.826-2.457-.145-2.447 1.125v17.321c0 1.27 1.487 1.951 2.447 1.125z"
                    fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <div class="lqd-cc--el lqd-cc-arrow inline-flex items-center fixed top-0 left-0 pointer-events-none">
        <svg fill="none" height="80" viewbox="0 0 80 80" width="80"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M60.4993 0V4.77005H8.87285L80 75.9207L75.7886 79.1419L4.98796 8.35478V60.4993H0V0H60.4993Z"></path>
        </svg>
    </div>
    <div class="lqd-cc--el lqd-cc-custom-icon rounded-full fixed pointer-events-none">
        <div class="lqd-cc-ci inline-flex items-center justify-center rounded-full relative">
            <svg height="32" style="width: 1em; height: 1em;" viewbox="0 0 32 32" width="32"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd"
                    d="M16.03 6a1 1 0 0 1 1 1v8.02h8.02a1 1 0 1 1 0 2.01h-8.02v8.02a1 1 0 1 1-2.01 0v-8.02h-8.02a1 1 0 1 1 0-2.01h8.02v-8.01a1 1 0 0 1 1.01-1.01z"
                    fill="currentColor" fill-rule="evenodd"></path>
            </svg>
        </div>
    </div>
    <div class="lqd-cc lqd-cc--outer fixed top-0 left-0 pointer-events-none"></div>

    <elemen id="lqd-temp-sticky-header-sentinel">
        <div class="lqd-sticky-sentinel invisible absolute pointer-events-none"></div>
    </elemen>
    <div aria-label="Dialog Window (Press escape to close)" class="lity hidden" data-modal-type="default"
        role="dialog" tabindex="-1">
        <div class="lity-backdrop"></div>
        <div class="lity-wrap" data-lity-close="" role="document">
            <div aria-hidden="true" class="lity-loader">Loading...</div>
            <div class="lity-container">
                <div class="lity-content"></div>
            </div>
            <button aria-label="Close (Press escape to close)" class="lity-close" data-lity-close=""
                type="button">&times;
            </button>
        </div>
    </div>

    <script>
        var swiper = new Swiper(".slide-content", {
            slidesPerView: 3,
            spaceBetween: 25,
            loop: true,
            centerSlide: 'true',
            fade: 'true',
            grabCursor: 'true',
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                520: {
                    slidesPerView: 2,
                },
                950: {
                    slidesPerView: 3,
                },
            },
        });
    </script>
</body>

</html>
