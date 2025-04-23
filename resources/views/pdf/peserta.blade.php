@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Peserta</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Tanggal Lahir</th>
                <th>Jurusan</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesertas as $peserta)
                <tr>
                    <td>{{ $peserta->nisn }}</td>
                    <td>{{ $peserta->nama }}</td>
                    <td>{{ $peserta->nis }}</td>
                    <td>{{ $peserta->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $peserta->agama }}</td>
                    <td>{{ \Carbon\Carbon::parse($peserta->tanggal_lahir)->format('d M Y') }}</td>
                    <td>{{ $peserta->jurusan }}</td>
                    <td>
                        @if ($peserta->foto)
                            <img src="{{ asset('storage/' . $peserta->foto) }}" width="50" height="50">
                        @else
                            <span>Tidak ada foto</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
