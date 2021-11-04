<section class="content-header">
    <h1>
        Tim
        <small>Pemeriksa</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Tim Pemeriksa</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tim Pemeriksa</h3>
            <div class="pull-right">
                <a href="<?= site_url('tim_pemeriksa/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"> Tambah</i>
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NPP</th>
                        <th>Jabatan</th>
                        <th>Alamat</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style=" width: 5%;"><?= $no++ ?>.</td>
                            <td><?= $data->nama ?></td>
                            <td><?= $data->npp ?></td>
                            <td><?= $data->jabatan ?></td>
                            <td><?= $data->alamat ?></td>

                            <!-- <td><?= $data->level == 1 ? "Admin" : "User" ?></td> -->
                            <td class="text-center" width="200x">

                                <a href="<?= site_url('tim_pemeriksa/delete/' . $data->tim_pemeriksa_id) ?>" id="btn-hapus" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"> Hapus</i>
                                </a>
                                <a href="<?= site_url('tim_pemeriksa/edit/' . $data->tim_pemeriksa_id) ?>" class="btn btn-primary btn-xs">
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