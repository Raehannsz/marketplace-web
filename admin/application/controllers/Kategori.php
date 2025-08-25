<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!$this->session->userdata("id_admin")) {
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

	function tambah() {
		// Mendapatkan inputan dari formulir pakai $this->input->post()
		$inputan = $this->input->post();

		// form validation - nama_kategori wajib diisi
		$this->form_validation->set_rules("nama_kategori", "Nama Kategori", "required");

		// atur pesan dalam bahasa indonesia
		$this->form_validation->set_message("required", "%s Wajib diisi");

		// jika ada inputan
		if ($this->form_validation->run() == TRUE) {
			// panggil model Mkategori
			$this->load->model("Mkategori");

			// jalankan fungsi simpan()
			$this->Mkategori->simpan($inputan);

			// pesan dilayar
			$this->session->set_flashdata('pesan_sukses', 'Data kategori tersimpan');

			// redirect ke fitur kategori untuk tampil kategori
			redirect('kategori', 'refresh');
		}

		$this->load->view("header");
		$this->load->view("kategori_tambah");
		$this->load->view("footer");
	}

	function hapus($id_kategori) {
		// panggil model Mkategori
		$this->load->model('Mkategori');

		// jalankan fungsi hapus()
		$this->Mkategori->hapus($id_kategori);

		// pesan di layar
		$this->session->set_flashdata('pesan_sukses', 'kategori telah terhapus');

		// redirect ke kategori untuk tampil data
		redirect('kategori', 'refresh');
	}

	function edit($id_kategori) {

		// tampilkan dulu kategori yang lama
		$this->load->model('Mkategori');
		$data['kategori'] = $this->Mkategori->detail($id_kategori);

		// baru mikir ngubah data
		$inputan = $this->input->post();

		// form validation - nama_kategori wajib diisi
		$this->form_validation->set_rules("nama_kategori", "Nama Kategori", "required");

		// atur pesan dalam bahasa indonesia
		$this->form_validation->set_message("required", "%s Wajib diisi");

		// jika ada inputan
		if ($this->form_validation->run() == TRUE) {
			// jalankan fungsi edit()
			$this->Mkategori->edit($inputan, $id_kategori);

			// pesan
			$this->session->set_flashdata('pesan_sukses', 'Kategori telah diubah');

			// redirect
			redirect('kategori', 'refresh');
		}

		$this->load->view('header');
		$this->load->view('kategori_edit', $data);
		$this->load->view('footer');
	}
}