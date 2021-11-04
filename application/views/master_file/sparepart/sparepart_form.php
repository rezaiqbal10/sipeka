<section class="content-header">
    <h1>
        Sparepart
        <small>Kendaraan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Sparepart Kendaraan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Data</h3>
            <div class="pull-right">
                <a href="<?= site_url('sparepart') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> Kembali</i>
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <form action="<?= site_url('sparepart/process') ?>" method="post">
                        <div class="form-group">
                            <label>Penyedia Jasa *</label>
                            <input type="hidden" name="id" value="<?= $row->sparepart_id ?>">
                            <input type="text" name="nama" value="<?= $row->nama ?>" class="form-control" required>

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