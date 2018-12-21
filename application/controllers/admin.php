<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('ModelCrud');
	}

	public function index() {
		$this->load->view('admin/index');
	}
	public function login() {
		$this->load->view('login');
	}
	public function loginAction() {
		redirect(base_url("index.php/admin/index"));
	}
	public function customer() {
		$data['query'] = $this->ModelCrud->lihat();
		$this->load->view('admin/customer', $data);
	}
	public function customerTambah(){
		$this->load->view('admin/customerForm');	
	}

	public function save(){
		$data = array('nama' => $this->input->post('nama'), 'email' => $this->input->post('email'), 'telp' => $this->input->post('telp'), 'instagram' => $this->input->post('instagram'), 'tanggallahir' => $this->input->post('tanggallahir'), 'pekerjaan' => $this->input->post('pekerjaan'),'instansi' => $this->input->post('instansi'));

		$proses = $this->ModelCrud->save($data);
		if (!$proses){
			redirect(base_url("index.php/admin/customer"));
		} else {
			echo "Data Gagal disimpan";
			echo "<br>";
			echo "<a href='".base_url('index.php/admin/customer')."'>Kembali</a>";
		}
	}

	public function customerEdit(){
		$id = $this->uri->segment(3);
		$data['query'] = $this->ModelCrud->edit($id);
		$this->load->view('admin/customerEdit', $data);	
	}

	public function update(){
		$id = $this->input->post('id');
		$data = array('nama' => $this->input->post('nama'), 'email' => $this->input->post('email'), 'telp' => $this->input->post('telp'), 'instagram' => $this->input->post('instagram'), 'tanggallahir' => $this->input->post('tanggallahir'), 'pekerjaan' => $this->input->post('pekerjaan'),'instansi' => $this->input->post('instansi'));

		$proses = $this->ModelCrud->update($id, $data);
		if (!$proses){
			redirect(base_url("index.php/admin/customer"));
		} else {
			echo "Data Gagal diubah";
			echo "<br>";
			echo "<a href='".base_url('index.php/admin/customer')."'>Kembali</a>";
		}
	}

	public function delete(){
		$id = $this->uri->segment(3);
		$proses = $this->ModelCrud->delete($id);
		if (!$proses){
			redirect(base_url("index.php/admin/customer"));
		} else {
			echo "Data Gagal dihapus";
			echo "<br>";
			echo "<a href='".base_url('index.php/admin/customer')."'>Lihat data</a>";
		}
	}

	public function company() {
		$this->load->view('admin/company');
	}
	public function companyTambah(){
		$this->load->view('admin/companyForm');	
	}
	public function library() {
		$this->load->view('admin/library');
	}
	public function libraryTambah(){
		$this->load->view('admin/libraryForm');	
	}
	public function product() {
		$this->load->view('admin/product');
	}
	public function productTambah(){
		$this->load->view('admin/productForm');	
	}
	public function post(){
		$this->load->view('admin/posts');	
	}
}
