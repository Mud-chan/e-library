@forelse ($results as $content)
    <a href="{{ route('detailbukusiswa.content', ['videoId' => $content->id]) }}" class="search-result-item">
        <img src="{{ asset('uploaded_files/' . $content->thumb) }}" alt="" class="thumb">
        <div class="info">
            <strong>{{ $content->judul }}</strong><br>
            <small>{{ $content->kategori }} - {{ $content->tingkatan }}</small>
        </div>
    </a>
@empty
    <div class="search-result-item">Buku tidak ditemukan</div>
@endforelse
