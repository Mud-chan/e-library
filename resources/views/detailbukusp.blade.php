<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Artikel</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('assets/css/detailbuku.css') }}" />

</head>
<body>

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/admin_style.css') }}"> --}}
    {{-- <script src="{{ asset('assets/js/admin_script.js') }}"></script> --}}

    <header class="header">

        <section class="flex">

            <a href="{{ url('/dashboardsp') }}" class="logo">Tutor</a>

            <form action="{{ route('tutor.caritutor') }}" method="post" class="search-form">
                @csrf
                <input type="text" name="search" placeholder="Cari Tutor..." required maxlength="100">
                <button type="submit" class="fas fa-search" name="search_btn"></button>
            </form>

            <div class="icons">
                {{-- <div id="menu-btn" class="fas fa-bars"></div> --}}
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

  <div class="content">
    {{-- <div class="overlay">
      <img src="{{ asset('uploaded_files/' . $content->thumb) }}" alt="main" class="main-image"/>
      <div class="credit">
        iStock<br>
        Credit: fototrav
      </div>
    </div> --}}

    <div class="article-info">
        <img src="{{ asset('uploaded_files/' . $content->thumb) }}" alt="thumbnail" />
        <div class="text">
          <h3>{{ $content->judul }}</h3>
          <p>{{ $content->deskripsi }}</p>
        </div>
        <a href="#" class="bookmark">🔖 BookMark</a>
      </div>

      <div class="tags">
        <span>Kategori : </span><span>{{ $content->kategori }}</span>
        <span>{{ $content->tingkatan ?? 'Tidak ada tingkatan' }}</span>
      </div>

    {{-- <div class="chapters">
      <div class="chapter">
        <div>Chapter 1</div>
        <div>{{ $content->date }}</div>
      </div> --}}


    <div class="pdf-view">
        <div class="container">
            <iframe class="pdf-viewer" src="{{ asset('uploaded_files/' . $content->pdf) }}" frameborder="0"></iframe>
        </div>
    </div>
    <div class="comment-section">
        <textarea rows="3" placeholder="Write a comment............"></textarea>
        <button>Submit</button>

        <div class="comments">
          <div class="comment">
            <div class="circle"></div>
            <div class="content">
              <p><strong>Lorem Ip</strong><br/>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
              <div class="meta">12.30 Saturday 18 August 2025</div>
            </div>
          </div>

          <div class="comment">
            <div class="circle"></div>
            <div class="content">
              <p><strong>Lorem Ip</strong><br/>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
              <div class="meta">12.30 Saturday 18 August 2025</div>
            </div>
          </div>
        </div>
      </div>

  </div>
  <script src="{{ asset('assets/js/admin_script.js') }}"></script>
</body>
</html>
