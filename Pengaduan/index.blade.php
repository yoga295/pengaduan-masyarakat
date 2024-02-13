@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Pengaduan')

@section('content')
    <table id="pengaduanTable" class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Judul</th>
            <th>Isi Laporan</th>
            <th>Lokasi</th>
            <th>Status</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengaduan as $k => $v)
        <tr>
            <td>{{ $k += 1 }}</td>
            <td>{{ $v -> tgl_pengaduan -> format('d-M-Y') }}</td>
            <td>{{ $v -> judul}}</td>
            <td>{{ $v -> isi_laporan }}</td>
            <td>{{ $v -> lokasi }}</td>
            <td>
                @if($v->status == '0')
                <a href="#" class="badge badge-danger">Pending</a>
                @elseif($v->status == 'proses')
                <a href="#" class="badge badge-warning text-white">Proses</a>
                @else
                <a href="#" class="badge badge-success">Selesai</a>
                @endif
            </td>
            <td>
                <a href="{{ route ('pengaduan.show', $v->id_pengaduan) }}" style="text-decoration: underline">Lihat</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#pengaduanTable').DataTable();
        });
    </script>
@endsection