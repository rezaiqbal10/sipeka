<?php
class Fungsi_user
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }
    function user_login_user()
    {
        $this->ci->load->model('m_login_user');
        $dk_admin_id = $this->ci->session->userdata('dkadminid');
        $user_data = $this->ci->m_login_user->get($dk_admin_id)->row();
        return $user_data;
    }
    function f_dk_admin()
    {
        $this->ci->load->model('m_login_user');
        $dk_admin_id = $this->ci->session->userdata('dk_adminid');
        $user_data = $this->ci->m_login_user->get($dk_admin_id)->row();
        return $user_data;
    }
}
