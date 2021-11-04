<section class="content-header">
	<h1>
		Dashboard
		<small>Control Panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
				<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $this->fungsi->count_data_kendaraan() ?></h3>

              <p>Data Kendaraan</p>
            </div>
            <div class="icon">
              <i class="ion ion-model-s"></i>
            </div>
            <a href="<?= site_url('data_kendaraan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $this->fungsi->count_usulan_perbaikan() ?><sup style="font-size: 20px"></sup></h3>

              <p>Usulan Perbaikan</p>
            </div>
            <div class="icon">
              <i class="ion ion-wrench"></i>
            </div>
            <a href="<?= site_url('usulan_perbaikan_admin') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $this->fungsi->count_perpanjangan_stnk() ?></h3>

              <p>Perpanjangan</p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
            <a href="<?= site_url('perpanjangan_stnk_admin') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $this->fungsi->count_kwitansi_perbaikan() ?></h3>

              <p>Kwitansi Perbaikan</p>
            </div>
            <div class="icon">
              <i class="ion ion-card"></i>
            </div>
            <a href="<?= site_url('kwitansi_perbaikan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $this->fungsi->count_kwitansi_perpanjangan() ?></h3>

              <p>Kwitansi Perpanjangan</p>
            </div>
            <div class="icon">
              <i class="ion ion-card"></i>
            </div>
            <a href="<?= site_url('kwitansi_perpanjangan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
	  
</section>
<!-- /.content -->