<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Sepatu_model extends CI_Model{

        public function data_sepatu()
        {
            $query = "SELECT `tsepatu`.*, `tmodel`.`nama_model`, `tmodel`.`kode_model`
             FROM `tmodel` INNER JOIN `tsepatu` 
            ON `tmodel`.`id_model` = `tsepatu`.`model_sepatu`";
            
            $datasepatu = $this->db->query($query);
            return $datasepatu->result();
        }

        public function lihat($kode_sepatu)
        {
            $this->db->where('kode_sepatu', $kode_sepatu);
            return $this->db->get('tsepatu')->row();
        }
        public function getUserById(Type $var = null)
        {
            return $this->db->get_where('user', ['id' => $id])->row_array();
        }

        public function data_user()
        {

            $datauser =   $this->db->query("SELECT * FROM user");
            return $datauser->result();
        }
        public function lihat_user($id)
        {
            $this->db->where('id', $id);
            return $this->db->get('user')->row();
        }
        
    }
    
?>