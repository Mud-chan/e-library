<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="icon" href="{{ asset('assets/images/logo2.png') }}">
  <title>Detail Artikel</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"/>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    body {
      background-color: #f2f2f2;
      padding: 0px;
    }
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #27ae60;
      padding: 15px 50px;
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
    }

    .content {
      background-color: white;
      border-radius: 15px;
      padding: 20px;
      margin-top: 20px;
    }

    .main-image {
      width: 100%;
      height: 300px;
      object-fit: cover;
      border-radius: 10px;
    }

    .overlay {
      position: relative;
    }

    .overlay .credit {
      position: absolute;
      bottom: 10px;
      right: 10px;
      background: rgba(0,0,0,0.6);
      color: white;
      padding: 5px 10px;
      border-radius: 5px;
      font-size: 12px;
    }

    .article-info {
      display: flex;
      gap: 20px;
      margin-top: 20px;
      align-items: center;
      flex-wrap: wrap;
    }

    .article-info img {
      width: 120px;
      height: 130px;
      object-fit: cover;
      border-radius: 10px;
    }

    .article-info .text {
      flex: 1;
      min-width: 200px;
    }

    .bookmark {
      background-color: #2ecc71;
      color: white;
      padding: 10px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 14px;
    }

    .tags {
      margin-top: 10px;
    }

    .tags span {
      display: inline-block;
      background-color: #ecf0f1;
      color: #333;
      padding: 5px 10px;
      border-radius: 20px;
      margin-right: 10px;
      font-size: 12px;
    }

    .chapters {
      background-color: #ecf0f1;
      padding: 20px;
      border-radius: 10px;
      margin-top: 20px;
    }

    .chapter {
      display: flex;
      justify-content: space-between;
      padding: 10px 0;
      border-bottom: 1px solid #ccc;
    }

    .chapter:last-child {
      border-bottom: none;
    }

    .comment-section {
      margin-top: 30px;
    }

    .comment-section textarea {
      width: 100%;
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
      margin-top: 10px;
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

    /* RESPONSIVE SECTION */
    @media (max-width: 768px) {
      .navbar {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
      }

      .navbar .search-section {
        flex-direction: column;
        align-items: stretch;
        width: 100%;
      }

      .navbar input[type="text"] {
        width: 100%;
      }

      .article-info {
        flex-direction: column;
        align-items: flex-start;
      }

      .article-info img {
        width: 100%;
        height: auto;
      }

      .bookmark {
        margin-top: 10px;
      }

      .chapter {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
      }

      .comment {
        flex-direction: column;
        align-items: flex-start;
      }
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
      <input type="text" placeholder="Search here............" />
      <button>Search</button>
    </div>
    <div>👤 Diego</div>
  </div>

  <div class="content">
    <div class="overlay">
      <img src="{{ asset('assets/images/bg1.png') }}" alt="main" class="main-image"/>
      <div class="credit">
        iStock<br>
        Credit: fototrav
      </div>
    </div>

    <div class="article-info">
      <img src="{{ asset('assets/images/frame1.png') }}" alt="thumbnail" />
      <div class="text">
        <h3>Budidaya Ikan Hias Ala Chef Nurhadi Aldo</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sit amet dom lorem ipsum dolor sit amet consectetur adipisicing elit lorem ipsum dolor sit amet dolor sit amet consectetur adipisicing odit.</p>
      </div>
      <a href="#" class="bookmark">🔖 BookMark</a>
    </div>

    <div class="tags">
      <span>Non-Fiksi</span>
      <span>Budidaya</span>
    </div>

    <div class="chapters">
      <div class="chapter">
        <div>Chapter 1</div>
        <div>Saturday 18 August 2025</div>
      </div>
      <div class="chapter">
        <div>Chapter 2</div>
        <div>Sunday 18 August 2025</div>
      </div>
      <div class="chapter">
        <div>Chapter 3</div>
        <div>Monday 20 August 2025</div>
      </div>
      <div class="chapter">
        <div>Chapter 4</div>
        <div>Tuesday 21 August 2025</div>
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
</body>
</html>