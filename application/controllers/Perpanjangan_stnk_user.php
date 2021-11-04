<?php
defined('BASEPATH') or exit('No direct script access allowed');

//tanpa form validation
class Perpanjangan_stnk_user extends CI_Controller
{   
    function __construct()
    {
        parent::__construct();
        check_not_login();
        // check_not_login_user();
        $this->load->model(['m_perpanjangan_stnk_user','m_penyedia_jasa']);
    }
    public function index()
    {
        $data['row'] = $this->m_perpanjangan_stnk_user->get();
        $this->template->load('template_user', 'perpanjangan_stnk_user/data', $data);
    }
    public function add()
    {
        
        $perpanjangan_stnk = new stdClass();
        // $kode_urut = substr(1,5);
        // $Kode_urut_sekarang = $kode_urut + 1; 
        $perpanjangan_stnk->perpanjangan_stnk_id = null;
        $perpanjangan_stnk->kode_perpanjangan  = 'BBWSPJ-SMG/'.'Perpanjangan/'.date('d-m-y').'/'.substr(str_shuffle("0123456789"),0,9);
        $perpanjangan_stnk->tanggal_perpanjangan = null;
        $perpanjangan_stnk->nomor_polisi = null;
        $perpanjangan_stnk->pemegang_kendaraan = null;
        $perpanjangan_stnk->jenis_perpanjangan = null;
        // $perpanjangan_stnk->status_perpanjangan = 0;
        $perpanjangan_stnk->foto = null;

        $data = array(
            'page' => 'add',
            'row' => $perpanjangan_stnk

        );
        $this->template->load('template_user', 'perpanjangan_stnk_user/perpanjangan_stnk_form', $data);
    }
    public function edit($id)
    {
        $query = $this->m_perpanjangan_stnk_user->get($id);
        if ($query->num_rows() > 0) {
            $perpanjangan_stnk = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $perpanjangan_stnk
            );
            $this->template->load('template_user', 'perpanjangan_stnk_user/perpanjangan_stnk_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('perpanjangan_stnk_user') . "';</script>";
        }
    } 
    public function process()
    {
        $config['upload_path']       = './uploads/perpanjangan/';
        $config['allowed_types']     = 'gif|jpeg|jpg|pdf|png';
        $config['max_size']          = '2048';
        $config['file_name']          = 'perpanjangan-stnk/bpkb-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if($this->m_perpanjangan_stnk_user->check_kode($post['kode_perpanjangan'])-> num_rows() > 0) {
                $this->session->set_flashdata('error', "Kode perpanjangan $post[kode_perpanjangan] sudah dipakai");
                redirect('perpanjangan_stnk_user/add');
            } else {
                if(@$_FILES['foto']['name'] != null){

                    if($this->upload->do_upload('foto')) {
                        $post['foto'] = $this->upload->data('file_name');
                        $this->m_perpanjangan_stnk_user->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('perpanjangan_stnk_user');
                    }else{
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('perpanjangan_stnk_user/add');
                    }               
                }
                else {
                    $post['foto'] = null;
                    $this->m_perpanjangan_stnk_user->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('perpanjangan_stnk_user');
                }
            }
        } else  if(isset($_POST['edit'])) {
                    if($this->m_perpanjangan_stnk_user->check_kode($post['kode_perpanjangan'], $post['id'])-> num_rows() > 0) {
                        $this->session->set_flashdata('error', "Kode perpanjangan $post[kode_perpanjangan] sudah dipakai");
                         redirect('perpanjangan_stnk_user/edit/'.$post['id']);
            } else {
                if(@$_FILES['foto']['name'] != null){

                    $perpanjangan_stnk = $this->m_perpanjangan_stnk_user->get($post['id'])->row();
                    if($perpanjangan_stnk->foto != null ){
                        $target_file = './uploads/perpanjangan/'.$perpanjangan_stnk->foto ;
                        unlink($target_file);
                    }
                    if($this->upload->do_upload('foto')) {
                        $post['foto'] = $this->upload->data('file_name');
                        $this->m_perpanjangan_stnk_user->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('perpanjangan_stnk_user');
                    }else{
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('perpanjangan_stnk_user/add');
                    }               
                }
                else {
                    $post['foto'] = null;
                    $this->m_perpanjangan_stnk_user->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('perpanjangan_stnk_user');
                }
            } 
        }
    } 
    public function delete($id)
    {
        $perpanjangan_stnk = $this->m_perpanjangan_stnk_user->get($id)->row();
        if($perpanjangan_stnk->foto != null ){
        $target_file = './uploads/perpanjangan stnk/'.$perpanjangan_stnk->foto ;
        unlink($target_file);
    }
        $this->m_perpanjangan_stnk_user->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('perpanjangan_stnk_user');
    }
}