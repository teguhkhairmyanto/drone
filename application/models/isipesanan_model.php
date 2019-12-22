<?php defined('BASEPATH') OR exit('No direct script access allowed');

class isipesanan_model extends CI_Model
{
    private $_table = "isipesanan";

    public $idisipesanan;
    public $idpesanan;
    public $idmenu;

    public function simpanisipesanan($data,$table){
    	 $this->db->insert($table,$data);
    }

    public function hapusisipesanan($where,$table){
    	 $this->db->where('idisipesanan',$where);
        $this->db->delete($table);
    }
}