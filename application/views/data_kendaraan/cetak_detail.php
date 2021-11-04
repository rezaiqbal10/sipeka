<!DOCTYPE html>
<html>
<head>
<title></title>
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
                                <td><?= $data->nomor_p ?></td>    
                            </tr>
                            <tr>
                                <th style="">Jenis Kendaraan</th>
                                <td><?= $data->jenis_kendaraan == 1 ? "Motor" : "" ?><?= $data->jenis_kendaraan == 2 ? "Mobil" :"" ?><?= $data->jenis_kendaraan == 3 ? "Bus" :"" ?></td>    
                            </tr>
                            <tr>
                                <th style="">Merk Kendaraan</th>
                                <td><?= $data->merk_kendaraan ?></td>    
                            </tr>
                            <tr>
                                <th style="">Tahun Pembuatan</th>
                                <td><?= $data->tahun_pembuatan ?></td>    
                            </tr>
                            <tr>
                                <th style="">Pemegang Kendaraan</th>
                                <td><?= $data->name ?></td>    
                            </tr>
                            <tr>
                                <th style="">Warna Kendaraan</th>
                                <td><?= $data->warna_kendaraan ?>></td>    
                            </tr>
                            <tr>
                                <th style="">Nomor BMN</th>
                                <td><?= $data->nomor_bmn ?></td>    
                            </tr>
                            <tr>
                                <th style="">Nomor STNK</th>
                                <td><?= $data->nomor_stnk ?></td>    
                            </tr>
                            <tr>
                                <th style="">Nomor Rangka</th>
                                <td><?= $data->nomor_rangka ?></td>    
                            </tr>
                            <tr>
                                <th style="">Kondisi Kendaraan</th>
                                <td><?= $data->kondisi_kendaraan ?></td>    
                            </tr>
                            <tr>
                                <th style="">NUP</th>
                                <td><?= $data->nup ?></td>    
                            </tr>
                            <tr>
                                <th style="">Seri Kendaraan</th>
                                <td><?= $data->seri_kendaraan ?></td>    
                            </tr>
                            <tr>
                                <th style="">Jenis BBM</th>
                                <td><?= $data->jenis_bbm == 1 ? "Pertamax" :""?> <?= $data-> jenis_bbm == 2 ?"Pertamax Turo" : "" ?><?= $data-> jenis_bbm == 3 ? "Pertalite" :""?><?= $data->jenis_bbm == 4 ? "Solar" : "" ?></td>    
                            </tr>
                            <tr>
                                <th style="">Nomor Mesin</th>
                                <td><?= $data->nomor_mesin ?></td>    
                            </tr>
                            <tr>
                                <th style="">Nomor BPKB</th>
                                <td><?= $data->nomor_bpkb ?></td>    
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