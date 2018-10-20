<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerSeleksi extends CI_Controller {

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


	// function __construct(){
	// parent::__construct();
	
	// 		if($this->session->userdata('status') != "login"){
	// 		redirect(base_url('Login'));
	// 	}
	

	public function index()
	{
		
		// $databeranda['content']='peserta/v_daftar';
		$this->load->view('peserta/v_daftar');
	}
	public function simpan(){
			$data['nama']=$this->input->post("nama");
			$data['jurusan']=$this->input->post("jurusan");
			$data['npm']=$this->input->post("npm");
			$data['email']=$this->input->post("email");
			$data['level']='mahasiswa';
			//print_r($data);die;
			$this->RsModel->TambahData("tbl_peserta",$data);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Anda Berhasil Register, Silahkan Login Menggunakan NPM</div>");
			header('location:'.base_url().'LoginPeserta');
	}
}
