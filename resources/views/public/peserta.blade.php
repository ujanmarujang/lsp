{{-- <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cari Data Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light py-5">
<div class="container">
    <h2 class="mb-4">Cari Data Peserta</h2>

    <form method="GET" action="{{ route('peserta.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="nisn" class="form-control" placeholder="Masukkan NISN" required>
            <button class="btn btn-primary">Cari</button>
        </div>
    </form>

    @if ($peserta)
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                Data Peserta: {{ $peserta->nama }}
            </div>
            <div class="card-body row">
                <div class="col-md-8">
                    <p><strong>NISN:</strong> {{ $peserta->nisn }}</p>
                    <p><strong>Nama:</strong> {{ $peserta->nama }}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ $peserta->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                    <p><strong>TTL:</strong> {{ $peserta->tempat_lahir }}, {{ \Carbon\Carbon::parse($peserta->tanggal_lahir)->format('d M Y') }}</p>
                    <p><strong>Agama:</strong> {{ $peserta->agama }}</p>
                    <p><strong>Jurusan:</strong> {{ $peserta->jurusan }}</p>
                    <p><strong>Alamat:</strong> {{ $peserta->alamat }}</p>
                    <p><strong>Tahun Masuk:</strong> {{ $peserta->tahun_masuk }}</p>
                    <a href="{{ route('peserta.pdf', $peserta) }}" class="btn btn-outline-secondary mt-2">
                        Download PDF
                    </a>
                </div>
                <div class="col-md-4 text-center">
                    @if ($peserta->foto)
                        <img src="{{ asset('storage/' . $peserta->foto) }}" alt="Foto Peserta" class="img-thumbnail" width="150">
                    @else
                        <p><em>Foto tidak tersedia</em></p>
                    @endif
                </div>
            </div>
        </div>
    @elseif(request()->has('nisn'))
        <div class="alert alert-warning">
            Data dengan NISN <strong>{{ request()->nisn }}</strong> tidak ditemukan.
        </div>
    @endif
</div>
</body>
</html> --}}
{{-- BARU --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cari Data Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light py-5">
<div class="container">
    <h2 class="mb-4">Cari Data Peserta</h2>

    <form method="GET" action="{{ route('peserta.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="nisn" class="form-control" placeholder="Masukkan NISN" required>
            <button class="btn btn-primary">Cari</button>
        </div>
    </form>

    @if ($peserta)
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                Data Peserta: {{ $peserta->nama }}
            </div>
            <div class="card-body row">
                <div class="col-md-8">
                    <p><strong>NISN:</strong> {{ $peserta->nisn }}</p>
                    <p><strong>Nama:</strong> {{ $peserta->nama }}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ $peserta->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                    <p><strong>TTL:</strong> {{ $peserta->tempat_lahir }}, {{ \Carbon\Carbon::parse($peserta->tanggal_lahir)->format('d M Y') }}</p>
                    <p><strong>Agama:</strong> {{ $peserta->agama }}</p>
                    <p><strong>Jurusan:</strong> {{ $peserta->jurusan }}</p>
                    <p><strong>Alamat:</strong> {{ $peserta->alamat }}</p>
                    <p><strong>Tahun Masuk:</strong> {{ $peserta->tahun_masuk }}</p>

                    <a href="{{ route('peserta.pdf', $peserta) }}" class="btn btn-outline-secondary mt-2">
                        Download PDF
                    </a>
                </div>

                <div class="col-md-4 text-center">
                    {{-- Foto --}}
                    @if ($peserta->foto)
                        <p><strong>Foto:</strong></p>
                        <img src="{{ asset('storage/' . $peserta->foto) }}" alt="Foto Peserta" class="img-thumbnail mb-3" width="150">
                    @else
                        <p><em>Foto tidak tersedia</em></p>
                    @endif

                    {{-- Tanda Tangan --}}
                    @if ($peserta->ttd_url)
                        <p><strong>Tanda Tangan:</strong></p>
                        <img src="{{ $peserta->ttd_url }}" alt="Tanda Tangan" style="height: 100px;">
                    @else
                        <p><em>Tanda tangan tidak tersedia</em></p>
                    @endif
                </div>
            </div>
        </div>
    @elseif(request()->has('nisn'))
        <div class="alert alert-warning">
            Data dengan NISN <strong>{{ request()->nisn }}</strong> tidak ditemukan.
        </div>
    @endif
</div>
</body>
</html>
