<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('mymodel');
    }

	public function index()
	{
		if($this->session->userdata('role')==='pasien'){
			$data['user'] = $this->db->query("SELECT 
				user.id AS user_id, user.username, user.role,
				pasien.id AS pasien_id, pasien.nama,
				pasien.no_hp, pasien.alamat
				FROM user 
				JOIN pasien ON pasien.id_user = user.id
				WHERE user.id = '".$this->session->userdata('id')."'")->row_array();
			$this->load->view('v_dashboard_pasien', $data);
		}
		else{
			redirect('auth');
		}
	}

	public function view_daftar_poli(){
		if($this->session->userdata('role')==='pasien'){
			$data['user'] = $this->db->query("SELECT 
				user.id AS user_id, user.username, user.role,
				pasien.id AS pasien_id, pasien.nama, pasien.no_rm,
				pasien.no_hp, pasien.alamat
				FROM user 
				JOIN pasien ON pasien.id_user = user.id
				WHERE user.id = '".$this->session->userdata('id')."'")->row_array();
			$idpasien = $data['user']['pasien_id'];
			$data['poli'] = $this->db->get('poli')->result_array();
			$data['daftar_poli'] = $this->mymodel->ambil_riwayat_poli($idpasien);
			$this->load->view('v_daftar_poli', $data);
		}
		else{
			redirect('auth');
		}
	}

	public function get_jadwal_dokter(){
		$idpoli = $this->input->post('id_poli');
        $data = $this->mymodel->ambil_data_jadwal_dokter($idpoli);
        echo json_encode($data);
	}

	public function tambah_daftar_poli(){
		$data['user'] = $this->db->query("SELECT 
				user.id AS user_id, user.username, user.role,
				pasien.id AS pasien_id, pasien.nama, pasien.no_rm,
				pasien.no_hp, pasien.alamat
				FROM user 
				JOIN pasien ON pasien.id_user = user.id
				WHERE user.id = '".$this->session->userdata('id')."'")->row_array();
		$id_pasien = $data['user']['pasien_id'];
		$id_jadwal = $this->input->post('idjadwal');
		$keluhan = $this->input->post('keluhan');
		// Set zona waktu ke Jakarta (WIB)
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d');

		$datas = array(
			'id_pasien' => $id_pasien,
			'id_jadwal' => $id_jadwal,
			'keluhan' => $keluhan,
			'no_antrian' => $this->mymodel->nomor_antrian($id_jadwal,$tanggal),
			'status' => 'Belum diperiksa',
			'tanggal' => $tanggal
		);

		if($this->db->insert('daftar_poli',$datas)){
			header('Content-Type: application/json');
			echo json_encode(['status' => 'oke']);
		}
		else{
			header('Content-Type: application/json');
			echo json_encode(['status' => 'failed']);
		}
	}

}