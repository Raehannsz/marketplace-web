<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

class Register extends CI_Controller {

	public function index() {

		$this->load->model("Mongkir");
		$this->load->model("Mmember");
		//$this->load->model("Motp");

		//$data['distrik'] = $this->Mongkir->tampil_distrik();
		$data['distrik'] = array();

		$this->form_validation->set_rules("email_member", "Email", "required|is_unique[member.email_member]");
		$this->form_validation->set_rules("password_member", "Password", "required");
		$this->form_validation->set_rules("nama_member", "Nama", "required");
		$this->form_validation->set_rules("alamat_member", "Alamat", "required");
		$this->form_validation->set_rules("wa_member", "No. WhatsApp", "required");
		$this->form_validation->set_rules("kode_distrik_member", "Kode Distrik Member", "required");
		$this->form_validation->set_rules("nama_distrik_member", "Nama Distrik Member", "required");

		$this->form_validation->set_message("required", "%s wajib diisi");
		$this->form_validation->set_message("is_unique", "%s yang sama sudah digunakan");
		if ($this->form_validation->run() == TRUE) {
			
			$m['email_member'] = $this->input->post("email_member");
			$m['password_member'] = $this->input->post("password_member");
			$m['password_member'] = sha1($m["password_member"]);
			$m['nama_member'] = $this->input->post("nama_member");
			$m['alamat_member'] = $this->input->post("alamat_member");
			$m['wa_member'] = $this->input->post("wa_member");
			$m['kode_distrik_member'] = $this->input->post("kode_distrik_member");
			$m['nama_distrik_member'] = $this->input->post("nama_distrik_member");

			$this->Mmember->register($m);

			/* $otp = rand(100000, 999999);
			$waktu = date('Y-m-d H:i:s', strtotime('+5 minutes'));

			$this->_kirim_otp_fonnte($m['wa_member'], $otp);
			$this->Motp->simpan_otp($m['wa_member'], $otp, $waktu);

			$this->session->set_userdata('otp_nomor', $m['wa_member']);

			redirect('otp'); */
			$this->session->set_flashdata('pesan_sukses', 'Registrasi berhasil. Silakan login.');
			redirect('welcome');
		}

		$this->load->view("header");
		$this->load->view("register", $data);
		$this->load->view("footer");

	}

	/* function _kirim_otp_fonnte($wa, $otp) {
	    $token = 'MF9suXPqggqWWsizsZUx';

	    $pesan = "Kode OTP kamu adalah *$otp*. Berlaku selama 5 menit.";

	    $wa = preg_replace('/[^0-9]/', '', $wa);

	    $curl = curl_init();
	    curl_setopt_array($curl, array(
	        CURLOPT_URL => "https://api.fonnte.com/send",
	        CURLOPT_RETURNTRANSFER => true,
	        CURLOPT_POST => true,
	        CURLOPT_POSTFIELDS => array(
	            'target' => $wa,
	            'message' => $pesan,
	            'countryCode' => '62'
	        ),
	        CURLOPT_HTTPHEADER => array(
	            "Authorization: $token"
	        ),
	    ));

	    $response = curl_exec($curl);
	    curl_close($curl);

	    log_message('debug', 'OTP sent via Fonnte: ' . $response);
	} */

	function cari_distrik() {
		if ($this->input->post('keyword')) {
			$keyword = $this->input->post('keyword');

			$keyword = urlencode($keyword);
			$url = "https://rajaongkir.komerce.id/api/v1/destination/domestic-destination?search=".$keyword."&limit=10&offset=0";
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array("key: ncfi0IMFf769dfc2001d4123wJ83hSus"),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				$response = json_decode($response, TRUE);
				if (isset($response['data'])) {
					echo "<option>Pilih</option>";
					foreach ($response['data'] as $key => $value) {
						echo "<option value='".$value["id"]."'>";
						echo $value["label"];
						echo "</option>";
					}
				}
			}
		}
	}
}