<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('mymodel');
    }

	public function index()
	{
		if($this->session->userdata('role')==='dokter'){
			$data['user'] = $this->db->query("SELECT 
			user.id AS user_id, user.username, user.role,
			dokter.id AS dokter_id, dokter.nama, dokter.id_poli
			FROM user 
			JOIN dokter ON dokter.id_user = user.id
			WHERE user.id = '".$this->session->userdata('id')."'")->row_array();
			$this->load->view('v_dashboard_dokter', $data);
		}
		else{
			redirect('auth');
		}
	}

	public function view_profile(){
		if($this->session->userdata('role')==='dokter'){
			$data['user'] = $this->db->query("SELECT 
				user.id AS user_id, user.username, user.role,
				dokter.id AS dokter_id, dokter.nama, dokter.id_poli, 
				dokter.no_hp, dokter.alamat,
				poli.id AS poli_id, poli.nama_poli
				FROM user 
				JOIN dokter ON dokter.id_user = user.id
				JOIN poli ON dokter.id_poli = poli.id
				WHERE user.id = '".$this->session->userdata('id')."'")->row_array();
			$data['poli'] = $this->db->get('poli')->result_array();
			$this->load->view('v_profile', $data);
		}
		else{
			redirect('auth');
		}
	}

	public function update_profile(){
		$id_dokter = $this->input->post('id_dokter');
		$id_user = $this->input->post('id_user');
		$nama_dokter = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$nohp = $this->input->post('nomorhp');
		$idpoli = $this->input->post('poli');

		$dataUser = [
			'username' => $nama_dokter,
			'password' => password_hash($alamat,PASSWORD_BCRYPT)
		];

		$where = ['id'=>$id_user];
		if($this->db->update('user',$dataUser,$where)){
			$datas = [
				'nama' => $nama_dokter,
				'alamat' => $alamat,
				'no_hp' => $nohp,
				'id_poli' => $idpoli
			];
	
			$where = ['id'=>$id_dokter];
			if($this->db->update('dokter',$datas,$where)){
				header('Content-Type: application/json');
				echo json_encode(['status' => 'oke']);
			}
			else{
				header('Content-Type: application/json');
				echo json_encode(['status' => 'failed']);
			}
		}
		else{
			header('Content-Type: application/json');
			echo json_encode(['status' => 'failed']);
		}
	}

	public function view_jadwal_periksa(){
		if($this->session->userdata('role')!=='dokter'){
			redirect('auth');
		}
		else{
			$target = $this->session->userdata('id');
			$id_dokter = $this->db->get_where('dokter',['id_user'=>$target])->row_array();
			$iddokter = $id_dokter['id'];
			$data['user'] = $this->db->query("SELECT 
				user.id AS user_id, user.username, user.role,
				dokter.id AS dokter_id, dokter.nama, dokter.id_poli, 
				dokter.no_hp, dokter.alamat,
				poli.id AS poli_id, poli.nama_poli
				FROM user 
				JOIN dokter ON dokter.id_user = user.id
				JOIN poli ON dokter.id_poli = poli.id
				WHERE user.id = '".$this->session->userdata('id')."'")->row_array();
			$data['jadwal'] = $this->db->query("SELECT jadwal_periksa.id, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, jadwal_periksa.status
								FROM jadwal_periksa
								WHERE jadwal_periksa.id_dokter = $iddokter")->result_array();
			$this->load->view('v_jadwal_periksa',$data);
		}
	}

	public function tambah_jadwal_periksa(){
		$id = $this->db->get_where('dokter',['id_user'=>$this->session->userdata('id')])->row_array();
		$datas = array(
			'id_dokter' => $id['id'],
			'hari' => $this->input->post('hari'),
			'jam_mulai' => $this->input->post('jamMulai'),
			'jam_selesai' => $this->input->post('jamSelesai'),
			'status' => 'tidak aktif',
		);
	
		if ($this->db->insert('jadwal_periksa', $datas)) {
			header('Content-Type: application/json');
			echo json_encode(['status' => 'oke']);
		} else {
			header('Content-Type: application/json');
			echo json_encode(['status' => 'failed']);
		}
	}

	public function get_data_jadwal_periksa(){
		$id = $this->input->post('idjadwal');
        $target = array(
            'id'=>$id
        );
        $data = $this->db->get_where('jadwal_periksa',$target)->row_array();
        echo json_encode ($data);
	}

	public function update_jadwal()
	{
		$data = array(
			'hari' => $this->input->post('hariDokter'),
			'jam_mulai' => $this->input->post('jamMulaiDokter'),
			'jam_selesai' => $this->input->post('jamSelesaiDokter'),
		);

		$where = array(
			'id' => $this->input->post('idJadwal')
		);

		if($this->db->update('jadwal_periksa',$data,$where)){
			header('Content-Type: application/json');
			echo json_encode(['status' => 'oke']);
		}
		else{
			header('Content-Type: application/json');
			echo json_encode(['status' => 'gagal']);
		}
	}

	public function update_status_jadwal(){
		$id = $this->input->post('id');
	
		// Nonaktifkan semua jadwal
		$this->db->update('jadwal_periksa', ['status' => 'tidak aktif']);
	
		// Aktifkan jadwal berdasarkan ID
		$this->db->where('id', $id);
		if ($this->db->update('jadwal_periksa', ['status' => 'aktif'])) {
			header('Content-Type: application/json');
			echo json_encode(['status' => 'oke']);
		} else {
			header('Content-Type: application/json');
			echo json_encode(['status' => 'failed', 'error' => $this->db->error()]);
		}
	}

	public function view_periksa_pasien(){
		if ($this->session->userdata('role') !== 'dokter') {
			redirect('auth');
			return;
		}
	
		$data['user'] = $this->db->query("SELECT 
				user.id AS user_id, user.username, user.role,
				dokter.id AS dokter_id, dokter.nama, dokter.id_poli, 
				dokter.no_hp, dokter.alamat,
				poli.id AS poli_id, poli.nama_poli
				FROM user 
				JOIN dokter ON dokter.id_user = user.id
				JOIN poli ON dokter.id_poli = poli.id
				WHERE user.id = '".$this->session->userdata('id')."'")->row_array();
	
		// Ambil ID dokter
		$id_dokter = $data['user']['dokter_id'];
	
		// Ambil daftar pasien untuk dokter yang sedang login
		$data['pasien'] = $this->db->query("
			SELECT 
				daftar_poli.id AS daftar_poli_id, 
				daftar_poli.keluhan, 
				daftar_poli.no_antrian, 
				daftar_poli.status, 
				daftar_poli.tanggal,
				pasien.id AS pasien_id, 
				pasien.nama AS pasien_nama, 
				pasien.no_rm, 
				dokter.id AS dokter_id, 
				dokter.nama AS dokter_nama, 
				dokter.id_poli, 
				poli.id AS poli_id, 
				poli.nama_poli, 
				jadwal_periksa.id AS jadwal_periksa_id, 
				jadwal_periksa.hari, 
				jadwal_periksa.jam_mulai, 
				jadwal_periksa.jam_selesai
			FROM daftar_poli
			JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id
			JOIN pasien ON daftar_poli.id_pasien = pasien.id
			JOIN dokter ON jadwal_periksa.id_dokter = dokter.id
			JOIN poli ON dokter.id_poli = poli.id
			WHERE jadwal_periksa.id_dokter = ?
		", [$id_dokter])->result_array();
	
		// Muat view dengan data pasien
		$this->load->view('v_periksa_pasien', $data);
	}

	public function detail_periksa_pasien() { 
		if ($this->session->userdata('role') !== 'dokter') {
			redirect('home');
			return;
		}
	
		$daftarpoli_id = $this->input->post('daftarPoliId'); // Ambil data dari POST
	
		// Ambil data pasien yang akan diperiksa
		$query = $this->db->query("
			SELECT 
				daftar_poli.id AS daftar_poli_id, 
				daftar_poli.keluhan, 
				daftar_poli.no_antrian, 
				daftar_poli.status, 
				daftar_poli.tanggal,
				pasien.id AS id_pasien, 
				pasien.nama AS nama_pasien, 
				pasien.no_rm
			FROM daftar_poli
			JOIN pasien ON daftar_poli.id_pasien = pasien.id
			WHERE daftar_poli.id = ?
		", [$daftarpoli_id]);
	
		$data['pasien'] = $query->row_array();
		$data['obat'] = $this->db->get('obat')->result_array();
	
		if ($data) {
			header('Content-Type: application/json');
			echo json_encode($data);
		} else {
			header('Content-Type: application/json');
			echo json_encode(['error' => 'Data pasien tidak ditemukan']);
		}
	}
	
	public function periksa_pasien(){
		$iddaftarpoli = $this->input->post('iddaftarpoli');
		$tanggal = $this->input->post('tanggal');
		$catatan = $this->input->post('catatan');
		$totalbiaya = $this->input->post('totalbiaya');
		$obatIds = $this->input->post('obat_ids'); // Array obatIds

		// Insert data ke tabel 'periksa'
		$data_periksa = array(
			'id_daftar_poli' => $iddaftarpoli,
			'tgl_periksa' => $tanggal,
			'catatan' => $catatan,
			'biaya_periksa' => $totalbiaya
		);
		if($this->db->insert('periksa', $data_periksa)){
			// Ambil id_periksa yang baru saja dimasukkan
			$id_periksa = $this->db->insert_id();
				
			// Insert data ke tabel 'detail_periksa' untuk setiap obat yang dipilih
			if (!empty($obatIds)) {
				foreach ($obatIds as $obatId) {
					$data_detail = array(
						'id_periksa' => $id_periksa,
						'id_obat' => $obatId
					);
					$this->db->insert('detail_periksa', $data_detail);
				}
			}

			$datas = array(
				'status' => 'Sudah diperiksa'
			);
			$where = array('id' => $iddaftarpoli);
			if($this->db->update('daftar_poli',$datas,$where)){
				// Kembalikan response sukses
				header('Content-Type: application/json');
				echo json_encode(['status' => 'oke']);
			}
			else{
				header('Content-Type: application/json');
				echo json_encode(['status' => 'gagal']);
			}
		}
	}
	
	public function detail_periksa($daftarpoli_id)
	{
		$data['user'] = $this->db->query("SELECT 
			user.id AS user_id, user.username, user.role,
			dokter.id AS dokter_id, dokter.nama, dokter.id_poli, 
			dokter.no_hp, dokter.alamat,
			poli.id AS poli_id, poli.nama_poli
			FROM user 
			JOIN dokter ON dokter.id_user = user.id
			JOIN poli ON dokter.id_poli = poli.id
			WHERE user.id = '".$this->session->userdata('id')."'")->row_array();
	

		$data['pasien'] = $this->db->query("
			SELECT 
				daftar_poli.id AS daftar_poli_id, 
				daftar_poli.keluhan, 
				daftar_poli.no_antrian, 
				daftar_poli.status, 
				daftar_poli.tanggal,
				periksa.id AS periksa_id, 
				periksa.id_daftar_poli, 
				periksa.tgl_periksa, 
				periksa.catatan, 
				periksa.biaya_periksa,
				pasien.id AS pasien_id, 
				pasien.nama AS nama_pasien, 
				pasien.no_rm,
				detail_periksa.id AS detail_periksa_id, 
				detail_periksa.id_periksa, 
				detail_periksa.id_obat
			FROM periksa
			JOIN daftar_poli ON periksa.id_daftar_poli = daftar_poli.id
			JOIN pasien ON daftar_poli.id_pasien = pasien.id
			JOIN detail_periksa ON periksa.id = detail_periksa.id_periksa
			WHERE periksa.id_daftar_poli = ?
		", [$daftarpoli_id])->row_array();

		$data['detail_periksa'] = $this->db->query("
			SELECT 
				daftar_poli.id AS daftar_poli_id, 
				daftar_poli.keluhan, 
				daftar_poli.no_antrian, 
				daftar_poli.status, 
				daftar_poli.tanggal,
				periksa.id AS periksa_id, 
				periksa.id_daftar_poli, 
				periksa.tgl_periksa, 
				periksa.catatan, 
				periksa.biaya_periksa,
				pasien.id AS pasien_id, 
				pasien.nama AS nama_pasien, 
				pasien.no_rm,
				detail_periksa.id AS detail_periksa_id, 
				detail_periksa.id_periksa, 
				detail_periksa.id_obat
			FROM periksa
			JOIN daftar_poli ON periksa.id_daftar_poli = daftar_poli.id
			JOIN pasien ON daftar_poli.id_pasien = pasien.id
			JOIN detail_periksa ON periksa.id = detail_periksa.id_periksa
			WHERE periksa.id_daftar_poli = ?
		", [$daftarpoli_id])->result_array();

		$data['obat'] = $this->db->get('obat')->result_array();
		$this->load->view('v_detail_periksa', $data);
	}

	public function update_periksa_pasien(){
		$iddaftarpoli = $this->input->post('iddaftarpoli');
		$tanggal = $this->input->post('tanggal');
		$catatan = $this->input->post('catatan');
		$totalbiaya = $this->input->post('totalbiaya');
		$obatIds = $this->input->post('obat_ids'); // Array obatIds
		
		// Update data ke tabel 'periksa'
		$data_periksa = array(
			'tgl_periksa' => $tanggal,
			'catatan' => $catatan,
			'biaya_periksa' => $totalbiaya
		);
		
		$where = array('id_daftar_poli' => $iddaftarpoli);
		
		if($this->db->update('periksa', $data_periksa, $where)) {
			$data_periksa = $this->db->get_where('periksa', ['id_daftar_poli'=>$iddaftarpoli])->row_array();
			// Hapus detail_periksa yang lama
			$this->db->delete('detail_periksa', array('id_periksa' => $data_periksa['id']));
			
			// Insert ulang data detail_periksa untuk obat yang dipilih
			if (!empty($obatIds)) {
				foreach ($obatIds as $obatId) {
					$data_detail = array(
						'id_periksa' => $data_periksa['id'],
						'id_obat' => $obatId
					);
					$this->db->insert('detail_periksa', $data_detail);
				}
			}
			header('Content-Type: application/json');
			echo json_encode(['status' => 'oke']);
		} else {
			header('Content-Type: application/json');
			echo json_encode(['status' => 'gagal']);
		}
	}

	public function	view_riwayat_pemeriksaan(){
		$data['user'] = $this->db->query("SELECT 
			user.id AS user_id, user.username, user.role,
			dokter.id AS dokter_id, dokter.nama, dokter.id_poli, 
			dokter.no_hp, dokter.alamat,
			poli.id AS poli_id, poli.nama_poli
			FROM user 
			JOIN dokter ON dokter.id_user = user.id
			JOIN poli ON dokter.id_poli = poli.id
			WHERE user.id = '".$this->session->userdata('id')."'")->row_array();
	
		// Validasi apakah data dokter ditemukan
		if (!$data['user']) {
			show_error('Data dokter tidak ditemukan.', 404);
			return;
		}
	
		// Ambil ID dokter
		$id_dokter = $data['user']['dokter_id'];
	
		// Query manual untuk mengambil data pasien
		$query = $this->db->query("
			SELECT 
				pasien.no_rm, 
				pasien.id AS pasien_id, 
				pasien.nama AS pasien_nama,
				MAX(daftar_poli.id) AS daftar_poli_id, 
				MAX(daftar_poli.keluhan) AS keluhan, 
				MAX(daftar_poli.no_antrian) AS no_antrian, 
				MAX(daftar_poli.status) AS status, 
				MAX(daftar_poli.tanggal) AS tanggal, 
				MAX(dokter.id) AS dokter_id, 
				MAX(dokter.nama) AS dokter_nama, 
				MAX(poli.id) AS poli_id, 
				MAX(poli.nama_poli) AS poli_nama, 
				MAX(jadwal_periksa.id) AS jadwal_periksa_id, 
				MAX(jadwal_periksa.hari) AS hari, 
				MAX(jadwal_periksa.jam_mulai) AS jam_mulai, 
				MAX(jadwal_periksa.jam_selesai) AS jam_selesai
			FROM daftar_poli
			JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id
			JOIN pasien ON daftar_poli.id_pasien = pasien.id
			JOIN dokter ON jadwal_periksa.id_dokter = dokter.id
			JOIN poli ON dokter.id_poli = poli.id
			WHERE jadwal_periksa.id_dokter = ?
			AND daftar_poli.status = 'Sudah diperiksa'
			GROUP BY pasien.no_rm, pasien.id
			ORDER BY pasien.nama ASC
		", [$id_dokter]);
	
		// Masukkan hasil query ke dalam $data['list_pasien']
		$data['list_pasien'] = $query->result_array();
	
		// Load view dengan data pasien
		$this->load->view('v_riwayat_periksa', $data);
	}

	public function view_detail_riwayat($idpasien){
		if ($this->session->userdata('role') !== 'dokter') {
			redirect('auth');
			return;
		}else{
			$data['user'] = $this->db->query("SELECT 
				user.id AS user_id, user.username, user.role,
				dokter.id AS dokter_id, dokter.nama, dokter.id_poli, 
				dokter.no_hp, dokter.alamat,
				poli.id AS poli_id, poli.nama_poli
				FROM user 
				JOIN dokter ON dokter.id_user = user.id
				JOIN poli ON dokter.id_poli = poli.id
				WHERE user.id = '".$this->session->userdata('id')."'")->row_array();
		
			$dokter_id = $data['user']['dokter_id'];
			$this->db->select('
				daftar_poli.id AS daftar_poli_id, daftar_poli.id_pasien, daftar_poli.id_jadwal, daftar_poli.keluhan, daftar_poli.tanggal AS tanggal_daftar_poli,
				jadwal_periksa.id AS jadwal_periksa_id, jadwal_periksa.id_dokter, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai,
				pasien.id AS pasien_id, pasien.nama, pasien.no_rm, pasien.alamat AS alamat_pasien,
				MAX(periksa.id) AS periksa_id, MAX(periksa.id_daftar_poli) AS periksa_id_daftar_poli, MAX(periksa.tgl_periksa) AS tgl_periksa,
				MAX(periksa.catatan) AS catatan, MAX(periksa.biaya_periksa) AS biaya_periksa,
				GROUP_CONCAT(obat.nama_obat ORDER BY obat.nama_obat ASC SEPARATOR ", ") AS obat_list,  
				MAX(obat.id) AS obat_id, MAX(obat.kemasan) AS kemasan, MAX(obat.harga) AS harga,
				MAX(dokter.id) AS dokter_id, dokter.id_poli, 
				MAX(poli.id) AS poli_id, MAX(poli.nama_poli) AS poli_nama
			');
			$this->db->from('daftar_poli');
			$this->db->join('pasien', 'daftar_poli.id_pasien = pasien.id');
			$this->db->join('jadwal_periksa', 'daftar_poli.id_jadwal = jadwal_periksa.id');
			$this->db->join('dokter', 'jadwal_periksa.id_dokter = dokter.id');
			$this->db->join('poli', 'dokter.id_poli = poli.id');
			$this->db->join('periksa', 'daftar_poli.id = periksa.id_daftar_poli', 'left');
			$this->db->join('detail_periksa', 'periksa.id = detail_periksa.id_periksa', 'left');
			$this->db->join('obat', 'detail_periksa.id_obat = obat.id', 'left');

			$this->db->where('daftar_poli.id_pasien', $idpasien);
			$this->db->where('jadwal_periksa.id_dokter', $dokter_id);
			$this->db->group_by('daftar_poli.id');
			$this->db->order_by('daftar_poli.tanggal', 'DESC');

			$query = $this->db->get();

			// Hasil query untuk detail riwayat pasien
			$data['result_detail_riwayat_pasien'] = $query->result_array(); // Semua riwayat pasien
			$data['row_detail_riwayat_pasien'] = $query->row_array();
			
			// Mengambil data obat berdasarkan daftar poli
			$iddaftarpoli = $data['row_detail_riwayat_pasien']['daftar_poli_id'];
			$query_obat = $this->db->query("
				SELECT 
					obat.id AS obat_id, 
					obat.nama_obat, 
					obat.harga, 
					obat.kemasan
				FROM detail_periksa
				JOIN obat ON detail_periksa.id_obat = obat.id
				WHERE detail_periksa.id_periksa IN (
					SELECT id FROM periksa WHERE id_daftar_poli = ?
				)
			", [$iddaftarpoli]);

			$data['obat'] = $query_obat->result_array();
			$this->load->view('v_detail_riwayat', $data);
		}
	}

	public function get_detail_pasien_riwayat(){
        if($this->session->userdata('role')==='pasien'){
            $id_daftar_poli = $this->input->post('daftar_poli_id');
            $data['detail_periksa'] = $this->mymodel->get_detail_periksa_pasien_by_id_daftar_poli_for_pasien($id_daftar_poli);
            $data['obat'] = $this->mymodel->get_detail_periksa_obat_pasien_by_id_daftar_poli_for_pasien($id_daftar_poli);
            echo json_encode($data);
        }
        else{
            redirect('auth');
        }
    }


}