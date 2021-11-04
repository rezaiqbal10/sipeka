<section class="content-header">
    <h1> 
        Tambah
        <small>Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Data kendaraan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Data kendaraan</h3>
            <div class="pull-right">
                <a href="<?= site_url('data_kendaraan') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> Kembali</i>
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <form action="<?= site_url('data_kendaraan/process') ?>" method="post">
                        <div class="form-group ">
                            <label for="merk_kendaraan">Merk *</label>
                            <input type="hidden" name="id"  value="<?= $row->data_kendaraan_id ?>">
                            <input type="text" name="merk_kendaraan" id="merk_kendaraan" value="<?= $row->merk_kendaraan ?>" class="form-control" required>
                        </div>
                        
                        <div class="form-group ">
                            <label>Seri kendaraan *</label>
                            <input type="text" name="seri_kendaraan" value="<?= $row->seri_kendaraan ?>" class="form-control" required>
                        </div>   
                        <div class="form-group">
                            <label>Jenis Kendaraan *</label>
                            <select name="jenis_kendaraan" value="<?= $row->jenis_kendaraan ?>" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="1" > Motor </option>
                                <option value="2" > Mobil </option>
                                <option value="3" > Bus </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Nomor Polisi *</label>
                            <select name="nomor_p" class="form-control">
                            <option value="">- Pilih -</option>
                            <?php foreach($user->result() as $key => $data) { ?>
                                <option value="<?= $data->user_id?>" ><?=$data->nomor_p?></option>
                                <!--?=$data->user_id == $row->user_id ? "selected" : null ?-->
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Pemegang Kendaraan *</label>
                            <!-- <select name="name" class="form-control">
                            <option value="">- Pilih -</option>
                            <?php foreach($user->result() as $key => $data) { ?>
                                <option value="<?= $data->user_id?>"><?=$data->name?></option>         
                            <?php } ?>
                            </select> -->
                            <?php echo form_dropdown('name_user', $name_user, $selectname, ['class' => 'form-control', 'required' => 'required'] ) ;?>
                        </div>
                        <div class="form-group ">
                            <label>Warna *</label>
                            <input type="text" name="warna_kendaraan" value="<?= $row->warna_kendaraan ?>" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label>No bmn *</label>
                            <input type="text" name="nomor_bmn" value="<?= $row->nomor_bmn ?>" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label>No stnk *</label>
                            <input type="text" name="nomor_stnk" value="<?= $row->nomor_stnk ?>" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label>No rangka *</label>
                            <input type="text" name="nomor_rangka" value="<?= $row->nomor_rangka ?>" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label>Tahun pembuatan *</label>
                            <input type="date" name="tahun_pembuatan" value="<?= $row->tahun_pembuatan ?>" class="form-control" required>
                        </div> 
                        <div class="form-group ">
                            <label>Kondisi kendaraan *</label>
                            <input type="text" name="kondisi_kendaraan" value="<?= $row->kondisi_kendaraan ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis BBM *</label>
                            <select name="jenis_bbm" value="<?= $row->jenis_bbm ?>" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <option value="1" > Pertamax </option>
                                <option value="2" > Pertamax Turbo </option>
                                <option value="3" > Pertalite </option>
                                <option value="4" > Premium </option>
                                <option value="5" > Solar </option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label>NUP *</label>
                            <input type="text" name="nup" value="<?= $row->nup ?>" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label>NO BPKB *</label>
                            <input type="text" name="nomor_bpkb" value="<?= $row->nomor_bpkb ?>" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label>No mesin *</label>
                            <input type="text" name="nomor_mesin" value="<?= $row->nomor_mesin ?>" class="form-control" required>
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