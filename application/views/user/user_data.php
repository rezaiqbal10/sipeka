<section class="content-header">
    <h1>
        Users
        <small>Pengguna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Data</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data User</h3>
            <div class="pull-right">
                <a href="<?= site_url('user/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"> Tambah User</i>
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nopol</th>
                        <th>Name</th>
                        <th>NPP</th>
                        <th>Address</th>
                        <th>Level</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%;"><?= $no++ ?>.</td>
                            <td><?= $data->username ?></td>
                            <td><?= $data->nomor_p ?></td>
                            <td><?= $data->name ?></td>
                            <td><?= $data->npp ?></td>
                            <td><?= $data->address ?></td>

                            <td><?= $data->level == 1 ? "Admin" : "User" ?></td>
                            <td class="text-center" width="200x">
                                <form action="<?= site_url('user/delete') ?>" method="post">
                                <a href=" <?= site_url('user/detail/') ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-user-plus"> Detail</i>
                                    </a>
                                    <a href="<?= site_url('user/edit/' . $data->user_id) ?>" class="btn btn-warning btn-xs">
                                        <i class="fa fa-pencil"> Edit</i>
                                    </a>
                                    <input type="hidden" name="user_id" value="<?= $data->user_id ?>">
                                    <button onclick="return confirm('Apakah anda yakin?')" class=" btn btn-danger btn-xs">
                                        <i class="fa fa-eraser">Hapus</i>
                                    </button>
                                </form>
                            </td>
                            <td></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>
<!-- /.content -->