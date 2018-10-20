<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerLogin extends CI_Controller {

	public function index()
	{
	//	$databeranda['content']='admin/v-beranda';
		$this->load->view('v_login');
	}
		//login
	function aksi_login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);
		//$cek = $this->RsModel->cek_login("tbl_admin",$where)->num_rows();
		$cek = $this->db->query("SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' ");
		$cek1 = $this->db->query("SELECT * FROM tbl_bagian WHERE username='$username' AND password='$password' ");
		if($cek->num_rows() > 0){
				foreach($cek->result() as $key){
				$lvl = $key->level;
				$nama = $key->nama;
			}
			if($lvl=='Admin'){
				$data_session = array(
				'username' => $username,
				'nama' => $nama,
				'level'=> $lvl,
				'status' => "login"
				);
			$this->session->set_userdata($data_session);
			$this->session->set_flashdata("notif_l","<div class='alert alert-success'>Selamat Anda Berhasil Login</div>");
				redirect('ControllerUtama');
			}elseif($lvl=='Pimpinan'){
				$data_session = array(
				'username' => $username,
				'nama' => $nama,
				'level'=> $lvl,
				'status' => "login"
				);
			$this->session->set_userdata($data_session);
				$this->session->set_flashdata("notif_l","<div class='alert alert-success'>Selamat Anda Berhasil Login</div>");
				redirect('ControllerUtama');
				
			}else{
				$this->session->set_flashdata("notif_l","<div class='alert alert-danger'>Password atau Username anda Salah</div>");
				redirect('Login');
			}

 		}elseif($cek1->num_rows() > 0){
 			foreach($cek1->result() as $key){
				$lvl1 = $key->level;
				$nama_bagian = $key->nama_bagian;
			}
 			if($lvl1=='Biasa'){
				$data_session = array(
				'username' => $username,
				'level'=> $lvl1,
				'nama'=>$nama_bagian,
				'status' => "login"
				);
		 
			$this->session->set_userdata($data_session);
			$this->session->set_flashdata("notif_l","<div class='alert alert-success'>Selamat Anda Berhasil Login</div>");
				redirect('ControllerUtama');
			}else{
				$this->session->set_flashdata("notif_l","<div class='alert alert-danger'>Password atau Username anda Salah</div>");
				redirect('Login');
			}

		}else{
			$this->session->set_flashdata("notif_l","<div class='alert alert-danger'>Password atau Username anda Salah</div>");
			redirect('Login');
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'Login');
	
	}

}