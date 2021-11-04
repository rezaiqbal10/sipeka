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
            <table  class="table table-bordered table-striped"> 
                <thead>

                </thead>
                <tbody> 
                        <?php $no = 1;
                            foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <th style="">Nomor Polisi</th>
                                <td><?= $data->nomor_polisi ?></td>    
                            </tr>
                            <tr>
                                <th style="">Tanggal Usulan</th>
                                <td><?= $data->tanggal_usulan ?></td>    
                            </tr>
                            <tr>
                                <th style="">Pemegang Kendaraan</th>
                                <td><?= $data->pemegang_kendaraan ?></td>    
                            </tr>
                            <tr>
                                <th style="">Jenis Perbaikan</th>
                                <td><?= $data->jenis_perbaikan ?></td>    
                            </tr>
                            <tr>
                                <th style="">Service Rutin</th>
                                <td><?= $data->service_rutin == 1 ? "Ya" : "Tidak" ?></td>    
                            </tr>
                            <tr>
                                <th style="">Status Perbaikan</th>
                                <td><?= $data->service_rutin == 0 ? "Proses" : "" ?><?= $data->service_rutin == 1 ? "Selesai" : "" ?><?= $data->service_rutin == 2 ? "Ditolak" : "" ?></td>    
                            </tr>
                            <tr>
                                <th style="">Catatan Perbaikan</th>
                                <td><?= $data->catatan_perbaikan ?>></td>    
                            </tr>
                            
                        <?php
                          } ?>
                </tbody>
        </table>

        
<script type="text/javascript">
        window.print();
</script>
</body>
</html>