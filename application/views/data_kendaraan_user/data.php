<section class="content-header">
    <h1>
        Data
        <small>Kendaraan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Data Kendaraan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data User</h3>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nomor Polisi</th>
                        <th>Jenis Kendaraan</th>
                        <th>Tahun Pembuatan</th>
                        <th>Pemegang Kendaraan</th>
                        <!-- <th>Status Perpanjangan</th>
                        <th>Status Perbaikan</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data->nomor_p ?></td>
                            <td><?= $data->jenis_kendaraan == 1 ? "Motor" : "" ?><?= $data->jenis_kendaraan == 2 ? "Mobil" :"" ?><?= $data->jenis_kendaraan == 3 ? "Bus" :"" ?></td>
                            <td><?= $data->tahun_pembuatan ?></td>
                            <td><?= $data->name ?></td>
                            <td> 
                                <a id="lihat" class="btn btn-primary btn-xs"
                                data-toggle="modal" data-target="#modal-lihat"
                                data-nomor_p="<?=$data->nomor_p?>"
                                data-jenis_kendaraan="<?=$data->jenis_kendaraan?>"
                                data-tahun_pembuatan="<?=$data->tahun_pembuatan?>"
                                data-name="<?=$data->name?>"
                                data-merk_kendaraan="<?=$data->merk_kendaraan?>"
                                data-warna_kendaraan="<?=$data->warna_kendaraan?>"
                                data-seri_kendaraan="<?=$data->seri_kendaraan?>"
                                data-nomor_bmn="<?=$data->nomor_bmn?>"
                                data-nomor_rangka="<?=$data->nomor_rangka?>"
                                data-nomor_mesin="<?=$data->nomor_mesin?>"
                                data-jenis_bbm="<?=$data->jenis_bbm?>"
                                data-kondisi_kendaraan="<?=$data->kondisi_kendaraan?>">
                                    <i class="fa fa-user-plus"> Lihat</i>
                                </a>
                                <a href="<?= site_url('data_kendaraan_user/history/' . $data->data_kendaraan_id) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-user-plus">History</i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Merk Kendaraan</th>
                        <th>Nomor Rangka</th>
                        <th>Nomor Mesin</th>
                        <th>Jenis BBM</th>
                        <th>Kondisi Kendaraan</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data->merk_kendaraan ?></td>
                            <td><?= $data->nomor_rangka ?></td>
                            <td><?= $data->nomor_mesin ?></td>
                            <td><?= $data->jenis_bbm == 1 ? "Pertamax" : "" ?><?= $data->jenis_bbm == 2 ? "Pertamax Turbo" :"" ?><?= $data->jenis_bbm == 3 ? "Pertalite" :"" ?><?= $data->jenis_bbm == 4 ? "Premium" : "" ?><?= $data->jenis_bbm == 5 ? "Solar" : "" ?></td>
                            <td><?= $data->kondisi_kendaraan ?></td>
                            
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>
<div class="modal fade" id="modal-lihat">
    <div class="modal-dialog">
        <div class=" modal-content">
            <div class=" modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;<span>
                    </button>
                    <h4 class="modal-title">Lihat Data Kendaraan</h4>
                    </div>
                    <div class="modal-body table-responsive">
                    <table class="table table-bordered table-striped" >
                        <tbody>
                            <tr>
                                <th style="">Nomor Polisi</th>
                                <td><span id="nomor_p"></span></td>    
                            </tr>
                            <tr>
                                <th style="">Jenis Kendaraan</th>
                                <td><span id="jenis_kendaraan"></span></td>    
                            </tr>
                            <tr>
                                <th style="">Tahun Pembutan</th>
                                <td><span id="tahun_pembuatan"></span></td>    
                            </tr>
                            <tr>
                                <th style="">Pemegang Kendaraan</th>
                                <td><span id="name"></span></td>    
                            </tr>
                            <tr>
                                <th style="">Merk Kendaraan</th>
                                <td><span id="merk_kendaraan"></span></td>    
                            </tr>
                            <tr>
                                <th style="">Warna Kendaraan</th>
                                <td><span id="warna_kendaraan"></span></td>    
                            </tr>
                            <tr>
                                <th style="">Seri Kendaraan</th>
                                <td><span id="seri_kendaraan"></span></td>    
                            </tr>
                            <tr>
                                <th style="">Nomor BMN</th>
                                <td><span id="nomor_bmn"></span></td>    
                            </tr>
                            <tr>
                                <th style="">Nomor Rangka</th>
                                <td><span id="nomor_rangka"></span></td>    
                            </tr>
                            <tr>
                                <th style="">Nomor Mesin</th>
                                <td><span id="nomor_mesin"></span></td>    
                            </tr>
                            <tr>
                                <th style="">Jenis BBM</th>
                                <td><span id="jenis_bbm"></span></td>    
                            </tr>
                            <tr>
                                <th style="">Kondis Kendaraan</th>
                                <td><span id="kondisi_kendaraan"></span></td>    
                            </tr>

                        </tbody>        
                    </table>
            </div>
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function() {
    $(document).on('click', '#lihat', function(){
    var nomorp = $(this).data('nomor_p');
    var jenis_kendaraan = $(this).data('jenis_kendaraan');
    var tahun_pembuatan = $(this).data('tahun_pembuatan');
    var name = $(this).data('name');
    var merk_kendaraan = $(this).data('merk_kendaraan');
    var warna_kendaraan = $(this).data('warna_kendaraan');
    var seri_kendaraan = $(this).data('seri_kendaraan');
    var nomor_bmn = $(this).data('nomor_bmn');
    var nomor_rangka = $(this).data('nomor_rangka');
    var nomor_mesin = $(this).data('nomor_mesin');
    var jenis_bbm = $(this).data('jenis_bbm');
    var kondisi_kendaraan = $(this).data('kondisi_kendaraan');
    $('#nomor_p').text(nomorp);
    $('#jenis_kendaraan').text(jenis_kendaraan == 1 ? "Motor" : jenis_kendaraan == 2 ? "Mobil" : "Bus");
    $('#tahun_pembuatan').text(tahun_pembuatan);
    $('#name').text(name);
    $('#merk_kendaraan').text(merk_kendaraan);
    $('#warna_kendaraan').text(warna_kendaraan);
    $('#seri_kendaraan').text(seri_kendaraan);
    $('#nomor_bmn').text(nomor_bmn);
    $('#nomor_rangka').text(nomor_rangka);
    $('#nomor_mesin').text(nomor_mesin);
    $('#jenis_bbm').text(jenis_bbm == 1 ? "Pertamax" : jenis_bbm == 2 ?"Pertamax Turo" : jenis_kendaraan == 3 ? "Pertalite" : jenis_bbm == 4 ? "Solar" : "Premium");
    $('#kondisi_kendaraan').text(kondisi_kendaraan);
    // $('#modal-lihat').modal('hide');
    })
})
</script>
