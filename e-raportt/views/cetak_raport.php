<?php
error_reporting(0);
?>
<html>

<head>
    <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <script src="<?=base_url('assets/');?>bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url('assets/');?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url('assets/');?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/');?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <title>Cetak Raport</title>
    <style>
        body {
            margin: 40px;
            font-family: 'Arial', sans-serif;
        }
        .header-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .school-info {
            text-align: right;
            line-height: 1.2;
        }
        .divider {
            border: 1px solid black;
            margin-top: 5px;
            margin-bottom: 5px;
            width: 100%;
        }
        .sub-divider {
            border: 0.5px solid black;
            margin-top: -8px;
            width: 90%;
        }
        .info-table td {
            padding: 5px;
        }
        .nilai-table th, .nilai-table td {
            text-align: center;
            vertical-align: middle;
        }
        .signature-section {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }
        .signature {
            text-align: center;
            width: 45%;
        }
    </style>
</head>

<body>

<div style="page-break-after:always;">
    <div class="header-section">
        <img src="<?=base_url('uploads/')._school_profile()->logo;?>" alt="Logo Sekolah" style="width:80px;height:80px;">
        <div class="school-info">
            <h3><?=_school_profile()->nama;?></h3>
            <h4>Akreditasi <?=_school_profile()->akreditasi;?></h4>
            <p>Alamat: <?=_school_profile()->alamat;?> RT <?=_school_profile()->rt;?> / RW <?=_school_profile()->rw;?> <?=_school_profile()->dusun;?>, Kel. <?=_school_profile()->kelurahan;?>, <?=_school_profile()->kecamatan;?>, <?=_school_profile()->kabupaten;?> - <?=_school_profile()->provinsi;?></p>
        </div>
    </div>
    <hr class="divider">
    <hr class="sub-divider">

    <h4 class="text-center" style="margin-top:30px;">DATA HASIL BELAJAR SISWA</h4>
    <h4 class="text-center">RAPORT SISWA</h4>

    <br>
    <table class="info-table">
        <tr>
            <td width="150"><b>NIS</b></td>
            <td width="20">:</td>
            <td width="350"><?=$raport_data['nis'];?></td>
            <td width="125"><b>Tahun Ajaran</b></td>
            <td width="20">:</td>
            <td><?=$raport_data['tahun_akademik'];?></td>
        </tr>
        <tr>
            <td><b>Nama Siswa</b></td>
            <td>:</td>
            <td><?=$raport_data['nama'];?></td>
            <td><b>Semester</b></td>
            <td>:</td>
            <td><?=$raport_data['semester'];?></td>
        </tr>
        <tr>
            <td><b>Kelas</b></td>
            <td>:</td>
            <td><?=$raport_data['kelas_kd'].' - '.$raport_data['kelas_nama'];?></td>
        </tr>
    </table>

    <br>
    <table class="table table-bordered nilai-table" style="font-size:11pt;">
        <thead>
            <tr>
                <th rowspan="2" style="line-height:25px;">MATA PELAJARAN</th>
                <th colspan="4">NILAI</th>
                <th rowspan="2" style="line-height:25px;">NILAI AKHIR</th>
                <th rowspan="2" style="line-height:25px;">PREDIKAT</th>
                <th rowspan="2" style="line-height:25px;">KETERANGAN</th>
            </tr>
            <tr>
                <th>RTP</th>
                <th>RNU</th>
                <th>PTS</th>
                <th>UAS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($raport_nilai as $row) :?>
            <tr>
                <td style="text-align:left;"><?=$row['mapel_nama'];?></td>
                <td><?=$row['rata_tp'];?></td>
                <td><?=$row['rata_uh'];?></td>
                <td><?=$row['nilai_pts'];?></td>
                <td><?=$row['nilai_uas'];?></td>
                <td><?=$row['nilai_akhir'];?></td>
                <td><?=$row['nilai_huruf'];?></td>
                <td style="text-align:left;"><?=$row['deskripsi'];?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <br>
    <p><b>Keterangan:</b><br>
        RTP: Rata-rata nilai Tugas/PR<br>
        RNU: Rata-rata nilai Ulangan Harian<br>
        PTS: Penilaian Tengah Semester<br>
        UAS: Ujian Akhir Semester
    </p>

    <div style="text-align:right;margin-top:30px;margin-right:40px;">
        <?=$raport_data['tempat'];?>, <?=date('d M Y',strtotime($raport_data['tanggal']));?>
    </div>

    <div class="signature-section">
        <div class="signature">
            Kepala Sekolah
            <br><br><br><br>
            <u><?=_school_profile()->nama_kepsek;?></u><br>
            NIP. <?=_school_profile()->nip_kepsek;?>
        </div>
        <div class="signature">
            Wali Kelas
            <br><br><br><br>
            <u><?=$raport_wali['nama'];?></u><br>
            NIP. <?=$raport_wali['nip'];?>
        </div>
    </div>

</div>

<script>
    window.print();
</script>

</body>
</html>
