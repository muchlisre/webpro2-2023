<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('buku_m','mbuku');
        $this->load->model('auth_model');

        if(!$this->auth_model->current_user()){
            redirect('auth/login');
        }
    }
    
    public function index()
    {
        $data['konten'] 	= "buku/daftarbuku";
		$data['judul']		= "Buku";
		
        $data['daftar_buku'] = $this->mbuku->daftar_buku();
        $data['test'] = "test";
        $this->load->view('layout/master', $data);
    }

    public function lihat($kode_buku){
        $data['buku']   = $this->mbuku->lihat($kode_buku);
        $this->load->view('buku/lihat', $data);
    }

    public function judul()
    {
        echo "Ini function judul()";
    }

    public function tambah()
    {
        $data['konten'] 	= "buku/tambah";//ini akan ada di view
		$data['judul']		= "Tambah Buku";
		
        //ambil data kategori dari database
        $data['kategori']   = $this->db->query("SELECT * FROM tkategori")->result();

        $this->load->view('layout/master', $data);
    }

    public function simpan(){
        //membuat kode buku berdasarkan kategri
        //ambil dari tbuku->kode_buku like prefix%
        //jika ada, makan nilai akhirnya ditambah 1
        //jika tidak nilai nya adalah 1 
       
        //ambil kode kategori
        $kategori       = $this->input->post('kategori');
        $kode_kategori  = $this->db->query("SELECT kode_kategori from tkategori where id_kategori=$kategori")->row();
        $kode_kat       = $kode_kategori->kode_kategori;
        $kode = $this->db->query("SELECT max(substring(kode_buku, -4))+1 as kode FROM `tbuku` WHERE kode_buku LIKE '$kode_kat%';
        ")->row();
        $kode_buku      = $kode_kategori->kode_kategori.'-'.sprintf("%04d", $kode->kode);;
        $judul          = $this->input->post('judul_buku');
        
        $sampul         = $this->input->post('sampul');
        // proses upload
        $upload  = $this->do_upload();
        if($upload['error']){
            $this->session->set_flashdata('simpan', 'gagal '.$upload['error']);
            redirect('buku');
        }
        
        //array untuk menampung data yang akan disimpan
        $data = array(
            'kode_buku'     => $kode_buku,
            'judul_buku'    => $judul,
            'kategori_buku' => $kategori,
            'cover_buku'    => $upload['file_name']
        );
        
        try {
            $simpan = $this->db->insert('tbuku', $data);
            if($simpan){
                //echo "Berhasil di simpan";
                $this->session->set_flashdata('simpan', 'sukses');
                redirect('buku');
            }else{
                $this->session->set_flashdata('simpan', 'gagal');
                redirect('buku');
            }
        } catch (\Throwable $th) {
            $this->session->set_flashdata('simpan', 'gagal');
            redirect('buku');
        }
        
    }

    public function edit($kode){
        $data['konten'] 	= "buku/edit";//ini akan ada di view
		$data['judul']		= "Edit Buku";

        //ambil data buku dari DB
        $this->db->select('*');
        $this->db->from('tbuku');
        $this->db->where('kode_buku', $kode);
        $buku = $this->db->get()->row();
        $data['buku'] = $buku;
        //ambil data kategori dari database
        $data['kategori']   = $this->db->query("SELECT * FROM tkategori")->result();
        
        $this->load->view('layout/master', $data);
    }

    public function simpan_edit(){
        $kode_buku      = $this->input->post('kode_buku');
        $judul          = $this->input->post('judul_buku');
        $kategori       = $this->input->post('kategori');

        if($_FILES['sampul']['name']){
            // proses upload
            $upload  = $this->do_upload();
            if($upload['error']){
                $this->session->set_flashdata('simpan', 'gagal '.$upload['error']);
                redirect('buku');
            }
            $data = array(
                'judul_buku'    => $judul,
                'kategori_buku' => $kategori,
                'cover_buku'=>$upload['file_name']);
        }else{
            $data = array(
                'judul_buku'    => $judul,
                'kategori_buku' => $kategori
            );
        }
        //array untuk menampung data yang akan disimpan
        
        $this->db->where('kode_buku', $kode_buku);
        $update = $this->db->update('tbuku', $data);
        if($update){
            //echo "Berhasil di simpan";
            $this->session->set_flashdata('edit', 'sukses');
            redirect('buku');
        }else{
            $this->session->set_flashdata('edit', 'gagal');
            redirect('buku');
        }
    }

    public function hapus($kode){
        $hapus = $this->db->delete('tbuku', array('kode_buku' => $kode));

        if($hapus){
            //echo "Berhasil di simpan";
            $this->session->set_flashdata('hapus', 'sukses');
            redirect('buku');
        }else{
            $this->session->set_flashdata('hapus', 'gagal');
            redirect('buku');
        }
    }

    public function do_upload(){
        $config['upload_path']      = './upload_data/';
        $config['allowed_types']    = 'jpg|png|jpeg';
        $config['max_size']         = 2048;
        $config['file_name']        = date("YmdHis").$this->input->post('judul_buku');

        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('sampul')){
            $error = $this->upload->display_errors();
            return $error;
        }else{
            $data = $this->upload->data();
            return $data;
        }
    }
 
}

/* End of file Buku.php */
