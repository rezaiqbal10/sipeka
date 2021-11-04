<section class="content-header">
    <h1>
        Verifikasi
        <small>Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Verifikasi data</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Perpanjangan STNK/BPKB</h3>
            <div class="pull-right">
                <a href="<?= site_url('perpanjangan_stnk_admin') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> Kembali</i>
                </a> 
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <form action="<?= site_url('perpanjangan_stnk_admin/process') ?>" method="post">
                    <div class="form-group">
                            <label>Status Perpanjangan STNK/BPKB *</label>
                            <input type="hidden" name="id" value="<?= $row->perpanjangan_stnk_id ?>">
                            <select name="status_perpanjangan" value="<?= $row->status_perpanjangan ?>" class="form-control" required>
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