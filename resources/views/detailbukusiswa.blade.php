<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="icon" href="{{ asset('assets/images/logo2.png') }}">
  <title>Detail Buku</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="{{ asset('assets/css/detailbuku.css') }}" />

</head>
<style>
    .rating-stars {
        display: flex;
        font-size: 2rem;
        cursor: pointer;
        color: #ccc;
    }

    .rating-stars .star.filled {
        color: #f5b301;
    }


        .autocomplete-box {
        position: absolute;
        background: #fff;
        max-height: 300px;
        overflow-y: auto;
        color: black;
        z-index: 999;
        width: 50%;

        left: 50%;
        transform: translateX(-50%);
        top: 10%;
        /* atur sesuai kebutuhan, atau pakai 50% + translateY(-50%) jika ingin tengah vertikal */


        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

        border-radius: 6px;
    }

    .autocomplete-box .item {
        display: flex;
        align-items: center;
        padding: 10px;
        color: black;
        cursor: pointer;
        border-bottom: 1px solid #eee;
    }

    .autocomplete-box .item:hover {
        background: #f0f0f0;
    }

    .autocomplete-box .item img {
        width: 40px;
        height: 60px;
        object-fit: cover;
        margin-right: 10px;
    }
</style>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search-input').on('input', function() {
                let query = $(this).val();
                if (query.length >= 2) {
                    $.ajax({
                        url: '{{ route('ajax.cari.buku') }}',
                        method: 'GET',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            let resultsBox = $('#search-results');
                            resultsBox.empty();

                            if (data.length === 0) {
                                resultsBox.append(
                                    '<div class="item">Buku tidak ditemukan</div>');
                            } else {
                                data.forEach(item => {
                                    resultsBox.append(`
                                    <a href="/detail-buku-siswa/${item.id}" class="item">
                                        <img src="/uploaded_files/${item.thumb}" alt="">
                                        <div>
                                            <strong>${item.judul}</strong><br>
                                            <small>${item.kategori}, ${item.tingkatan}</small>
                                        </div>
                                    </a>
                                `);
                                });
                            }

                            resultsBox.show();
                        }
                    });
                } else {
                    $('#search-results').hide();
                }
            });

            // Sembunyikan saat klik luar
            $(document).click(function(e) {
                if (!$(e.target).closest('#search-input, #search-results').length) {
                    $('#search-results').hide();
                }
            });
        });
    </script>



    {{-- <link rel="stylesheet" href="{{ asset('assets/css/admin_style.css') }}"> --}}
    {{-- <script src="{{ asset('assets/js/admin_script.js') }}"></script> --}}

    <header class="header">

        <section class="flex">

            <a href="{{ url('/katalogbuku') }}" class="logo">Siswa</a>

            <form action="{{ route('caribuku') }}" method="post" class="search-form" autocomplete="off">
                @csrf
                <input type="text" id="search-input" name="search" placeholder="Cari Buku..." required
                    maxlength="100">
                <button type="submit" class="fas fa-search" name="search_btn"></button>
            </form>

            <div class="icons">
                {{-- <div id="menu-btn" class="fas fa-bars"></div> --}}
                <div id="search-btn" class="fas fa-search"></div>
                <div id="user-btn" class="fas fa-user"></div>
            </div>

            <div class="profile">

                <img src="{{ asset('uploaded_files/' . $userImage) }}" alt="">
                <h3>{{ $userName }}</h3>
                <span>Siswa</span>
                <a href="{{ url('/profilesiswa') }}" class="btn">View Profile</a>
                <a href="{{ url('/historybuku') }}" class="btn">History</a>
                <a href="{{ url('/bookmarkbuku') }}" class="btn">Bookmark</a>
                <a href="{{ url('/recommend') }}" class="btn">SPK TOPSIS</a>
                <a href="{{ route('logoutsiswa') }}" onclick="return confirm('Anda Yakin Ingin Logout?');"
                class="delete-btn">log out</a>

            </div>

        </section>

    </header>
        <div class="autocomplete-box" id="search-results" style="display: none;"></div>

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



      </div>

      <div class="tags">
        <form id="ratingForm" action="{{ route('buku.rating', ['id' => $content->id]) }}" method="POST" style="margin-bottom: 2vh;">
            @csrf
            <div class="rating-stars">
                @for ($i = 1; $i <= 5; $i++)
                    <span class="star {{ $existingRating >= $i ? 'filled' : '' }}" data-value="{{ $i }}">
                        ★
                    </span>
                @endfor
            </div>
            <input type="hidden" name="rating" id="ratingValue" value="{{ $existingRating }}">
        </form>

        <form action="{{ route('buku.bookmark', ['id' => $content->id]) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="bookmark" style="
                background-color: {{ $isBookmarked ? '#22a65a' : '#28c76f' }};
                border: none;
                cursor: pointer;
                color: white;
                font-size: 16px;
                padding: 6px 12px;
                border-radius: 6px;
            ">
                {{ $isBookmarked ? '🔖  Bookmarked' : '🔖  Bookmark' }}
            </button>
        </form>
        <span>Jumlah Dibaca: {{ $jumlahView }} kali</span>
        <span>Kategori : {{ $content->kategori }}</span>
        <span>Kelas : {{ $content->tingkatan ?? 'Tidak ada tingkatan' }}</span>
        <span><strong>Rata-rata Rating:</strong> {{ number_format($averageRating, 1, '.', '.') }}/5.0 ⭐</span>
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
        <form action="{{ route('video.storeCommentsiswa', ['videoId' => $content->id]) }}" method="post" >
            @csrf
            <input type="hidden" name="content_id" value="{{ $content->id }}">
            <textarea rows="3" placeholder="Tulis comment............" name="comment_box"></textarea>
            <button name="add_comment">Kirim</button>
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

                                    <form action="{{ route('buku.deleteComment', ['id' => $comment->id]) }}" method="POST" style="display:inline;">
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
        form.action = `/buku/update-comment/${commentId}`; // pastikan route ini ada di web.php
    }
    </script>

  <script>
    const stars = document.querySelectorAll('.rating-stars .star');
    const ratingValue = document.getElementById('ratingValue');
    const ratingForm = document.getElementById('ratingForm');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const value = star.getAttribute('data-value');
            ratingValue.value = value;

            // isi bintang sesuai klik
            stars.forEach(s => {
                if (s.getAttribute('data-value') <= value) {
                    s.classList.add('filled');
                } else {
                    s.classList.remove('filled');
                }
            });

            // langsung submit form
            ratingForm.submit();
        });
    });
</script>

</body>
</html>
