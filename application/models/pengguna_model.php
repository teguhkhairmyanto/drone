<?php defined('BASEPATH') OR exit('No direct script access allowed');

class pengguna_model extends CI_Model
{
    private $_table = "pengguna";

    public $idpengguna;
    public $username;
    public $password;
    public $jenispengguna;
}