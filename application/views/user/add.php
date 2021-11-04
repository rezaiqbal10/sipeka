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
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Data User</h3>
            <div class="pull-right">
                <a href="<?= site_url('user') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> Kembali</i>
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <form action="" method="post">
                        <div class="form-group <?= form_error('fullname') ? 'has-error' : null ?>">
                            <label>Nama *</label>
                            <input type="text" name="fullname" value="<?= set_value('fullname') ?>" class="form-control">
                            <?= form_error('fullname') ?>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                            <label>Username *</label>
                            <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control">
                            <?= form_error('username') ?>
                        </div>
                        <div class="form-group <?= form_error('nomor_p') ? 'has-error' : null ?>">
                            <label>Nomor Polisi *</label>
                            <input type="text" name="nomor_p" value="<?= set_value('nomor_p') ?>" class="form-control">
                            <?= form_error('nomor_p') ?>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                            <label>Password *</label>
                            <input type="password" name="password" class="form-control">
                            <?= form_error('password') ?>
                        </div>
                        <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                            <label>Password Confirmation *</label>
                            <input type="password" name="passconf" class="form-control">
                            <?= form_error('passconf') ?>
                        </div>
                        <div class="form-group">
                            <label>Address *</label>
                            <textarea name="address" class="form-control"><?= set_value('address') ?></textarea>
                        </div>
                        <div class="form-group <?= form_error('npp') ? 'has-error' : null ?>">
                            <label>NPP *</label>
                            <input type="text" name="npp" value="<?= set_value('npp') ?>" class="form-control">
                            <?= form_error('npp') ?>
                        </div>
                        <div class="form-group <?= set_value('level') ? 'has-error' : null ?>">
                            <label>Level *</label>
                            <select name="level" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="1" <?= set_value('level') == 1 ? 'selected' : null ?>> Admin </option>
                                <option value="2" <?= set_value('level') == 2 ? 'selected' : null ?>> User </option>
                            </select>
                            <?= form_error('level') ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">
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