<?php defined('BASEPATH') OR exit('No direct script access allowed');

class menu_model extends CI_Model
{
    private $_table = "menu";

    public $idmenu;
    public $namamenu;
    public $hargamenu;
    public $gambarmenu;
    public $statusmenu;

    public function simpanmenu($data,$table){
    	 $this->db->insert($table,$data);
    }

    public function daftarmenu() {
		return $this->db->query('SELECT * FROM menu');
	}
}