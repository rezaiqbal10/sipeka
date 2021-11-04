<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
    <style>
    .swal2-popup{
        font-size: 1.6rem !important;
    }
    
    </style>


<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script>
    var flash = $('#flash').data('flash');
    if(flash){
        Swal.fire({
        icon: 'Success',
        title: 'Succes',
        text: flash
        
        })
    }
    </script>

    <div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>