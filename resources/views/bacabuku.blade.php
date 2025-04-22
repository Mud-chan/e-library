<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baca Buku</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f2f2f2;
            padding: 20px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #27ae60;
            padding: 15px 30px;
            color: white;
            border-radius: 0px;
            flex-wrap: wrap;
        }

        .navbar input[type="text"] {
            width: 800px;
            padding: 8px;
            border-radius: 0px;
            border: none;
            outline: none;
        }

        .navbar .search-section {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .navbar button {
            padding: 8px 15px;
            background-color: white;
            color: green;
            border: none;
            border-radius: 0px;
            cursor: pointer;
        }

        .content {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
        }

        .judul {
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .breadcrumb {
            text-align: center;
            color: #666;
            background-color: #ddd;
            border-radius: 10px;
            padding: 8px;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .tags {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .tags span {
            display: inline-block;
            background-color: #ecf0f1;
            color: #333;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        .pdf-view {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .pdf-view img {
            width: 100%;
            max-width: 600px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        .comment-section {
            margin-top: 10px;
        }

        .comment-section textarea {
            width: 80%;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
            resize: none;
        }

        .comment-section button {
            padding: 10px 20px;
            background-color: #2ecc71;
            border: none;
            color: white;
            border-radius: 8px;
            margin-left: 10px;
        }

        .comments {
            margin-top: 20px;
        }

        .comment {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 15px;
        }

        
        .comment .circle {
            width: 40px;
            height: 40px;
            background-color: #ccc;
            border-radius: 50%;
        }

        .comment .content {
            background-color: white;
            padding: 10px;
            border-radius: 10px;
            width: 100%;
        }

        .comment .content p {
            margin: 0;
        }

        .comment .content .meta {
            font-size: 12px;
            color: gray;
            margin-top: 5px;
        }

        @media (max-width: 600px) {
            .navbar input[type="text"] {
                width: 100%;
            }

            .navbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .pdf-view img {
                max-width: 100%;
            }
        }


        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #000000;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }

        h1 {
            text-align: left;
            margin-bottom: 5px;
        }

        .chapter-info {
            font-size: 12px;
            color: #999;
            margin-bottom: 15px;
        }

        .navigation {
            margin-bottom: 15px;
        }

        .navigation a {
            display: inline-block;
            padding: 8px 12px;
            margin-right: 5px;
            background-color: #27ae60;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .report-button {
            background-color: #dc3545;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .pdf-viewer {
            width: 100%;
            height: 800px;
            margin-bottom: 20px;
        }

        .tl-ts-info {
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 1px 1px 30px rgba(0, 0, 0, 0.116);
        }

        .tl-ts-info p {
            font-size: 18px;
            margin: 5px 0;
        }

        .chapter-selection {
            margin-bottom: 20px;
        }

        .chapter-selection select {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #555;
            background-color: #333;
            color: #fff;
        }

        ::-webkit-scrollbar {
            display: none;
        }

    </style>
</head>

<body>

    <div class="navbar">
        <div>Home</div>
        <div class="search-section">
            <input type="text" placeholder="Search here............">
            <button>Search</button>
        </div>
        <div>👤 Diego</div>
    </div>

        <div class="judul">
            Budidaya Ikan Hias Ala Chef Nurhadi Aldo : Chapter 1
        </div>
        <div class="breadcrumb">
            Buku › Budidaya Ikan.... › Chapter 1
        </div>

        <div class="tags">
            <span>Non-Fiksi</span>
            <span>Budidaya</span>
        </div>

        <div class="pdf-view">
            <div class="container">
                <h1>Goblin Slayer Gaiden: Year One Chapter 105 Bahasa Indonesia</h1>
                <div class="chapter-info">
                    Semua chapter ada di Goblin Slayer Gaiden: Year One<br>
                    Komikcast > Goblin Slayer Gaiden: Year One > Goblin Slayer Gaiden: Year One Chapter 105 Bahasa
                    Indonesia
                </div>

                <div class="chapter-selection">
                    <select>
                        <option>Chapter 105</option>
                        <!-- Tambahkan opsi chapter lainnya di sini -->
                    </select>
                </div>

                

                <embed class="pdf-viewer" src="assets/images/demo/contoh.pdf" type="application/pdf">

                <div class="tl-ts-info">
                    <h3>JANGAN LUPA BELI KOMIK ASLINYA APABILA SUDAH TERSEDIA DI DAERAHMU!</h3>
                </div>

                <div class="navigation">
                    <a href="#" class="button-prev">« Previous Chapter</a>
                </div>
            </div>
        </div>

        <div class="comment-section">
            <textarea rows="3" placeholder="Write a comment............"></textarea>
            <button>Submit</button>

            <div class="comments">
                <div class="comment">
                    <div class="circle"></div>
                    <div class="content">
                        <p><strong>Lorem Ip</strong><br>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                        <div class="meta">12.30 Saturday 18 August 2025</div>
                    </div>
                </div>

                <div class="comment">
                    <div class="circle"></div>
                    <div class="content">
                        <p><strong>Lorem Ip</strong><br>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                        <div class="meta">12.30 Saturday 18 August 2025</div>
                    </div>
                </div>
            </div>
        </div>
        </div>

</body>

</html>
