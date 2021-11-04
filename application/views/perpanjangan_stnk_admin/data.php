<section class="content-header">
    <h1>
        Data 
        <small>Kendaraan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Perpanjangan STNK/BPKB</li>
    </ol>
</section>
 
<!-- Main content -->
<section class="content">
<div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Perpanjangan STNK/BPKB</h3>
            
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Polisi</th>
                        <th>Tanggal perpanjangan</th>
                        <th>Kode perpanjangan</th>
                        <th>Pemegang Kendaraan</th>
                        <th>Jenis Perpanjangan</th>
                        <th>Status Perpanjangan</th>
                        <th>Action</th>
                    </tr> 
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data->nomor_polisi; ?></td>
                            <td><?= $data->tanggal_perpanjangan; ?></td>
                            <td><?= $data->kode_perpanjangan; ?></td>
                            <td><?= $data->pemegang_kendaraan; ?></td>
                            <td><?= $data->jenis_perpanjangan == 1 ? "STNK" : "BPKB" ; ?> </td>
                            <td>
                            <?php   if($data->status_perpanjangan == '0'){
                                        echo '<span class="label label-warning">Proses</span>';
                                    } else if($data->status_perpanjangan == '1') {
                                        echo '<span class="label label-success">Selesai</span>';
                                    } else if($data->status_perpanjangan == '2'){
                                        echo '<span class="label label-danger">Ditolak</span>';
                                    }
                            ?>       
                            </td>
                            <td class="text-center" width="200x"> 
                            <input type="hidden" name="perpanjangan_stnk_id" value="<?= $data->perpanjangan_stnk_id ?>">
                            <a href="<?= site_url('perpanjangan_stnk_admin/edit/' . $data->perpanjangan_stnk_id) ?>"class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil">Konfirmasi Status</i>
                            </a>
                                    <a href="<?= site_url('perpanjangan_stnk_admin/invoice/' . $data->perpanjangan_stnk_id) ?>"class="btn btn-success btn-xs">
                                        <i value ="<?= $data->status_perpanjangan == '0'?>" class="fa fa-pencil"> Invoice</i>
                                    </a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                 </tbody>
            </table>
        </div>
    </div>

</section>
<!-- /.content -->