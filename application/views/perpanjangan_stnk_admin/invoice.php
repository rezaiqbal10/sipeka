<section class="content-header">
    <h1>
        Data 
        <small>Invoice perpanjangan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Invoice perpanjangan</li>
    </ol>
</section>
 
<!-- Main content -->
<section class="content">
<div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Invoice perpanjangan</h3>
            <div class="pull-right">
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Invoice</th>
                        <th>Tanggal Invoice</th>    
                        <th>Penyedia Jasa</th>
                        <th>Status Invoice</th>
                        <th>Nilai Invoice</th>
                        <th>Action</th>
                    </tr> 
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr><td><?= $no++; ?></td>
                            <td><?= $data->kode_invoice_perpanjangan; ?></td>
                            <td><?= $data->tanggal_invoice; ?></td>
                            
                            <td><?= $data->penyedia_jasa_id == 1 ?"AHASS Motor" : "Samsat Online"; ?></td>
                            <td>
                            <?php   if($data->status_invoice == '0'){
                                        echo '<span class="label label-warning">Belum Dibayar</span>';
                                    } else if($data->status_invoice == '1') {
                                        echo '<span class="label label-success">Selesai</span>';
                                    } else if($data->status_invoice == '2'){
                                        echo '<span class="label label-danger">Ditolak</span>';
                                    }
                            ?>
                            
                            </td>
                            <td><?= $data->nilai_invoice; ?></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
<!-- 
                <tr>
                    <td colspan="4" rowspan="2" style="padding: 25px;">Jumlah</td>
                    <td>SUM Invoice</td>
                    <td>
                        <span class="btn-sm badge->info"></span>
                    </td>
                    <td></td>
                   
                </tr>
                <tr>
                    <td>Count Invoice</td>
                    <td>
                        <span class="btn-sm badge->info"></span>
                    </td>
                    <td></td>
                </tr> -->
            </table>
        </div>
    </div>

</section>
<!-- /.content -->