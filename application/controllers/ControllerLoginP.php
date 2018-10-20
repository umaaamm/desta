<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerLoginP extends CI_Controller {

	public function index()
	{
	//	$databeranda['content']='admin/v-beranda';
		$this->load->view('v_login_peserta');
	}
		//login
	function aksi_login(){

		$npm = $this->input->post('npm');
		//print_r($npm);
		//$cek = $this->RsModel->cek_login("tbl_admin",$where)->num_rows();
		$cek = $this->db->query("SELECT * FROM tbl_peserta WHERE npm='$npm' ");
		//print_r($cek);die;
		//$cek1 = $this->db->query("SELECT * FROM tbl_bagian WHERE username='$username' AND password='$password' ");
		if($cek->num_rows() > 0){
				foreach($cek->result() as $key){
				$lvl = $key->level;
				$nama = $key->nama;
			}
			if($lvl=='mahasiswa'){
				$data_session = array(
				'nama' => $nama,
				'level'=> $lvl,
				'status' => "login"
				);
			$this->session->set_userdata($data_session);
			$this->session->set_flashdata("notif_l","<div class='alert alert-success'>Selamat Anda Berhasil Login</div>");
				redirect('ControllerSeleksi');
			}else{
				$this->session->set_flashdata("notif_l","<div class='alert alert-danger'>Password atau Username anda Salah</div>");
				redirect('LoginPeserta');
			}

		}else{
			$this->session->set_flashdata("notif_l","<div class='alert alert-danger'>Password atau Username anda Salah</div>");
			redirect('LoginPeserta');
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'LoginPeserta');
	
	}

}