@extends('layouts.app')

@section('content')
<div class="container py-4">

    <a href="/katalogbuku" class="btn btn-success mb-3">
        &larr; Kembali
    </a>
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

    @if (!empty($results) && $results->count())
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-white mb-4 shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Hasil Rekomendasi</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th>Rank</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Tingkatan</th>
                                <th>Rating</th>
                                <th>Skor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $idx => $rec)
                            <tr>
                                <td>{{ ($results->currentPage() - 1) * $results->perPage() + $loop->iteration }}</td>
                                <td>{{ $rec['book']->judul }}</td>
                                <td>{{ $rec['book']->kategori }}</td>
                                <td>{{ $rec['book']->tingkatan }}</td>
                                <td>{{ number_format($rec['book']->average_rating,1) }}</td>
                                <td>{{ number_format($rec['preference']*100,2) }}%</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination">
                        {{ $results->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card bg-white mb-4 shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Detail Proses TOPSIS</h4>
                </div>
                <div class="card-body">
                    @php
                        $steps = [
                            'matrix'    => 'Matriks Keputusan',
                            'normalized'=> 'Normalisasi',
                            'weighted'  => 'Matriks Terbobot',
                            'idealPos'  => 'Solusi Ideal Positif',
                            'idealNeg'  => 'Solusi Ideal Negatif',
                            'prefs'     => 'Nilai Preferensi',
                        ];
                    @endphp

                    @foreach($steps as $key => $label)
                        @php
                            $data = $process[$key] ?? [];
                            $rows = isset($data[0]) && is_array($data[0]) ? $data : [$data];
                        @endphp
                        <h5 class="mt-3 text-success">{{ $label }}</h5>
                        <div class="table-responsive mb-3" style="max-height: 300px; overflow-y: auto;">
                            <table class="table table-striped table-sm table-bordered">
                                <thead class="bg-light">
                                    <tr>
                                        @foreach(array_keys($rows[0] ?? []) as $col)
                                        <th>{{ $col }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rows as $row)
                                    <tr>
                                        @foreach($row as $val)
                                        <td>{{ is_numeric($val) ? number_format($val,4) : $val }}</td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @elseif(isset($message))
        <div class="alert alert-warning">{{ $message }}</div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('recommendation-form').addEventListener('submit', function() {
        const btn = document.getElementById('filter-button');
        document.getElementById('button-text').textContent = 'Memproses...';
        btn.disabled = true;
        document.getElementById('button-spinner').classList.remove('d-none');
    });
</script>
@endsection
