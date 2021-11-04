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
            <h3 class="box-title"><?= ucfirst($page) ?> Usulan perpanjangan</h3>
            <div class="pull-right">
                <a href="<?= site_url('invoice_perpanjangan') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> Kembali</i>
                </a> 
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <?php echo form_open_multipart('invoice_perpanjangan/process') ?>
                 
                        <div class="form-group">
                            <label>Tanggal Invoice *</label>
                            <input type="hidden" name="id" value="<?= $row->invoice_perpanjangan_id ?>">
                            <input type="date" name="tanggal_invoice" value="<?= $row->tanggal_invoice ?>" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label>Nomor Invoice *</label>
                            <input type="text" name="kode_invoice_perpanjangan" value="<?= $row->kode_invoice_perpanjangan ?>" class="form-control" readonly>
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
                            <label >Kode Perpanjangan *</label>
                            <select name="kode_perpanjangan" class="form-control">
                            <option value="">- Pilih -</option>
                            <?php foreach($perpanjangan_stnk->result() as $key => $data) { ?>
                                <option value="<?= $data->perpanjangan_stnk_id?>" ><?=$data->kode_perpanjangan?></option>
                                <!--?=$data->user_id == $row->user_id ? "selected" : null ?-->
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label>Nilai Invoice *</label>
                            <input type="number" name="nilai_invoice" value="<?= $row->nilai_invoice ?>" class="form-control" required>
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