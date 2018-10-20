<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerRegister extends CI_Controller {

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
	public function index()
	{
		$this->load->view('peserta/daftar',$databeranda);
	}

	public function simpan(){
			$data['nama_barang']=$this->input->post("nama");
			// $data['stok']=$this->input->post("stok");
			
			//print_r($data);die;
			$this->RsModel->TambahData("tbl_atk",$data);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil ditambah</div>");
			header('location:'.base_url().'KelolaAtk');
	}

	public function hapus(){
		$id=$this->uri->segment(3);
		$where=array('id_atk'=>$id);
		$this->RsModel->HapusData('tbl_atk',$where);
		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil dihapus</div>");
		header('location:'.base_url().'KelolaAtk');
	}

	public function edit(){
			$where['id_atk']=$this->input->post('id');
			$data['nama_barang']=$this->input->post("nama");
			// $data['stok']=$this->input->post("stok");
			
			//print_r($where);die;
			$this->RsModel->EditData("tbl_atk",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil diedit</div>");
			header('location:'.base_url().'KelolaAtk');

	}

}
