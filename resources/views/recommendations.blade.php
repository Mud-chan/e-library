@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">SPK Rekomendasi Buku</h2>

        <form method="GET" action="{{ route('recommend') }}" class="mb-4" id="recommendation-form">
            <div class="row g-3">
                <div class="col-md-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" {{ request('kategori') == $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="tingkatan" class="form-label">Tingkatan</label>
                    <select name="tingkatan" id="tingkatan" class="form-select">
                        <option value="">Semua Tingkatan</option>
                        @foreach($levels as $level)
                            <option value="{{ $level }}" {{ request('tingkatan') == $level ? 'selected' : '' }}>
                                {{ $level }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="min_rating" class="form-label">Minimum Rating</label>
                    <input type="number" name="min_rating" id="min_rating"
                           class="form-control" min="0" max="5" step="0.1"
                           value="{{ request('min_rating', 0) }}">
                </div>

                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100" id="filter-button">
                        <span id="button-text">Cari Rekomendasi</span>
                        <span id="button-spinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
                    </button>
                </div>
            </div>
        </form>

        @if (!empty($recommendations))
            <div class="table-responsive mt-4">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tingkatan</th>
                            <th>Rating Rata-rata</th>
                            <th>Skor Rekomendasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recommendations as $index => $rec)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $rec['book']->judul }}</td>
                                <td>{{ $rec['book']->kategori }}</td>
                                <td>{{ $rec['book']->tingkatan }}</td>
                                <td>{{ number_format($rec['book']->average_rating, 1) }}</td>
                                <td>{{ number_format($rec['preference'] * 100, 2) }}%</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('recommendation-form').addEventListener('submit', function() {
            const button = document.getElementById('filter-button');
            const buttonText = document.getElementById('button-text');
            const spinner = document.getElementById('button-spinner');

            button.disabled = true;
            buttonText.textContent = 'Memproses...';
            spinner.classList.remove('d-none');
        });
    </script>
@endsection