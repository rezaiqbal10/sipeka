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
<div style="font-size : 18px"> KWITANSI/BUKTI PEMBAYARAN PERPBAIKAN KENDARAAN DINAS</div>
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
                                <th style="">Nomor Invoice</th>
                                <td><?= $data->kode_invoice_perbaikan ?></td>    
                            </tr>
                            <tr>
                                <th style="">Tanggal Invoice</th>
                                <td><?= $data->tanggal_invoice?></td>    
                            </tr>
                            <tr>
                                <th style="">Penyedia Jasa</th>
                                <td><?= $data->penyedia_jasa_id == 1 ? "AHASS Motor" : "Samsat Onlien" ?></td>    
                            </tr>
                            <tr>
                                <th style="">Status Invoice</th>
                                <td> <?php   if($data->status_invoice == '0'){
                                        echo '<span class="label label-warning">Belum Dibayar</span>';
                                    } else if($data->status_invoice == '1') {
                                        echo '<span class="label label-success">Selesai</span>';
                                    } else if($data->status_invoice == '2'){
                                        echo '<span class="label label-danger">Ditolak</span>';
                                    }
                            ?></td>    
                            </tr>
                            <tr>
                                <th style="">D/O (Invoice)</th>
                                <td><?= $count;?></td>    
                            </tr>
                            <tr>
                                <th style="">Nilai Tagihan</th>
                                <td><?= $data->nilai_invoice?></td>    
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