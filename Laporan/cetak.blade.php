<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Laporan Pengaduan</title>
</head>
<body>
    <div class="text-center">
        <h5>Laporan Pengaduan Masyarakat</h5>
        <h6>Yoga Esabio</h6>
    </div>
    <div class="container">
        <div class="table">
            <table class="w-100">
                <thead class="w-100"> 
                <tr class="w-100">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Isi Laporan</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengaduan as $k => $v)
                    <tr>
                        <td>{{ $k +=1 }}</td>
                        <td>{{ $v->tgl_pengaduan->format('d-M-Y') }}</td>
                        <td>{{ $v->judul }}</td>
                        <td>{{ $v->isi_laporan }}</td>
                        <td>{{ $v->lokasi }}</td>
                        <td>{{ $v->status == '0' ? 'Pending' : ucwords($v->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            
        </div>
    </div>
</body>
</html>