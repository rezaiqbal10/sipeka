<!DOCTYPE html>
<html>
<head>
<title>

</title>
</head>
<body>
<table>

<tr>
<td>
                <img src="<?= base_url('assets/img/profile/kop.png') ?>" style="position :absolute; widht:90px; height:90px;">
            </td>

</tr>
</table>
<br>
<br>
<br>
<br>
<br>
<div style="margin-left: 50px">
<div style="font-size : 20px">  KWITANSI/BUKTI PEMBAYARAN PERPANJANGAN STNK/BPKB KENDARAAN DINAS</div>

</div>
<div style="margin-left: 200px">
<div style="font-size : 18px"> <?php foreach($row->result() as $key => $data) { ?>
    <span><?= $data->kode_kwitansi_perpanjangan ?></span>
<?php
}
?>
</div>
</div>
<br>
<br>
<br>
            <table  class="table table-bordered table-striped"> 
                <thead>

                </thead>
                <tbody> 
                        <?php $no = 1;
                            foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <th style="">Sudah Diterima Dari :</th>
                                <td>Kuasa Pengguna Anggaran/PPK Ketatalaksanaan Satker BBWS Pemali Juana</td>    
                            </tr>
                            <tr>
                                <th style="">Tanggal Usulan</th>
                                <td><?= $data->tanggal_kwitansi?></td>    
                            </tr>
                            <tr>
                                <th style="">Penyedia Jasa</th>
                                <td><?= $data->penyedia_jasa_id == 1 ? "AHASS Motor" : "Samsat Online" ?></td>    
                            </tr>
                            <tr>
                                <th style="">Jumlah Tagihan</th>
                                <td>Rp. <?= $sum;?></td>    
                            </tr>
                            
                        <?php
                          } ?>
                          
                </tbody>
        </table>
       
        <table>

<tr>
<td>
                <img src="<?= base_url('assets/img/profile/3.png') ?>"  style="position :absolute; ">
            </td>

</tr>
</table>
<br>       
 <br>       
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>

        
<script type="text/javascript">
        window.print();
</script>
</body>
</html>