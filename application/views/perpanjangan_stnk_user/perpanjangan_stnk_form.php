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
<div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Usulan Perbaikan</h3>
            <div class="pull-right">
                <a href="<?= site_url('perpanjangan_stnk_user') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> Kembali</i>
                </a> 
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <?php echo form_open_multipart('perpanjangan_stnk_user/process') ?>
                   
                        <div class="form-group">
                            <label>Tanggal Perpanjangan STNK *</label>
                            <input type="hidden" name="id" value="<?= $row->perpanjangan_stnk_id ?>">
                            <input type="date" name="tanggal_perpanjangan" value="<?= $row->tanggal_perpanjangan ?>" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label>Kode Perpanjangan *</label>
                            <input type="text" name="kode_perpanjangan" value="<?= $row->kode_perpanjangan ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group ">
                            <label>Nomor Polisi *</label>
                            <input type="text" name="nomor_polisi" value="<?= $this->fungsi->user_login()->nomor_p; ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group ">
                            <label>Pemegang Kendaraan *</label>
                            <input type="text" name="pemegang_kendaraan" value="<?= $this->fungsi->user_login()->name; ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Jenis Perpanjangan *</label>
                            <select name="jenis_perpanjangan" value="<?= $row->jenis_perpanjangan ?>" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="1" > STNK </option>
                                <option value="2" > BPKB </option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label>Foto STNK/BPKB (Jadikan 1 File PDF jika lebih dari 1foto) *</label>
                            <?php if($page == 'edit') {
                                if($row->foto != null) { ?>
                                <div style="margin-bottom:5px"> 
                                    <img src="<?=base_url('uploads/usulan perbaikan/'.$row->foto)?>" style="width:80%">
                                </div>
                            <?php
                                }
                            } ?>
                            <input type="file" name="foto" class="form-control">
                            <small>(Biarkan Kosong jika tidak <?= $page == 'edit' ? 'diganti' : 'ada'?>)</small>
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