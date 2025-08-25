<?php 
class Mslider extends CI_Model {
	function tampil() {

		$q = $this->db->get("slider");

		$d = $q->result_array();

		return $d;
	}

	function simpan($inputan) {
		// upload foto slider
		$config['upload_path'] = $this->config->item("assets_slider");
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->library('upload', $config);

		// adegan ngupload foto_slider
		$ngupload = $this->upload->do_upload('foto_slider');

		// jika ngupload, maka dapatkan nama fotonya untuk ditampung ke database
		if ($ngupload) {
			$inputan['foto_slider'] = $this->upload->data("file_name");
		}

		// query simpan data ke tabel slider
		$this->db->insert('slider', $inputan);
	}

	function hapus($id_slider) {
		// delete from slider where id_slider 5
		$this->db->where('id_slider', $id_slider);
		$this->db->delete('slider');
	}

	function detail($id_slider) {
		// select from slider where id_slider=4
		$this->db->where('id_slider', $id_slider);
		$q = $this->db->get('slider');
		$d = $q->row_array();

		return $d;
	}

	function edit($inputan, $id_slider) {
		// ngurusi foto_slider jika pengguna upload foto

		$config['upload_path'] = $this->config->item("assets_slider");
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);

		// adegan upload
		$ngupload = $this->upload->do_upload("foto_slider");

		// jika ngupload
		if ($ngupload) {
			$inputan['foto_slider'] = $this->upload->data("file_name");
		}

		// query update data sesuai id_slider
		$this->db->where('id_slider', $id_slider);
		$this->db->update('slider', $inputan);

	}
}