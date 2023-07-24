<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_m extends CI_Model {

    public function daftar_buku(){
        $query = "SELECT   `tbuku`.*,
        `tkategori`.`nama_kategori`,
        `tkategori`.`kode_kategori`
FROM     `tkategori` 
INNER JOIN `tbuku`  ON `tkategori`.`id_kategori` = `tbuku`.`kategori_buku` ";
        $databuku = $this->db->query($query);
        return $databuku->result();
    }

    public function lihat($kode_buku){
        $this->db->where('kode_buku',$kode_buku);
        return $this->db->get('tbuku')->row();
    }

}

/* End of file Buku_m.php */
