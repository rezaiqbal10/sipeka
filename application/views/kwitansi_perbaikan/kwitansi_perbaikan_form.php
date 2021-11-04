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
                <a href="<?= site_url('kwitansi_perbaikan') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> Kembali</i>
                </a> 
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <?php echo form_open_multipart('kwitansi_perbaikan/process') ?>
                 
                        <div class="form-group">
                            <label>Tanggal Invoice *</label>
                            <input type="hidden" name="id" value="<?= $row->kwitansi_perbaikan_id ?>">
                            <input type="date" name="tanggal_kwitansi" value="<?= $row->tanggal_kwitansi ?>" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label>Nomor Kwitansi *</label>
                            <input type="text" name="kode_kwitansi_perbaikan" value="<?= $row->kode_kwitansi_perbaikan ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label >Penyedia Jasa *</label>
                            <select name="nama" class="form-control">
                            <option value="">- Pilih -</option>
                            <?php foreach($penyedia_jasa->result() as $key => $data) { ?>
                                <option value="<?= $data->penyedia_jasa_id?>" ><?=$data->nama?></option>
                                <!--?=$data->user_id == $row->user_id ? "selected" : null ?-->
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i>Simpan
                            </button>
                            <button type="Reset" class="btn btn-danger btn-flat">Reset</button>
                        </div>
                        <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->