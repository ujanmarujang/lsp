<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kartu Peserta</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
            margin: 0;
            padding: 10px;
        }

        .card {
            width: 90mm;
            height: 50mm;
            border: 2px solid #000;
            padding: 5mm;
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            border-bottom: 1px solid #000;
            padding-bottom: 3mm;
            margin-bottom: 3mm;
        }

        .logo {
            width: 15mm;
            height: auto;
            display: block;
            margin: 0 auto 2mm;
        }

        .school-name {
            font-size: 14px;
            font-weight: bold;
            margin: 0;
        }

        .card-title {
            font-size: 12px;
            margin: 2mm 0;
        }

        .content {
            display: grid;
            grid-template-columns: 1fr;
            gap: 3mm;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 1mm 0;
        }

        .info-table .label {
            font-weight: bold;
            width: 30%;
        }

        .info-table .separator {
            width: 5%;
            text-align: center;
        }

        .photo-container {
            text-align: center;
        }

        .photo-container img {
            width: 25mm;
            height: 30mm;
            object-fit: cover;
            border: 1px solid #000;
        }

        .qr {
            margin-top: 5px;
        }

        .alamat-sekolah {
            font-size: 10px;
            margin-top: -5px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            {{-- Logo sekolah dari template --}}
            @if ($template?->logo)
                <img src="{{ public_path('storage/' . $template->logo) }}" alt="Logo" class="logo">
            @endif

            <h1 class="school-name">{{ $template->nama_sekolah ?? 'Nama Sekolah' }}</h1>

            <p class="alamat-sekolah">
                {{ $template->alamat ?? '-' }}<br>
                {{ $template->website ?? '-' }}
            </p>

            <p class="card-title">KARTU PESERTA DIDIK</p>
        </div>

        <div class="content">
            <table class="info-table">
                <tr>
                    <td class="label">NISN</td>
                    <td class="separator">:</td>
                    <td>{{ $data->nisn }}</td>
                </tr>
                <tr>
                    <td class="label">Nama</td>
                    <td class="separator">:</td>
                    <td>{{ $data->nama }}</td>
                </tr>
                <tr>
                    <td class="label">Jurusan</td>
                    <td class="separator">:</td>
                    <td>{{ $data->jurusan }}</td>
                </tr>
                <tr>
                    <td class="label">Tahun</td>
                    <td class="separator">:</td>
                    <td>{{ $data->tahun_masuk }}</td>
                </tr>
            </table>

            <div class="photo-container">
                @if ($data->foto)
                    <img src="{{ public_path('storage/' . $data->foto) }}" alt="Foto Peserta">
                @else
                    <p>Tidak ada foto</p>
                @endif

                {{-- QR Code via API --}}
                <div class="qr">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data={{ urlencode('NISN: ' . $data->nisn . ' | Nama: ' . $data->nama) }}" alt="QR Code">
                </div>
            </div>
        </div>
    </div>
</body>
</html>

{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>KARTU PESERTA DIDIK</title>
    <style>
        /* Reset CSS untuk PDF */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Arial", sans-serif;
            background: #f5f5f5;
        }

        /* Ukuran kartu (format ID card standar) */
        .id-card {
            width: 85.6mm;  /* 3.37 inch */
            height: 53.98mm; /* 2.125 inch */
            margin: 10mm auto;
            background: white;
            border-radius: 3mm;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            position: relative;
        }

        /* Header kartu */
        .card-header {
            background: #1e88e5;
            color: white;
            padding: 3mm;
            text-align: center;
            font-size: 10pt;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .school-logo {
            width: 8mm;
            height: 8mm;
            margin-right: 2mm;
            object-fit: contain;
        }

        /* Body kartu */
        .card-body {
            display: flex;
            padding: 2mm;
        }

        /* Bagian informasi */
        .info-section {
            flex: 2;
            padding: 2mm;
        }

        .info-table {
            width: 100%;
            font-size: 8pt;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 1mm 0;
            vertical-align: top;
        }

        .label {
            font-weight: bold;
            color: #555;
            width: 20mm;
        }

        /* Bagian foto */
        .photo-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2mm;
            border-left: 1px dashed #ddd;
        }

        .student-photo {
            width: 25mm;
            height: 30mm;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            margin-bottom: 2mm;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .student-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-placeholder {
            font-size: 7pt;
            color: #666;
            text-align: center;
        }

        .qr-code {
            width: 20mm;
            height: 20mm;
            border: 1px solid #eee;
        }

        /* Footer kartu */
        .card-footer {
            font-size: 6pt;
            text-align: center;
            padding: 2mm;
            background: #f9f9f9;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>
    <div class="id-card">
        <!-- Header Kartu -->
        <div class="card-header">
            @if($template && $template->logo)
                <img src="{{ storage_path('app/public/' . str_replace('public/', '', $template->logo)) }}"
                     class="school-logo"
                     alt="Logo Sekolah">
            @endif
            {{ strtoupper($template->nama_sekolah ?? 'NAMA SEKOLAH') }}
        </div>

        <!-- Body Kartu -->
        <div class="card-body">
            <!-- Bagian Informasi -->
            <div class="info-section">
                <table class="info-table">
                    <tr>
                        <td class="label">NISN</td>
                        <td>:</td>
                        <td>{{ $data->nisn ?? '0000000000' }}</td>
                    </tr>
                    <tr>
                        <td class="label">NAMA</td>
                        <td>:</td>
                        <td><strong>{{ strtoupper($data->nama ?? 'NAMA SISWA') }}</strong></td>
                    </tr>
                    <tr>
                        <td class="label">JURUSAN</td>
                        <td>:</td>
                        <td>{{ $data->jurusan ?? 'JURUSAN' }}</td>
                    </tr>
                    <tr>
                        <td class="label">ANGKATAN</td>
                        <td>:</td>
                        <td>{{ $data->tahun_masuk ?? '2023' }}</td>
                    </tr>
                </table>
            </div>

            <!-- Bagian Foto -->
            <div class="photo-section">
                @if($data->foto)
                    <div class="student-photo">
                        <img src="{{ storage_path('app/public/' . str_replace('public/', '', $data->foto)) }}"
                             alt="Foto Siswa">
                    </div>
                @else
                    <div class="student-photo">
                        <span class="photo-placeholder">FOTO<br>3x4 cm</span>
                    </div>
                @endif

                <!-- QR Code -->
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode('NISN:'.($data->nisn??'000000').'|NAMA:'.($data->nama??'SISWA')) }}"
                     class="qr-code"
                     alt="QR Code">
            </div>
        </div>

        <!-- Footer Kartu -->
        <div class="card-footer">
            {{ $template->alamat ?? 'Alamat Sekolah' }} | {{ $template->website ?? 'www.sekolah.sch.id' }}
        </div>
    </div>
</body>
</html> --}}
