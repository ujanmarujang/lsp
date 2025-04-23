<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Peserta</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 13px;
            margin: 40px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 20px;
            margin: 0;
        }

        .header p {
            margin: 0;
            font-size: 13px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .data-table td {
            padding: 8px;
            border: 1px solid #444;
            vertical-align: top;
        }

        .data-table td.label {
            width: 35%;
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .photo {
            text-align: center;
            margin-top: 25px;
        }

        .photo img {
            width: 130px;
            height: 160px;
            object-fit: cover;
            border: 1px solid #999;
            border-radius: 5px;
        }

        .footer {
            margin-top: 60px;
            text-align: right;
            font-size: 12px;
        }

        .clearfix {
            display: flex;
            justify-content: space-between;
        }

        .left, .right {
            width: 48%;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>SMK Nurul Islam</h1>
        <p>Jakarta Timur</p>
        <hr>
        <h3>DATA PESERTA DIDIK</h3>
    </div>

    <div class="clearfix">
        <div class="left">
            <table class="data-table">
                <tr>
                    <td class="label">NISN</td>
                    <td>{{ $data->nisn }}</td>
                </tr>
                <tr>
                    <td class="label">Nama</td>
                    <td>{{ $data->nama }}</td>
                </tr>
                <tr>
                    <td class="label">NIS</td>
                    <td>{{ $data->nis }}</td>
                </tr>
                <tr>
                    <td class="label">Jenis Kelamin</td>
                    <td>{{ $data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                    <td class="label">Tempat, Tanggal Lahir</td>
                    <td>{{ $data->tempat_lahir }}, {{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Agama</td>
                    <td>{{ $data->agama }}</td>
                </tr>
                <tr>
                    <td class="label">Alamat</td>
                    <td>{{ $data->alamat }}</td>
                </tr>
                <tr>
                    <td class="label">Jurusan</td>
                    <td>{{ $data->jurusan }}</td>
                </tr>
                <tr>
                    <td class="label">Tahun Masuk</td>
                    <td>{{ $data->tahun_masuk }}</td>
                </tr>
            </table>
        </div>

        <div class="right photo">
            @if ($data->foto)
                <img src="{{ public_path('storage/' . $data->foto) }}" alt="Foto Peserta">
            @else
                <p>Tidak ada foto</p>
            @endif
        </div>
    </div>

    <div class="footer">
        Dicetak pada: {{ now()->format('d/m/Y H:i') }}
    </div>
</body>
</html>
