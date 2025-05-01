<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Buku</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('assets/css/detailbuku.css') }}" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .header {
            background-color: #fff;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header .flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            text-decoration: none;
        }

        .search-form input {
            padding: 0.5rem;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .search-form button {
            border: none;
            background: none;
            cursor: pointer;
            color: #333;
        }

        .icons div {
            font-size: 1.2rem;
            margin-left: 1rem;
            cursor: pointer;
        }

        .profile {
            display: none; /* Toggle with JS if needed */
        }

        .content {
            padding: 1rem 2rem;
        }

        .article-info {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .article-info img {
            width: 100%;
            max-width: 300px;
            border-radius: 10px;
            object-fit: cover;
        }

        .article-info .text {
            flex: 1;
        }

        .article-info h3 {
            margin: 0 0 10px;
        }

        .bookmark {
            background-color: #28d17c;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            align-self: flex-start;
        }

        .tags {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .pdf-view {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .pdf-view .container {
            width: 100%;
            max-width: 900px;
            height: 80vh;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #ccc;
            background: #fff;
        }

        .pdf-viewer {
            width: 100%;
            height: 100%;
            border: none;
        }

        .comment-section textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            resize: vertical;
        }

        .comment-section button {
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .comment {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 15px;
        }

        .comment .circle {
            width: 40px;
            height: 40px;
            background-color: #999;
            border-radius: 50%;
        }

        .comment .content {
            background: #f1f1f1;
            padding: 10px;
            border-radius: 8px;
            flex: 1;
        }

        .meta {
            font-size: 0.75rem;
            color: #555;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .article-info {
                flex-direction: column;
                align-items: center;
            }

            .pdf-view .container {
                height: 60vh;
            }

            .search-form input {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <header class="header">
        <section class="flex">
            <a href="{{ url('/dashboardsp') }}" class="logo">Tutor</a>
            <form action="{{ route('tutor.caritutor') }}" method="post" class="search-form">
                @csrf
                <input type="text" name="search" placeholder="Cari Tutor..." required maxlength="100">
                <button type="submit" class="fas fa-search" name="search_btn"></button>
            </form>
            <div class="icons">
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

        <div class="pdf-view">
          <div class="container">
            <iframe class="pdf-viewer"
              src="{{ asset('pdfjs/web/1745283910.pdf') }}?file={{ rawurlencode(asset('uploaded_files/' . $content->pdf)) }}">
            </iframe>
          </div>
        </div>        

        <div class="comment-section">
            <textarea rows="3" placeholder="Write a comment............"></textarea>
            <button>Submit</button>
            <div class="comments">
                <div class="comment">
                    <div class="circle"></div>
                    <div class="content">
                        <p><strong>Lorem Ip</strong><br />Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                        <div class="meta">12.30 Saturday 18 August 2025</div>
                    </div>
                </div>
                <div class="comment">
                    <div class="circle"></div>
                    <div class="content">
                        <p><strong>Lorem Ip</strong><br />Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                        <div class="meta">12.30 Saturday 18 August 2025</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/admin_script.js') }}"></script>
</body>

</html>
