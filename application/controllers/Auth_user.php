<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_user extends CI_Controller
{ 
    public function loginuser()
    {
        check_already_login_user();
        $this->load->view('loginuser');
    }
    public function process_user()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['loginuser'])) {
            $this->load->model('m_login_user');
            $query = $this->m_login_user->loginuser($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'userid' => $row->user_id,
                    'level' => $row->level
                );
                $this->session->set_userdata($params);
                echo "<script>
                alert('Selamat , login berhasil');
                window.location='" . site_url('data_kendaraan_user') . "';
                </script>";
            } else {
                echo "<script>alert('Login gagal, username atau password salah');
                window.location='" . site_url('auth_user/loginuser') . "';
                </script>";
            }
        }
    }
    public function logout()
    {
        $params = array('userid', 'level');
        $this->session->unset_userdata($params);
        redirect('auth_user/loginuser');
    }
}
