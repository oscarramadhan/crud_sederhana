<?php
class Crud extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('m_crud');
	}
	function index(){
		$data['data_buku']=$this->m_crud->m_lihat();
		$this->load->view('v_lihat',$data);
	}
	function tambah(){
		$this->load->view('v_tambah');
	}
	function tambah_act(){
		$data=array(
			'id' => $this->input->post('id'),
			'judul' => $this->input->post('judul'),
			'pengarang' => $this->input->post('pengarang'),
			'kategori' => $this->input->post('kategori')			
			);
		$this->m_crud->m_tambah_act($data);	
		redirect(base_url().'crud/');
	}
	function hapus($id){
		$data=array(
			'id' => $id
			);
		$this->m_crud->m_hapus($data);
		redirect(base_url().'crud/');
	}
	function edit($id){
		$data=array(
			'id'=>$id
			);
		$data['data_edit']=$this->m_crud->m_edit($data);
		$this->load->view('v_edit',$data);
	}
	function update(){
		$id = $this->input->post('id');
		$data=array(			
			'judul'=>$this->input->post('judul'),
			'pengarang'=>$this->input->post('pengarang'),
			'kategori'=>$this->input->post('kategori')
			);
		$this->m_crud->m_update($data,$id);
		redirect(base_url().'crud/');
	}
}
?>