<!DOCTYPE html>
<html>

<head>
    <title>Laporan Rekapan Karang Taruna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>


    <center>
        @foreach ($data2 as $e)
            <h5>{{ $e->kartar }}</h4>
        @endforeach
        <h6>{{ \Carbon\Carbon::now()->format('d-m-Y') }}</h6>
    </center>

	<table class='table table-bordered'>
        <thead>
            <tr>

                <th>Total Pemasukan</th>
                <th>Total Pengeluaran</th>
                <th>Saldo Akhir</th>
            </tr>
        </thead>
        <tbody>

            @php 
            $i=1;
            $tot_rek_t = $data[0]->sum('masuk') - $data[0]->sum('keluar');
            
            @endphp
            <tr>
            

                <td>Rp. @money((float)$data[0]->sum('masuk'))</td>
                <td>Rp. @money((float)$data[0]->sum('keluar'))</td>
                    @if ($tot_rek_t == 0)
                        <td>Saldo: kosong<td>
                    @elseif ($tot_rek_t <= -1)
                        <td>Kurang: Rp.@money((float)"$tot_rek_t")<td>
                    @else
                        <td>Saldo: Rp.@money((float)"$tot_rek_t")<td>
                    @endif
                



            </tr>

        </tbody>
    </table>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Uraian</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                @php $i=1 @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->tanggal }}</td>
                    <td>{{ $d->uraian }}</td>
                    <td>Rp. @money((float)"$d->masuk ? $d->masuk : 0") </td>
                    <td>Rp. @money((float)"$d->keluar ? $d->keluar : 0")</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    



</body>

</html>
