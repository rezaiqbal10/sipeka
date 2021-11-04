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
<div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data User</h3>
            <div class="pull-right">
                <a href="<?= site_url('kwitansi_perpanjangan/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"> Tambah</i>
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nomor Kwitansi</th>
                        <th>Tanggal Kwitansi</th>
                        <th>Penyedia Jasa</th>
                        <th>D/O(Invoice)</th>
                        <th>Nilai Tagihan</th>
                        <th>Cetak</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data->kode_kwitansi_perpanjangan?></td>
                            <td><?= $data->tanggal_kwitansi?></td>
                            <td><?= $data->penyedia_jasa_id == 1 ? "AHASS" : "Samsat Online"?></td>
                            <td><?= $count;?></td>
                            <td><?= $sum;?></td>
                            <td>
                                <a href="<?= site_url('kwitansi_perpanjangan/ls/'. $data->kwitansi_perpanjangan_id) ?>" target="_BLANK" class="btn btn-primary btn-xs">
                                    <i class="fa fa-user-plus"> KWT LS</i>
                                </a>
                                <a href="<?= site_url('kwitansi_perpanjangan/up/'. $data->kwitansi_perpanjangan_id) ?>" target="_BLANK" class="btn btn-primary btn-xs">
                                    <i class="fa fa-user-plus">KWT UP</i>
                                </a>
                                <a href="<?= site_url('kwitansi_perpanjangan/rincian/') . $data->kwitansi_perpanjangan_id ?>" target="_BLANK" class="btn btn-primary btn-xs">
                                    <i class="fa fa-user-plus">Rincian</i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>
<!-- /.content -->