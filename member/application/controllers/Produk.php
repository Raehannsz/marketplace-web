<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!$this->session->userdata("id_member")) {
			$this->session->set_flashdata('pesan_gagal', 'Anda harus login');
			redirect('/','refresh');
		}
	}
	
	function index() {

		// Panggil model produk dan fungsi tampil

		$this->load->model("Mproduk");
		$data["produk"] = $this->Mproduk->tampil();

		$this->load->view("header");
		$this->load->view("produk_tampil", $data);
		$this->load->view("footer");
	}

	function detail($id_produk) {
		$this->load->model('Mproduk');
		$data['produk'] = $this->Mproduk->detail_umum($id_produk);

		$inputan = $this->input->post();
		if ($inputan) {
			$this->load->model("Mkeranjang");
			$this->Mkeranjang->simpan($inputan, $id_produk);

			$this->session->set_flashdata('pesan_sukses', 'produk masuk ke keranjang belanja');
			redirect('keranjang', 'refresh');
		}

		$this->load->view('header');
		$this->load->view('produk_detail', $data);
		$this->load->view('footer');
	}

	function cari() {
		$this->load->helper('text');
		$this->load->model('Mproduk');

		$keyword = $this->input->get('keyword', TRUE);
		
		$data['keyword'] = $keyword;
		$data['produk'] = $this->Mproduk->cari($keyword);

		$this->load->view('header');
		$this->load->view('produk_cari', $data);
		$this->load->view('footer');
  }
}