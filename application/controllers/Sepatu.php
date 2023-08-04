<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sepatu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sepatu_model', 'sepatu_m');
        $this->load->model('auth_model');

        if(!$this->auth_model->current_user()){
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['konten'] = "sepatu/data_sepatu";
        $data['judul'] = "Data Sepatu";

        $data['data_sepatu'] = $this->sepatu_m->data_sepatu();
        $this->load->view('layout/master', $data);
    }

    public function data_user(){
        $data['konten'] = "user/user";
        $data['judul']  = "Data User";

        $data['data_user'] = $this->sepatu_m->data_user();
        $this->load->view('layout/master', $data);
    }

    public function judul()
    {
        echo "judul";
    }

    public function lihat($kode_sepatu)
    {
        $data['konten'] = "sepatu/lihat";
        $data['judul'] = "Lihat Sepatu";

        $data['sepatu'] = $this->sepatu_m->lihat($kode_sepatu);
        $this->load->view('layout/master', $data);
    }

    public function tambah()
    {
        $data['konten'] = "sepatu/tambah";
        $data['judul'] = "Tambah Sepatu";

        $data['model_sepatu'] = $this->db->query("SELECT * FROM tmodel")->result();
        $this->load->view('layout/master', $data);
    }

    public function simpan()
    {
        $model = $this->input->post('model_sepatu');
        // mengambil kode model yang ada di database
        $kode_model = $this->db->query("SELECT kode_model FROM tmodel WHERE id_model=$model")->row();
        // membuat variable untuk kode_model yang ada di database
        $model_kode = $kode_model->kode_model;
        $kode = $this->db->query("SELECT max(substring(kode_sepatu, -3))+1 as kode FROM tsepatu WHERE kode_sepatu LIKE '$model_kode%';")->row();

        $kode_sepatu = $model_kode . '-' . sprintf("%03d", $kode->kode);
        $merek = $this->input->post('merek_sepatu');
        $ukuran = $this->input->post('ukuran_sepatu');
        $jumlah = $this->input->post('jumlah_sepatu');
        $design = $this->input->post('design_sepatu');

        // proses upload
        $upload = $this->do_upload();
        if ($upload['error']) {
            $this->session->set_flashdata('status', 'sukses' . $upload['error']);
            redirect('sepatu');
        }

        $data = array(
            'kode_sepatu' => $kode_sepatu,
            'merek_sepatu' => $merek,
            'model_sepatu' => $model,
            'ukuran_sepatu' => $ukuran,
            'jumlah_sepatu' => $jumlah,
            'design_sepatu' => $upload['file_name']
        );

        $simpan = $this->db->insert('tsepatu', $data);
        if ($simpan) {
            // echo "Berhasil disimpan";
            $this->session->set_flashdata('status', 'sukses');
            redirect('sepatu');
        } else {
            $this->session->set_flashdata('status', 'gagal');
            redirect('sepatu');
        };
    }

    public function edit($kode)
    {
        $data['konten'] = "sepatu/edit";
        $data['judul'] = "Edit Sepatu";

        $this->db->select('*');
        $this->db->from('tsepatu');
        $this->db->where('kode_sepatu', $kode);
        $sepatu = $this->db->get()->row();
        $data['sepatu'] = $sepatu;

        $data['model_sepatu'] = $this->db->query("SELECT * FROM tmodel")->result();
        $this->load->view('layout/master', $data);
    }

    public function simpan_edit()
    {
        $kode_sepatu = $this->input->post('kode_sepatu');
        $merek = $this->input->post('merek_sepatu');
        $ukuran = $this->input->post('ukuran_sepatu');
        $jumlah = $this->input->post('jumlah_sepatu');
        $model = $this->input->post('model_sepatu');
       
        if ($_FILES['design_sepatu']['name']) {
            $upload = $this->do_upload();
            if ($upload['error']) {
                $this->session->set_flashdata('update', 'gagal' . $upload['error']);
                redirect('sepatu');
            } 
            $data = array(
                'kode_sepatu'  => $kode_sepatu,
                'merek_sepatu' => $merek,
                'model_sepatu' => $model,
                'ukuran_sepatu' => $ukuran,
                'jumlah_sepatu' => $jumlah,
                'design_sepatu' => $upload['file_name']
            );
        } else {
            $data = array(
                'kode_sepatu' => $kode_sepatu,
                'merek_sepatu' => $merek,
                'model_sepatu' => $model,
                'ukuran_sepatu' => $ukuran,
                'jumlah_sepatu' => $jumlah
            );
        }

        $this->db->where('kode_sepatu', $kode_sepatu);

        $update = $this->db->update('tsepatu', $data);
        if ($update) {
            // echo "Berhasil disimpan";
            $this->session->set_flashdata('update', 'sukses');
            redirect('sepatu');
        } else {
            $this->session->set_flashdata('update', 'gagal');
            redirect('sepatu');
        };
    }

    public function hapus($kode)
    {
        $hapus = $this->db->delete('tsepatu', array('kode_sepatu' => $kode));

        if ($hapus) {
            // echo "Berhasil disimpan";
            $this->session->set_flashdata('delete', 'sukses');
            redirect('sepatu');
        } else {
            $this->session->set_flashdata('delete', 'gagal');
            redirect('sepatu');
        };
    }

    public function do_upload()
    {
        $config['upload_path'] = './upload_data/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        $config['file_name'] = date("YmdHis") . $this->input->post('merek_sepatu');

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('design_sepatu')) {
            $error = $this->upload->display_errors();
            return ['error' => $error];
        } else {
            $data = $this->upload->data();
            return ['file_name' => $data['file_name']];
        }
    }
    public function tambah_user()
    {
        $data['konten'] = "user/tambah";
        $data['judul'] = "Tambah User";

        $this->load->view('layout/master', $data);
    }
    
    public function simpan_user()
    {
        $nama   = $this->input->post('name');
        $email  = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $avatar = $this->input->post('avatar');


        $data = array(
            'name'  => $nama,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'avatar'   => $avatar
        );
        $simpan_user = $this->db->insert('user', $data);
        if ($simpan_user) {
            // echo "Berhasil disimpan";
            $this->session->set_flashdata('status', 'sukses');
            redirect('sepatu');
        } else {
            $this->session->set_flashdata('status', 'gagal');
            redirect('sepatu');
        };
    }

    public function edit_user($id)
    {
        $data['konten'] = "user/edit";
        $data['judul'] = "Edit User";

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        $user = $this->db->get()->row();

        $data['user'] = $user;

        $this->load->view('layout/master', $data);
    }

    public function update_user()
    {       
        $id = $this->input->post('id');
        $nama   = $this->input->post('name');
        $email  = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $avatar = $this->input->post('avatar');
        
        
        $data = array(
            'id' => $id,
            'name'  => $nama,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'avatar'   => $avatar
        );
        $this->db->where('id', $id);
        
        $update_user = $this->db->update('user', $data);
        if ($update_user) {
            // echo "Berhasil disimpan";
            $this->session->set_flashdata('update', 'sukses');
            redirect('sepatu');
        } else {
            $this->session->set_flashdata('update', 'gagal');
            redirect('sepatu');
        };
    }
    public function hapus_user($id)
    {
        $hapus = $this->db->delete('user', array('id' => $id));

        if ($hapus) {
            // echo "Berhasil disimpan";
            $this->session->set_flashdata('delete', 'sukses');
            redirect('sepatu');
        } else {
            $this->session->set_flashdata('delete', 'gagal');
            redirect('sepatu');
        };
    }
    public function lihat_user($id)
    {
        $data['konten'] = "user/lihat";
        $data['judul'] = "Lihat user";

        $data['user'] = $this->sepatu_m->lihat_user($id);
        $this->load->view('layout/master', $data);
    }

    

}
