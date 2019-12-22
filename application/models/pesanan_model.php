<?php defined('BASEPATH') OR exit('No direct script access allowed');

class pesanan_model extends CI_Model
{
    private $_table = "pesanan";

    public $idpesanan;
    public $idpengguna;
    public $nomormeja;
    public $statuspesanan;

    public function simpanpesanan($data,$table){
    	 $this->db->insert($table,$data);
    }

    public function daftarpesananaktif() {
		return $this->db->query('SELECT * FROM pesanan');
	}

	public function Nonaktifkan ($where,$data,$table)
    {
        $this->db->where('idpesanan',$where);
        $this->db->update($table,$data);
    }

    public function simpanperubahan ($where,$data,$table)
    {
        $this->db->where('idpesanan',$where);
        $this->db->update($table,$data);
    }
}