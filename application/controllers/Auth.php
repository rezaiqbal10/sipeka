<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{ 
    public function loginadmin()
    {
        check_already_login();
        $this->load->view('loginadmin');
    }
    public function loginuser()
    {
        check_already_login_user();
        $this->load->view('loginuser');
    }
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['loginadmin'])) {
            $this->load->model('m_user');
            $query = $this->m_user->loginadmin($post);
            ?>
                <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
                <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script> 
                <style>
                body{
                    font-family : "Helvetica Neue", Helvetica, Arial, sans-serif;
                    font-size   : 1.124em;
                    font-weight  : normal;
                }
                </style>
                <body></body>
            <?php 
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'userid' => $row->user_id,
                    'level' => $row->level
                );
                $this->session->set_userdata($params);
                ?>
                
                <script>

                Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Selamat Login Berhasil'
                        
                        }).then((result) => {
                            window.location='<?= site_url('dashboard') ?>';
                        })
                </script>
                <?php
            } else {
                ?>
                
                <script>

                Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Login gagal, Username atau Paswword salah!'
                        
                        }).then((result) => {
                            window.location='<?= site_url('auth/loginadmin') ?>';
                        })
                </script>
                <?php
            }
        }
    }
    public function process_user()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['loginuser'])) {
            $this->load->model('m_user');
            $query = $this->m_user->loginuser($post);
            ?>
            <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
            <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script> 
            <style>
            body{
                font-family : "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-size   : 1.124em;
                font-weight  : normal;
            }
            </style>
            <body></body>
        <?php 
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'userid' => $row->user_id,
                    'level' => $row->level
                );
                $this->session->set_userdata($params);
                ?>
                
                <script>

                Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Selamat Login Berhasil'
                        
                        }).then((result) => {
                            window.location='<?= site_url('data_kendaraan_user') ?>';
                        })
                </script>
                <?php
            } else {
                ?>
                
                <script>

                Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Login gagal, Username atau Paswword salah!'
                        
                        }).then((result) => {
                            window.location='<?= site_url('auth/loginuser') ?>';
                        })
                </script>
                <?php
            }
        }
    }
    public function logout()
    {
        $params = array('userid', 'level');
        $this->session->unset_userdata($params);
        redirect('auth/loginadmin');
    }
    public function logout_user()
    {
        $params = array('userid', 'level');
        $this->session->unset_userdata($params);
        redirect('auth/loginuser');
    }
}
