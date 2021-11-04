<section class="content-header">
    <h1>
        Tambah
        <small>Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">data kendaraan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<?php $this->view('messages'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Usulan Perbaikan</h3>
            <div class="pull-right">
                <a href="<?= site_url('usulan_perbaikan_admin') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> Kembali</i>
                </a> 
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <form action="<?= site_url('usulan_perbaikan_admin/process') ?>" method="post">
                    <div class="form-group">
                            <label>Status Perbaikan *</label>
                            <input type="hidden" name="id" value="<?= $row->usulan_perbaikan_id ?>">
                            <select name="status_perbaikan" value="<?= $row->status_perbaikan ?>" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <option value="0" > Proses </option>
                                <option value="1" > Selesai </option>
                                <option value="2" > Tolak </option>
                            </select>
                    </div>
                        <div class="form-group">
                            <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i>Simpan
                            </button>
                            <button type="Reset" class="btn btn-danger btn-flat">Reset</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->