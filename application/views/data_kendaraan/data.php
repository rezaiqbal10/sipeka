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
<div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Data Kendaraan</h3>
            <div class="pull-right">
                <a href="<?= site_url('data_kendaraan/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"> Tambah</i>
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nomor Polisi</th>
                        <th>Jenis Kendaraan</th>
                        <th>Merk Kendaraan</th>
                        <th>Tahun Pembuatan</th>
                        <th>Pemegang Kendaraan</th>
                        <th>Cetak</th>
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
                            <td><?= $data->merk_kendaraan ?></td>
                            <td><?= $data->tahun_pembuatan ?></td>
                            <td><?= $data->name ?></td>
                            <td>
                                <a href="<?= site_url('data_kendaraan/cetak_detail/'.$data->data_kendaraan_id) ?>" target="_BLANK" class="btn btn-primary btn-xs">
                                    <i class="fa fa-print"> Detail</i>
                                </a>
                                <!-- <a href="" class="btn btn-primary btn-xs">
                                    <i class="fa fa-user-plus">SIP</i>
                                </a> -->
                            </td>
                            <td class="text-center" width="200x">
                                 <a href="<?= site_url('data_kendaraan/delete/' . $data->data_kendaraan_id) ?>" id="btn-hapus" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"> Hapus</i>
                                </a>
                                <a href="<?= site_url('data_kendaraan/edit/' . $data->data_kendaraan_id) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"> Edit</i>
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