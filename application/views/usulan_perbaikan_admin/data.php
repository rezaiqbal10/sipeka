<section class="content-header">
    <h1>
        Usulan
        <small>Perbaikan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Usulan Perbaikan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Usulan Perbaikan</h3>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nomor Polisi</th>
                        <th>Tanggal Usulan</th>
                        <th>Kode Usulan</th>
                        <th>Pemegang Kendaraan</th>
                        <th>Jenis Perbaikan</th>
                        <th>Status Perbaikan</th>
                        <th>Action</th>
                        <th>Cetak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data->nomor_polisi; ?></td>
                            <td><?= $data->tanggal_usulan; ?></td>
                            <td><?= $data->kode_usulan; ?></td>
                            <td><?= $data->pemegang_kendaraan; ?></td>
                            <td><?= $data->jenis_perbaikan; ?></td>
                            <td>
                            <?php   if($data->status_perbaikan == '0'){
                                        echo '<span class="label label-warning">Proses</span>';
                                    } else if($data->status_perbaikan == '1') {
                                        echo '<span class="label label-success">Selesai</span>';
                                    } else if($data->status_perbaikan == '2'){
                                        echo '<span class="label label-danger">Ditolak</span>';
                                    }
                            ?>
                            </td>
                            <td class="text-center" width="200x"> 
                            <input type="hidden" name="usulan_perbaikan_id" value="<?= $data->usulan_perbaikan_id ?>">
                            <a href="<?= site_url('usulan_perbaikan_admin/edit/' . $data->usulan_perbaikan_id) ?>"class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil">Konfirmasi Status</i>
                            </a>
                                    <a href="<?= site_url('usulan_perbaikan_admin/invoice/' . $data->usulan_perbaikan_id) ?>"class="btn btn-success btn-xs">
                                        <i class="fa fa-pencil"> Invoice</i>
                                    </a>
                            </td>
                            
                            <td class="text-center" width="200x">
                                <a href="<?= site_url('usulan_perbaikan_admin/cetak/' . $data->usulan_perbaikan_id) ?>" target="_BLANK" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"> Cetak</i>
                                </a>
                                <a href="<?= site_url('usulan_perbaikan_admin/cetak_invoice/' . $data->usulan_perbaikan_id) ?>" target="_BLANK" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"> D/O</i>
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