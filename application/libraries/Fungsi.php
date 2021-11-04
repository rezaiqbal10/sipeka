<?php
class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }
    function user_login()
    {
        $this->ci->load->model('m_user');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->m_user->get($user_id)->row();
        return $user_data;
    }
    public function count_data_kendaraan()
    {
        $this->ci->load->model('m_data_kendaraan_admin');
        return $this->ci->m_data_kendaraan_admin->get()->num_rows();

    }
    public function count_usulan_perbaikan()
    {
        $this->ci->load->model('m_usulan_perbaikan_user');
        return $this->ci->m_usulan_perbaikan_user->get()->num_rows();

    }
    public function count_perpanjangan_stnk()
    {
        $this->ci->load->model('m_perpanjangan_stnk_user');
        return $this->ci->m_perpanjangan_stnk_user->get()->num_rows();

    }
    public function count_kwitansi_perbaikan()
    {
        $this->ci->load->model('m_kwitansi_perbaikan');
        return $this->ci->m_kwitansi_perbaikan->get()->num_rows();

    }
    public function count_kwitansi_perpanjangan()
    {
        $this->ci->load->model('m_kwitansi_perpanjangan');
        return $this->ci->m_kwitansi_perpanjangan->get()->num_rows();

    }
}
