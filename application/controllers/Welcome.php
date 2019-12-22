<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->model("pengguna_model");
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login()
	{
		$this->form_validation->set_rules('username','username','required|');
		$this->form_validation->set_rules('password','password','required|');
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$pengguna=$this->db->get_where('pengguna',['username'=>$username])->row_array();

		if ($pengguna){
				if ($password==$pengguna['password']) {
					$data=[
					'username'=>$pengguna['username'],
					'idpengguna'=>$pengguna['idpengguna'],
					'jenispengguna'=>$pengguna['jenispengguna']
					];
					if ($pengguna['idpengguna']==1) {
						$this->session->set_userdata($data);
						redirect('Pelayan');
					}elseif ($pengguna['jenispengguna']==2) {
						$this->session->set_userdata($data);
						redirect('Kasir');
					}
				}else{
				echo "Password Salah";
				}
		 }else{
		 echo $username
		 ;
	}
	}
	}
