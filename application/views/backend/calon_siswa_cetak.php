<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo $title; ?> </title>
</head>

<body onload="print()">
    <div style="text-align:center;text-transform: uppercase;">
        <h3>form <?php echo $title;?>

                <br>calon siswa smp it negeri 1 kota bengkulu

                <br>tahun ajaran 2016/2017

            </h3> </div>
    <table align="center" border="1" style="border-collapse:collapse;font-size:12px" width="100%">
        <thead>
            <tr bgcolor="#E2E2E2">
                <th rowspan="2">NO</th>
                <th rowspan="2">NO. REG</th>
                <th rowspan="2" style="width:200px">NAMA</th>
                <th rowspan="2">L/P</th>
                <th rowspan="2">TEMPAT
                    <br>TANGGAL LAHIR</th>
                <th rowspan="2">NAMA AYAH</th>
                <th rowspan="2">NAMA IBU</th>
                <th rowspan="2">ASAL SEKOLAH</th>
                <th colspan="4" style="text-align:center">LAMPIRAN FILE</th>
                <th rowspan="2" style="width:50px;text-align: center;">TANGGAL PEMBAYARAN</th>
            </tr>
            <tr bgcolor="#E2E2E2">
                <th style="width:50px;text-align: center;">AKTA</th>
                <th style="width:50px;text-align: center;">KTP</th>
                <th style="width:50px;text-align: center;">KK</th>
                <th style="width:50px;text-align: center;">BUKTI PEMBAYARAN</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($data)) { ?>
            <tr>
                <td colspan='9' style='text-align:center;color:red'><b>Tidak ada data !</b> </td>
            </tr>
            <?php } $no=1; foreach ($data as $data) { ?>
            <tr>
                <td align="center">
                    <?php echo $no++;?> </td>
                <td>
                    <?php echo $data[ 'no_registrasi'];?> </td>
                <td>
                    <?php echo $data[ 'nama'];?> </td>
                <td style="text-align:center">
                    <?php echo $data[ 'jenis_kelamin'];?> </td>
                <td>
                    <?php echo $data[ 'tempat_lahir']. ', '.date( "d-M-Y",strtotime($data[ 'tanggal_lahir']));?> </td>
                <td>
                    <?php echo $data[ 'nama_ayah'];?> </td>
                <td>
                    <?php echo $data[ 'nama_ibu'];?> </td>
                <td>
                    <?php echo $data[ 'asal_sekolah'];?> </td>
                <td style="text-align:center">
                    <?php if(!empty($data[ 'akta_lahir'])) { echo '&#10004;'; } else { echo '-';} ?> </td>
                <td style="text-align:center">
                    <?php if(!empty($data[ 'ktp_ortu'])) { echo '&#10004;'; } else { echo '-';} ?> </td>
                <td style="text-align:center">
                    <?php if(!empty($data[ 'kartu_keluarga'])) { echo '&#10004;'; } else { echo '-';} ?> </td>
                <td style="text-align:center">
                    <?php if(!empty($data[ 'bukti_bayar'])) { echo '&#10004;'; } else { echo '-';} ?> </td>
                <td style="text-align:center">
                    <?php if(!empty($data[ 'bukti_bayar'])) { echo date( "d-M-Y",strtotime($data[ 'tanggal_bayar']));} else { echo '-';} ?> </td>
            </tr>
            <?php } ?> </tbody>
    </table>
</body>

</html>