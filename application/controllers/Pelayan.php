<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

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
    if (!$this->session->userdata('idpengguna')) {
        redirect('Welcome','refresh');
	}else{
		if ($this->session->userdata('jenispengguna')!=="1") {
			 redirect('/Welcome','refresh');
		}
	$this->load->model("aktivitas_model");
	$this->load->model("isipesanan_model");
	$this->load->model("jenispengguna_model");
	$this->load->model("menu_model");
	$this->load->model("pengguna_model");
	$this->load->model("pesanan_model");
	}
}


	public function index()
	{
		$dataindex['datapenggunausername']=$this->session->userdata('username');
		$dataindex['datapenggunaidpengguna']=$this->session->userdata('idpengguna');
		$dataindex['datapenggunajenispengguna']=$this->db->get_where('jenispengguna',['idjenispengguna' => $this->session->userdata('jenispengguna')])->row_array();
		$dataindex['daftarpesananaktif']=$this->pesanan_model->daftarpesananaktif()->result();
		$this->load->view('Kasir/Kasir_Header');
		$this->load->view('Kasir/Kasir_Beranda',$dataindex);
	}

	public function buat_pesanan()
	{
		$idpesanansekarang['idsekarang']=$this->db->query('SELECT MAX(idpesanan) AS id FROM pesanan ')->row_array();
		$memisahidpesanan=substr($idpesanansekarang['idsekarang']['id'], 14,15)+1;
		$tanggalpesanan=date('dmY');
		$kodeunik="ERP";
		$datahalaman['iddiinputkan']=$kodeunik.$tanggalpesanan.sprintf("-%03s",$memisahidpesanan);
		$datahalaman['datapenggunausername']=$this->session->userdata('username');
		$datahalaman['datapenggunajenispengguna']=$this->db->get_where('jenispengguna',['idjenispengguna' => $this->session->userdata('jenispengguna')])->row_array();
		$this->load->view('Kasir/Kasir_Header');
		$this->load->view('Kasir/Kasir_BuatPesanan',$datahalaman);
	}

	public function lihat_pesanan($idpesanan)
	{
		$datahalaman['idpesanan']=$idpesanan;
		$datahalaman['daftarmenu']=$this->db->query('SELECT idisipesanan,namamenu,hargamenu,gambarmenu FROM isipesanan AS isipesanans INNER JOIN menu ON isipesanans.idmenu=menu.idmenu WHERE idpesanan="'.$datahalaman['idpesanan']=$idpesanan.'"')->result();
		$datahalaman['nomormeja']=$this->db->get_where('pesanan',['idpesanan'=>$idpesanan])->row_array();
		$datahalaman['datapenggunausername']=$this->session->userdata('username');
		$datahalaman['datapenggunajenispengguna']=$this->db->get_where('jenispengguna',['idjenispengguna' => $this->session->userdata('jenispengguna')])->row_array();
		$this->load->view('Kasir/Kasir_Header');
		$this->load->view('Kasir/Kasir_LihatPesanan',$datahalaman);
	}

		public function simpan_pesanan()
	{	

		if (isset($_POST['simpanpesanan'])) {
		$idpesanan=$this->input->post('IDPesanan');
		$idpengguna=$this->session->userdata('idpengguna');
		$nomormeja=$this->input->post('NomorMeja');
		$inputdata=array(
			'idpesanan'=>$idpesanan,
			'idpengguna'=>$idpengguna,
			'nomormeja'=>$nomormeja,
			'statuspesanan'=>"1"
			);
		$this->pesanan_model->simpanpesanan($inputdata,'pesanan');
		$datahalaman['daftarmenu']=$this->menu_model->daftarmenu()->result();
		$datahalaman['idpesanan']=$idpesanan;
		$datahalaman['datapenggunausername']=$this->session->userdata('username');
		$datahalaman['datapenggunaidpengguna']=$this->session->userdata('idpengguna');
		$datahalaman['datapenggunajenispengguna']=$this->db->get_where('jenispengguna',['idjenispengguna' => $this->session->userdata('jenispengguna')])->row_array();
		$this->daftar_isipesanan($datahalaman['idpesanan']);
	}
	}

	public function simpan_perubahan()
	{	
		$where=$this->input->post('IDPesanan');
		$nomormeja=$this->input->post('NomorMeja');
		$inputdata=array('nomormeja'=>$nomormeja);
		$this->pesanan_model->simpanperubahan($where,$inputdata,'pesanan');
		redirect('Kasir/index','refresh');
	}	


	public function daftar_isipesanan($idpesanan){
		$datahalaman['daftarmenu']=$this->menu_model->daftarmenu()->result();
		$datahalaman['idpesanan']=$idpesanan;
		$datahalaman['datapenggunausername']=$this->session->userdata('username');
		$datahalaman['datapenggunaidpengguna']=$this->session->userdata('idpengguna');
		$datahalaman['datapenggunajenispengguna']=$this->db->get_where('jenispengguna',['idjenispengguna' => $this->session->userdata('jenispengguna')])->row_array();
		$this->load->view('Kasir/Kasir_Header');
		$this->load->view('Kasir/Kasir_DaftarMenuPesan',$datahalaman);
	}

	public function tambah_isipesanan()
	{	
		$idpesanan=$this->uri->segment(3);
		$idmenu=$this->uri->segment(4);
		$inputdata=array(
			'idisipesanan'=>'',
			'idpesanan'=>$idpesanan,
			'idmenu'=>$idmenu
			);
		$this->isipesanan_model->simpanisipesanan($inputdata,'isipesanan');
		redirect('Kasir/daftar_isipesanan/'.$idpesanan.'');
	}	

	public function daftar_menu()
	{	
		$datahalaman['daftarmenu']=$this->menu_model->daftarmenu()->result();
		$datahalaman['datapenggunausername']=$this->session->userdata('username');
		$datahalaman['datapenggunaidpengguna']=$this->session->userdata('idpengguna');
		$datahalaman['datapenggunajenispengguna']=$this->db->get_where('jenispengguna',['idjenispengguna' => $this->session->userdata('jenispengguna')])->row_array();
		$this->load->view('Kasir/Kasir_Header');
		$this->load->view('Kasir/Kasir_DaftarMenu',$datahalaman);
	}

	public function tambah_menu()
	{	
		$datahalaman['datapenggunausername']=$this->session->userdata('username');
		$datahalaman['datapenggunaidpengguna']=$this->session->userdata('idpengguna');
		$datahalaman['datapenggunajenispengguna']=$this->db->get_where('jenispengguna',['idjenispengguna' => $this->session->userdata('jenispengguna')])->row_array();
		$this->load->view('Kasir/Kasir_Header');
		$this->load->view('Kasir/Kasir_TambahMenu',$datahalaman);
	}

	public function hapus_isipesanan()
	{
		$idpesanan=$this->uri->segment(4);
		$idisipesanan=$this->uri->segment(3);
		$this->isipesanan_model->hapusisipesanan($idisipesanan, 'isipesanan');
		redirect('Kasir/lihat_pesanan/'.$idpesanan.'','refresh');
	}

	public function simpan_menu()
	{	
		if (isset($_POST['simpanmenu'])) {
			$config = 
			[
				'upload_path' => './gambarmenu/',
				'allowed_types' => 'jpg',
				'max_size' => 100,
				'max_width' =>12000,
				'max_height' =>12000
			];
			$this->load->library('upload', $config);
			$uploadproses=$this->upload->do_upload('userfile');
			if (!$uploadproses){
				echo "Gagal";
			}else{
			$namamenu=$this->input->post('NamaMenu');
			$hargamenu=$this->input->post('HargaMenu');
			$datagambar=$this->upload->data();
			$inputdata=array(
				 'namamenu' => $namamenu,
				  'hargamenu' => $hargamenu,
				  'gambarmenu'=> $datagambar['file_name'],
				  'statusmenu' => "1"
			);
			$this->menu_model->simpanmenu($inputdata,'menu');
			redirect('Kasir/daftar_menu','refresh');
	}
}
}

	public function riwayat_pesanan()
	{
		$dataindex['datapenggunausername']=$this->session->userdata('username');
		$dataindex['datapenggunaidpengguna']=$this->session->userdata('idpengguna');
		$dataindex['datapenggunajenispengguna']=$this->db->get_where('jenispengguna',['idjenispengguna' => $this->session->userdata('jenispengguna')])->row_array();
		$dataindex['daftarpesananaktif']=$this->db->get_where('pesanan',['idpengguna' => $this->session->userdata('idpengguna')])->result();
		$this->load->view('Kasir/Kasir_Header');
		$this->load->view('Kasir/Kasir_RiwayatPesanan',$dataindex);
	}
	
	public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('idpengguna');
        $this->session->unset_userdata('jenispengguna');
            redirect('Welcome');
    }
}
