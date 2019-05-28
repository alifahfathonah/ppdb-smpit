<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>PPDB</title>
    <style type="text/css">
        * {
            padding: 0;
            margin: 0
        }
        body {
            font-family: sans-serif;
        }
        #badan{margin: auto;width: 747px}
        .body {
            float: left;
            width: 9.5cm;
            height: 7cm;
            padding: 5px;
            border: 2px solid #333
        }
        .body h1 {
            font-size: 10.5px;
            text-align: center;
        }
        .header {
            margin: 3px 0px;
            display: flex;
        }
        .body h3 {
            font-size: 8.5px;
            text-align: center;
        }
        .logo {
            width: 1.5cm;
            float: left
        }
        .logo img {
            width: 100%
        }
        .judul {
            width: 8cm;
            float: right;
            margin-top: 5px
        }
        .wrapper {
            width: 100%;
            margin: 15px 0;
            display: flex;
        }
        .fotonya {
            width: 3cm;
            height: 4cm;
            border-radius: 20px
        }
        .foto {
            float: left;
            width: 3cm;
            height: 4cm;
            background: #fff;
            text-align: center;
            border-radius: 10px;
        }
        .keterangan {
            width: 6.5cm;
            height: 4cm;
            background: #fff;
            float: right;
            margin-left: 3px;
            border-radius: 10px;
        }
        .atas {
            font-size: 10.5px;
            text-align: center;
            padding: 15px
        }
        .bawah {
            font-size: 10.5px;
            display: block;
            padding: 15px 10px;
            line-height: 18px;
        }
        .col-lg-2 {
            width: 30%;
            float: left;
        }
        .col-lg-3 {
            width: 70%;
            float: left;
        }
        .footer {
            background: #fff;
            padding: 2px;
            text-align: center;
        }
        .footer label {
            font-size: 10.5px;
            font-weight: bold;
        }
        th{font-size: 12px}        
    </style>
</head>

<body onload="window.print()">
    <div id="badan">
        <div class="body" style="background: url('<?php echo base_url("assets/frontend/images/bg2.png");?>') 50%;background-size: 100%;">
            <div class="header">
                <div class="logo"> <img src="<?php echo base_url('assets/frontend/images/logo.jpg');?>"> </div>
                <div class="judul">
                    <h1>YAYASAN PENDIDIKAN, SOSIAL DAN DAKWAH AL FIDA<br/>                SMPIT IQRA’ KOTA BENGKULU<br/>                (TERAKREDITASI A)</h1>
                    <h3>Jalan MT.Haryono No.290 Kecamatan Teluk Segara Telepon 0726-21581</h3> </div>
            </div>
            <div class="wrapper">
                <div class="foto"> <img class="fotonya" src="<?php echo base_url().'assets/frontend/uploads/foto/'.$data[0]['foto'] ?>"> </div>
                <div class="keterangan">
                    <div class="atas"> KARTU PESERTA UJIAN MASUK SMPIT TP.
                        <?php $date=date( 'Y'); echo $date. '/'.($date+1);?> </div>
                    <div class="bawah">
                        <label class="col-lg-2">Nama</label>
                        <label class="col-lg-3">:
                            <?php echo $data[0][ 'nama'] ?>
                        </label>
                        <br/>
                        <label class="col-lg-2">Asal Sekolah</label>
                        <label class="col-lg-3">:
                            <?php echo $data[0][ 'asal_sekolah'] ?>
                        </label>
                        <br/>
                        <label class="col-lg-2">No. Peserta</label>
                        <label class="col-lg-3">: <b><?php echo $data[0][ 'no_registrasi'] ?></b>
                        </label>
                    </div>
                </div>
            </div>
            <div class="footer">
                <label>* KARTU INI HARUS DIBAWA SAAT TES UJIAN MASUK </label>
            </div>
        </div>
        <div class="body">
            <div class="header">
                <div class="judul">
                    <h1>JADWAL TES MASUK SMPIT IQRA'</h1>
                </div>
            </div>
            <div class="wrapper">
                <table border="1" style="border-collapse:collapse" cellpadding="5">
                    <tr>
                        <th>No</th>
                        <th>Hari/Tgl</th>
                        <th>Jenis Tes</th>
                        <th>Waktu</th>
                    </tr>
                    <?php $no = 0;
                    foreach ($jadwal as $jadwal) { 
                        $no+=1;?>
                    <tr style="font-size : 10px">
                        <td style="text-align:center"><?php echo $no; ?></td>
                        <td><?php echo $jadwal['hari'].' / '.$jadwal['tanggal']; ?></td>
                        <td><?php echo $jadwal['jenis_tes']; ?></td>
                        <td><?php echo $jadwal['waktu']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>