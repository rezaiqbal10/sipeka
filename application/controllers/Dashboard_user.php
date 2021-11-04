<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_user extends CI_Controller
{


    public function index()
    {
        check_not_login_user();
        $this->template_user->load('template_user', 'dashboard_user');
    }
}
