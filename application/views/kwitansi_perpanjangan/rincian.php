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
<div style="margin-left: 300px">
<div style="font-size : 20px"> RINCIAN PEMBAYARAN</div>

</div>
<div style="margin-left: 150px">
<div style="font-size : 18px"> KWITANSI/BUKTI PEMBAYARAN PERPANJANGAN STNK/BKPB KENDARAAN DINAS</div>
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
                                <th style="">Nomor Kwitansi</th>
                                <td><?= $data->kode_kwitansi_perpanjangan ?></td>    
                            </tr>
                            <tr>
                                <th style="">Tanggal Usulan</th>
                                <td><?= $data->tanggal_kwitansi?></td>    
                            </tr>
                            <tr>
                                <th style="">Penyedia Jasa</th>
                                <td><?= $data->penyedia_jasa_id == 1 ? "AHASS Motor" : "Samsat Onlien" ?></td>    
                            </tr>
                            <tr>
                                <th style="">D/O (Invoice)</th>
                                <td><?= $count;?></td>    
                            </tr>
                            <tr>
                                <th style="">Jumlah Tagihan</th>
                                <td><?= $sum;?></td>    
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