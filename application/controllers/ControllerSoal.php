<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerSoal extends CI_Controller {

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
		$databeranda['tampil_bidang']=$this->db->query("select * from tbl_bidang");
		$databeranda['tampil']=$this->db->query("select tbl_bidang.id_bidang,tbl_bidang.nama_bidang,tbl_soal.id_soal,tbl_soal.soal,tbl_soal.a,tbl_soal.b,tbl_soal.c,tbl_soal.d,tbl_soal.kunci_jawaban from tbl_soal LEFT JOIN tbl_bidang on tbl_bidang.id_bidang = tbl_soal.id_bidang");
		$databeranda['content']='soal/v_soal';
		$this->load->view('admin/home',$databeranda);
	}

	public function simpan(){
		$data['id_bidang']=$this->input->post("id_bidang");
			$data['soal']=$this->input->post("soal");
			$data['a']=$this->input->post("a");
			$data['b']=$this->input->post("b");
			$data['c']=$this->input->post("c");
			$data['d']=$this->input->post("d");
			$data['kunci_jawaban']=$this->input->post("kunci_jawaban");
			
			
			
			//print_r($data);die;
			$this->RsModel->TambahData("tbl_soal",$data);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil ditambah</div>");
			header('location:'.base_url().'KelolaSoal');
	}

	public function hapus(){
		$id=$this->uri->segment(3);
		$where=array('id_soal'=>$id);
		$this->RsModel->HapusData('tbl_soal',$where);
		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil dihapus</div>");
		header('location:'.base_url().'KelolaSoal');
	}

	public function edit(){
			$where['id_soal']=$this->input->post('id');
			$data['id_bidang']=$this->input->post("id_bidang");
			$data['soal']=$this->input->post("soal");
			$data['a']=$this->input->post("a");
			$data['b']=$this->input->post("b");
			$data['c']=$this->input->post("c");
			$data['d']=$this->input->post("d");
			$data['kunci_jawaban']=$this->input->post("kunci_jawaban");

			//print_r($where);die;
			$this->RsModel->EditData("tbl_soal",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil diedit</div>");
			header('location:'.base_url().'KelolaSoal');

	}

}
