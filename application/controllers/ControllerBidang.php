<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerBidang extends CI_Controller {

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
		
		$databeranda['tampil']=$this->db->query("select * from tbl_bidang");
		$databeranda['content']='bidang/v_bidang';
		$this->load->view('admin/home',$databeranda);
	}

	public function simpan(){
		$data['nama_bidang']=$this->input->post("nama_bidang");
		
			
			
			//print_r($data);die;
			$this->RsModel->TambahData("tbl_bidang",$data);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil ditambah</div>");
			header('location:'.base_url().'KelolaBidang');
	}

	public function hapus(){
		$id=$this->uri->segment(3);
		$where=array('id_bidang'=>$id);
		$this->RsModel->HapusData('tbl_bidang',$where);
		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil dihapus</div>");
		header('location:'.base_url().'KelolaBidang');
	}

	public function edit(){
			$where['id_bidang']=$this->input->post('id');
			$data['nama_bidang']=$this->input->post("nama_bidang");
			

			//print_r($where);die;
			$this->RsModel->EditData("tbl_bidang",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil diedit</div>");
			header('location:'.base_url().'KelolaBidang');

	}

}
