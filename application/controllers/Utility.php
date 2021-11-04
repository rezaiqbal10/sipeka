<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utility extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('m_data_kendaraan_admin');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['row'] = $this->m_data_kendaraan_admin->get();

        $this->template->load('template', 'utility/data', $data);
    }
}
