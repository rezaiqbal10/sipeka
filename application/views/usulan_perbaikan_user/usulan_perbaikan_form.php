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
                <a href="<?= site_url('usulan_perbaikan_user') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> Kembali</i>
                </a> 
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <?php echo form_open_multipart('usulan_perbaikan_user/process') ?>
                 
                        <div class="form-group">
                            <label>Tanggal usulan *</label>
                            <input type="hidden" name="id" value="<?= $row->usulan_perbaikan_id ?>">
                            <input type="date" name="tanggal_usulan" value="<?= $row->tanggal_usulan ?>" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label>Kode Usulan *</label>
                            <input type="text" name="kode_usulan" value="<?= $row->kode_usulan ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group ">
                            <label>Nomor Polisi *</label>
                            <input type="text" name="nomor_polisi" value="<?= $this->fungsi->user_login()->nomor_p; ?>" class="form-control" readonly>
                        </div> 
                        <div class="form-group">
                            <label >Nomor STNK *</label>
                            <select name="nomor_stnk" class="form-control">
                            <option value="">- Pilih -</option>
                            <?php foreach($data_kendaraan->result() as $key => $data) { ?>
                                <option value="<?= $data->data_kendaraan_id?>" ><?=$data->nomor_stnk?></option>
                                <!--?=$data->user_id == $row->user_id ? "selected" : null ?-->
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label>Pemegang Kendaraan *</label>
                            <input type="text" name="pemegang_kendaraan" value="<?= $this->fungsi->user_login()->name; ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Service Rutin (Tune up, Cek rem depan dan belakang, Ganti oli)n *</label>
                            <select name="service_rutin" value="<?= $row->service_rutin ?>" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="1" > Ya </option>
                                <option value="2" > Tidak </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Atasan *</label>
                            <select name="nama_atasan" value="<?= $row->nama_atasan ?>" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <option value="1" > Joko Widodo </option>
                                <option value="2" > Ganjar Pranowo </option>
                                <option value="3" > Hendra Prihadi </option>
                                <option value="4" > Edy Nur Sasongko </option>
                                <option value="5" > H. Ahmad </option>
                            </select>
                        <div class="form-group ">
                            <label>Jenis Perbaikan *</label>
                            <input type="text" name="jenis_perbaikan" value="<?= $row->jenis_perbaikan ?>" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label>Catatan Perbaikan *</label>
                            <input type="text" name="catatan_perbaikan" value="<?= $row->catatan_perbaikan ?>" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label>Foto Bukti (Jadikan 1 File PDF jika lebih dari 1foto) *</label>
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