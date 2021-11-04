<!-- <?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_kendaraan extends CI_Controller
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

        $this->template->load('template', 'data_kendaraan/data', $data);
    }
    public function add()
    {
        $this->form_validation->set_rules('nopol', 'Nopol', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
        $this->form_validation->set_rules('no_bmn', 'No_bmn', 'required');
        $this->form_validation->set_rules('no_stnk', 'No_stnk', 'required');
        $this->form_validation->set_rules('no_rangka', 'No_rangka', 'required');
        $this->form_validation->set_rules('tahun_pembuatan', 'Tahun_pembuatan', 'required');
        $this->form_validation->set_rules('kondisi_kendaraan', 'Kondisi_kendaraan', 'required');
        $this->form_validation->set_rules('pemegang_kendaraan', 'Pemegang_kendaraan', 'required');
        $this->form_validation->set_rules('jenis_kendaraan', 'Jenis_kendaraan', 'required');
        $this->form_validation->set_rules('seri_kendaraan', 'Seri_kendaraan', 'required');
        $this->form_validation->set_rules('bbm', 'Bbm', 'required');
        $this->form_validation->set_rules('nup', 'Nup', 'required');
        $this->form_validation->set_rules('no_bpkb', 'No_bpkb', 'required');
        $this->form_validation->set_rules('no_mesin', 'No_mesin', 'required');


        $this->form_validation->set_message('required', '%s masih kosong, Silahkan diisi');


        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'data_kendaraan/add');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->m_data_kendaraan_admin->add($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil disimpan');</script>";
            }
            echo "<script>window.location='" . site_url('data_kendaraan') . "';</script>";
        }
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('nopol', 'Nopol', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
        $this->form_validation->set_rules('no_bmn', 'No_bmn', 'required');
        $this->form_validation->set_rules('no_stnk', 'No_stnk', 'required');
        $this->form_validation->set_rules('no_rangka', 'No_rangka', 'required');
        $this->form_validation->set_rules('tahun_pembuatan', 'Tahun_pembuatan', 'required');
        $this->form_validation->set_rules('kondisi_kendaraan', 'Kondisi_kendaraan', 'required');
        $this->form_validation->set_rules('pemegang_kendaraan', 'Pemegang_kendaraan', 'required');
        $this->form_validation->set_rules('jenis_kendaraan', 'Jenis_kendaraan', 'required');
        $this->form_validation->set_rules('seri_kendaraan', 'Seri_kendaraan', 'required');
        $this->form_validation->set_rules('bbm', 'Bbm', 'required');
        $this->form_validation->set_rules('nup', 'Nup', 'required');
        $this->form_validation->set_rules('no_bpkb', 'No_bpkb', 'required');
        $this->form_validation->set_rules('no_mesin', 'No_mesin', 'required');


        $this->form_validation->set_message('required', '%s masih kosong, Silahkan diisi');


        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {

            $query = $this->m_data_kendaraan_admin->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'data_kendaraan/edit', $data);
            } else {
                echo "<script>alert('Data tidak ditemukan');";
                echo "window.location='" . site_url('data_kendaraan') . "';</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->m_data_kendaraan_admin->edit($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil disimp
                an');</script>";
            }
            echo "<script>window.location='" . site_url('data_kendaraan') . "';</script>";
        }
    }
    public function delete()
    {
        $id = $this->input->post('dk_admin_id');
        $this->m_data_kendaraan_admin->delete($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('data_kendaraan') . "';</script>";
    }
} -->
