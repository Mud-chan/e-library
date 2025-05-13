<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Buku</title>
  <link rel="icon" href="{{ asset('assets/images/logo2.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('assets/css/detailbuku.css') }}" />

</head>
<body>

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/admin_style.css') }}"> --}}
    {{-- <script src="{{ asset('assets/js/admin_script.js') }}"></script> --}}

    <header class="header">

        <section class="flex">

            <a href="{{ url('/dashboardsp') }}" class="logo">Guru</a>

            <form action={{ route('caricontentguru') }}" method="post" class="search-form">
                @csrf
                <input type="text" name="search" placeholder="Cari Buku..." required maxlength="100">
                <button type="submit" class="fas fa-search" name="search_btn"></button>
            </form>

            <div class="icons">
                {{-- <div id="menu-btn" class="fas fa-bars"></div> --}}
                <div id="search-btn" class="fas fa-search"></div>
                <div id="user-btn" class="fas fa-user"></div>
            </div>

            <div class="profile">

                <img src="{{ asset('uploaded_files/' . $guruImage) }}" alt="">
                <h3>{{ $guruName }}</h3>
                <span>{{ $guruProfesi }}</span>
                <a href="{{ url('/profileguru') }}" class="btn">View Profile</a>

                <a href="{{ route('logoutad') }}" onclick="return confirm('Anda Yakin Ingin Logout?');"
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
        <span>Kategori : {{ $content->kategori }}</span>
        <span>Kelas : {{ $content->tingkatan ?? 'Tidak ada tingkatan' }}</span>
      </div>

    {{-- <div class="chapters">
      <div class="chapter">
        <div>Chapter 1</div>
        <div>{{ $content->date }}</div>
      </div> --}}

<div class="bgbg">
    <div class="pdf-view">
        <div class="container">
            <iframe class="pdf-viewer" src="{{ asset('uploaded_files/' . $content->pdf) }}" frameborder="0"></iframe>
        </div>
    </div>
    <div class="comment-section">
        <form action="{{ route('video.storeCommentGuru', ['videoId' => $content->id]) }}" method="post" >
            @csrf
            <input type="hidden" name="content_id" value="{{ $content->id }}">
            <textarea rows="3" placeholder="Write a comment............" name="comment_box"></textarea>
            <button name="add_comment">Submit</button>
        </form>

<div class="comments">
    @if($comments->count() > 0)
        @foreach($comments as $comment)
        @php
            $user = $allUsers->firstWhere('id', $comment->id_siswa);
        @endphp
        @if($user)
            <div class="comment" style="{{ $comment->id_siswa == $userId ? 'order:-1;' : '' }}">
                <img class="circle" src="{{ asset('uploaded_files/' . $user->image) }}" alt="{{ $user->nama }}">
                <div class="content">
                    <p>
                    <strong>
                        {{ $user->nama }}
                        ({{ $user instanceof \App\Models\User ? 'Siswa' : 'Guru' }})
                    </strong><br/>
                    {{ $comment->comment }}
                    </p>
                    <div class="meta">{{ \Carbon\Carbon::parse($comment->date)->format('H:i l d F Y') }}</div>
                    @if($comment->id_siswa == $userId)
                                    <button type="button" onclick="editComment('{{ $comment->id }}', '{{ addslashes($comment->comment) }}')" style="background-color: #2ecc71; padding: 5px 9px; font-size:12px;">Edit</button>

                                    <form action="{{ route('buku.deleteCommentguru', ['id' => $comment->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin mau hapus komentar ini?')" style="background-color: red; padding: 5px 9px; font-size:12px;">Hapus</button>
                                    </form>
                                @endif
                </div>
            </div>
        @endif
        @endforeach
    @else
        <p class="empty">Tidak ada komentar!</p>
    @endif
</div>


  </div>
  <script src="{{ asset('assets/js/admin_script.js') }}"></script>
  <script>
    let editingCommentId = null;

    function editComment(commentId, commentText) {
        const textarea = document.querySelector('textarea[name="comment_box"]');
        const button = document.querySelector('button[name="add_comment"]');

        textarea.value = commentText;
        editingCommentId = commentId;

        button.innerText = "Edit";
        button.name = "edit_comment";

        // Ganti form action jadi ke edit route
        const form = textarea.closest('form');
        form.action = `/buku/update-comment-guru/${commentId}`; // pastikan route ini ada di web.php
    }
    </script>
</body>
</html>
