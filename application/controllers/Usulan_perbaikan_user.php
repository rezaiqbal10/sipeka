<?php
defined('BASEPATH') or exit('No direct script access allowed');

//tanpa form validation
class usulan_perbaikan_user extends CI_Controller
{   
    function __construct()
    {
        parent::__construct();
        check_not_login();
        // check_not_login_user();
        $this->load->model(['m_usulan_perbaikan_user','m_user','m_data_kendaraan_admin']);
    }
    public function index()
    {
        $data['row'] = $this->m_usulan_perbaikan_user->get();
        $this->template->load('template_user', 'usulan_perbaikan_user/data', $data);
    }
    public function add()
    {
        
        $usulan_perbaikan = new stdClass();
        // $kode_urut = substr(1,5);
        // $Kode_urut_sekarang = $kode_urut + 1; 
        $usulan_perbaikan->usulan_perbaikan_id = null;
        $usulan_perbaikan->kode_usulan  = 'BBWSPJ-SMG/'.'Usulan-Perbaikan/'.date('d-m-y').'/'.substr(str_shuffle("0123456789"),0,9);
        $usulan_perbaikan->tanggal_usulan = null;
        $usulan_perbaikan->nomor_polisi = null;
        $usulan_perbaikan->pemegang_kendaraan = null;
        $usulan_perbaikan->jenis_perbaikan = null;
        $usulan_perbaikan->status_perbaikan = null;
        $usulan_perbaikan->service_rutin = null;
        $usulan_perbaikan->catatan_perbaikan = null;
        $usulan_perbaikan->nama_atasan = null;
        $usulan_perbaikan->foto = null;

        $data_kendaraan = $this->m_data_kendaraan_admin->get();
        $data = array(
            'page' => 'add',
            'row' => $usulan_perbaikan,
            'data_kendaraan' => $data_kendaraan

        );
        $this->template->load('template_user', 'usulan_perbaikan_user/usulan_perbaikan_form', $data);
    }
    public function edit($id)
    {
        $query = $this->m_usulan_perbaikan_user->get($id);
        $data_kendaraan = $this->m_data_kendaraan_admin->get();
        if ($query->num_rows() > 0) {
            $usulan_perbaikan = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $usulan_perbaikan,
                'data_kendaraan' => $data_kendaraan
            );
            $this->template->load('template_user', 'usulan_perbaikan_user/usulan_perbaikan_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('usulan_perbaikan_user') . "';</script>";
        }
    } 
    public function process()
    {
        $config['upload_path']       = './uploads/usulan perbaikan/';
        $config['allowed_types']     = 'gif|jpeg|jpg|pdf|png';
        $config['max_size']          = '2048';
        $config['file_name']          = 'usulan-perbaikan-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if($this->m_usulan_perbaikan_user->check_kode($post['kode_usulan'])-> num_rows() > 0) {
                $this->session->set_flashdata('error', "Kode Usulan $post[kode_usulan] sudah dipakai");
                redirect('usulan_perbaikan_user/add');
            } else {
                if(@$_FILES['foto']['name'] != null){

                    if($this->upload->do_upload('foto')) {
                        $post['foto'] = $this->upload->data('file_name');
                        $this->m_usulan_perbaikan_user->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('usulan_perbaikan_user');
                    }else{
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('usulan_perbaikan_user/add');
                    }               
                }
                else {
                    $post['foto'] = null;
                    $this->m_usulan_perbaikan_user->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('usulan_perbaikan_user');
                }
            }
        } else  if(isset($_POST['edit'])) {
                    if($this->m_usulan_perbaikan_user->check_kode($post['kode_usulan'], $post['id'])-> num_rows() > 0) {
                        $this->session->set_flashdata('error', "Kode Usulan $post[kode_usulan] sudah dipakai");
                         redirect('usulan_perbaikan_user/edit/'.$post['id']);
            } else {
                if(@$_FILES['foto']['name'] != null){

                    $usulan_perbaikan = $this->m_usulan_perbaikan_user->get($post['id'])->row();
                    if($usulan_perbaikan->foto != null ){
                        $target_file = './uploads/usulan perbaikan/'.$usulan_perbaikan->foto ;
                        unlink($target_file);
                    }
                    if($this->upload->do_upload('foto')) {
                        $post['foto'] = $this->upload->data('file_name');
                        $this->m_usulan_perbaikan_user->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('usulan_perbaikan_user');
                    }else{
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('usulan_perbaikan_user/add');
                    }               
                }
                else {
                    $post['foto'] = null;
                    $this->m_usulan_perbaikan_user->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('usulan_perbaikan_user');
                }
            } 
        } 
    }
    public function delete($id)
    {
        $usulan_perbaikan = $this->m_usulan_perbaikan_user->get($id)->row();
        if($usulan_perbaikan->foto != null ){
        $target_file = './uploads/usulan perbaikan/'.$usulan_perbaikan->foto ;
        unlink($target_file);
    }
        $this->m_usulan_perbaikan_user->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('usulan_perbaikan_user');
    }
}