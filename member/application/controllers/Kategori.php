<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!$this->session->userdata("id_member")) {
			$this->session->set_flashdata('pesan_gagal', 'Anda harus login');
			redirect('/','refresh');
		}
	}

	function index() {

		// Panggil model kategori dan fungsi tampil

		$this->load->model("Mkategori");

		$data["kategori"] = $this->Mkategori->tampil();

		$this->load->view("header");
		$this->load->view("kategori_tampil", $data);
		$this->load->view("footer");
	}

	function detail($id) {
		$this->load->model('Mkategori');
		$data['kategori'] = $this->Mkategori->detail($id);
		$data['produk'] = $this->Mkategori->produk($id);

		$this->load->view("header");
		$this->load->view("kategori_produk", $data);
		$this->load->view("footer");
	}
}