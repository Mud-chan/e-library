<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Buku</title>
    <link rel="icon" href="{{ asset('assets/images/logo2.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('assets/css/detailbukuadmin.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head>
<style>
    .autocomplete-box {
        position: absolute;
        background: #fff;
        max-height: 300px;
        overflow-y: auto;
        color: black;
        z-index: 999;
        width: 50%;
        text-decoration: none;

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
        text-decoration: none;
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

            <a href="{{ url('/dashboardsp') }}" class="logo" style="text-decoration: none">Admin</a>

            <form action="{{ route('caricontentsp') }}" method="post" class="search-form">
                @csrf
                <input type="text"  id="search-input" name="search" placeholder="Cari Buku..." required maxlength="100">
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
                <span>{{ $userProfesi }}</span>
                <a href="{{ url('/profilesp') }}" class="btn">View Profile</a>

                <a href="{{ route('logoutsp') }}" onclick="return confirm('Anda Yakin Ingin Logout?');"
                    class="delete-btn">log out</a>

            </div>

        </section>

    </header>
        <div id="search-results" class="autocomplete-box" style="text-decoration: none"></div>

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
                <h3>{{ $content->judul }} <span class="badge text-bg-success">Dibaca {{ $jumlahView }} kali</span>
                </h3>
                <p>{{ $content->deskripsi }}</p>
            </div>
            <div class="beta" style="display: flex; flex-direction:column;"><a href="#" class="bookmark">🔖
                    BookMark ({{ $jumlahBookmark }})</a>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Cek Status
                </button>
            </div>

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
                    <iframe class="pdf-viewer" src="{{ asset('uploaded_files/' . $content->pdf) }}"
                        frameborder="0"></iframe>
                </div>
            </div>

            <!-- Scrollable modal -->

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Status Baca Buku</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <form class="d-flex mb-3" role="search" method="GET">
                                <input class="form-control me-2" type="search" name="search"
                                    value="{{ request('search') }}" placeholder="Cari Nama atau Kelas"
                                    aria-label="Search" />
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>



                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswaStatus as $index => $siswa)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $siswa['nama'] }}</td>
                                            <td>{{ $siswa['kelas'] }}</td>
                                            <td>{{ $siswa['status'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comment-section">
        <form action="{{ route('video.storeComment', ['videoId' => $content->id]) }}" method="post" >
            @csrf
            <input type="hidden" name="content_id" value="{{ $content->id }}">
            <textarea rows="3" placeholder="Write a comment............" name="comment_box"></textarea>
            <button name="add_comment">Submit</button>
        </form>

            <div class="comments">
                @if ($comments->count() > 0)
                    @foreach ($comments as $comment)
                        @php
                            $user = $allUsers->firstWhere('id', $comment->id_siswa);
                        @endphp
                        @if ($user)
                            <div class="comment" style="{{ $comment->id_siswa == $userId ? 'order:-1;' : '' }}">
                                <img class="circle" src="{{ asset('uploaded_files/' . $user->image) }}"
                                    alt="{{ $user->nama }}">
                                <div class="content">
                                    <p>
                                        <strong>
                                            {{ $user->nama }}
                                            ({{ $user instanceof \App\Models\User ? 'Siswa' : 'Guru' }})
                                        </strong><br />
                                        {{ $comment->comment }}
                                    </p>
                                    <div class="meta">
                                        {{ \Carbon\Carbon::parse($comment->date)->format('d F Y') }}</div>
                                    @if($comment->id_siswa == $userId)
                                    <button type="button" onclick="editComment('{{ $comment->id }}', '{{ addslashes($comment->comment) }}')" style="background-color: #2ecc71; padding: 5px 9px; font-size:12px;">Edit</button>


                                    @endif


                                    <form action="{{ route('buku.deleteComment', ['id' => $comment->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin mau hapus komentar ini?')" style="background-color: red; padding: 5px 9px; font-size:12px;">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <p class="empty">Tidak ada komentar!</p>
                @endif
            </div>
            </div>


        </div>
        <script src="{{ asset('assets/js/admin_script.js') }}"></script>
</body>
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
</html>
