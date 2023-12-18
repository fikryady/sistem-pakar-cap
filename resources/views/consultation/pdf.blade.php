<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Central Aquatics | {{ $title }}</title>

    <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
        .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
        .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
        .tg .tg-head{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-center{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-left{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
    </style>
</head>
<body>
    <div style="font-family:Arial; font-size:12px;">
        <center><h3>Hasil Konsultasi</h3></center>
        <hr>
        <br>
    </div>
    @php
        $symptoms = unserialize($history->symptom);
        $hasil = unserialize($history->hasil);
        $no = 1;
    @endphp
    <table class="tg">
        <thead>
            <tr>
                <th class="tg-head" colspan="2">Identitas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tg-left">Nama</td>
                <td class="tg-left">{{ $history->nama }}</td>
            </tr>
            <tr>
                <td class="tg-left">Alamat</td>
                <td class="tg-left">{{ $history->alamat }}</td>
            </tr>
            <tr>
                <td class="tg-left">Pekerjaan</td>
                <td class="tg-left">{{ $history->pekerjaan }}</td>
            </tr>
        </tbody>
    </table>
    <br>

    <table class="tg">
        <thead>
            <tr>
                <th class="tg-head">Gejala yang dipilih</th>
            </tr>
        </thead>
        <tbody>
            @foreach($symptoms as $symptom)
                <tr>
                    <td class="tg-left">{{ $no++ }}. {{ $symptom->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>

    <table class="tg">
        <thead>
            <tr>
                <th class="tg-head" colspan="2">Diagnosa</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tg-left">Penyakit</td>
                <td class="tg-left">{{ $hasil['disease_nama'] }}</td>
            </tr>
            <tr>
                <td class="tg-left">Persentase</td>
                <td class="tg-left">{{ $hasil['persen'] }}%</td>
            </tr>
            <tr>
                <td class="tg-left">Pengendalian</td>
                <td class="tg-left">{!! $disease->pengendalian !!}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>