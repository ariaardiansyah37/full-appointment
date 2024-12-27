<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model{

    public function nomor_rm_generator() {
        // Ambil tahun dan bulan sekarang dalam format YYYYMM
        $tahun_bulan = date('Ym');
    
        // Hitung jumlah pasien yang sudah memiliki nomor RM dengan prefix tahun-bulan yang sama
        $this->db->like('no_rm', $tahun_bulan . '-', 'after'); // Format pencarian: "YYYYMM-"
        $this->db->from('pasien');
        $jumlah_pasien = $this->db->count_all_results(); // Menghitung jumlah hasil
    
        // Nomor urut berikutnya (dimulai dari 1 jika belum ada data)
        $posisi_data = $jumlah_pasien + 1;
    
        // Format nomor urut menjadi 3 digit dengan padding nol di depan
        $posisi_data_padded = str_pad($posisi_data, 3, '0', STR_PAD_LEFT);
    
        // Gabungkan tahun-bulan dan nomor urut untuk membentuk nomor RM
        $norm = sprintf('%s-%s', $tahun_bulan, $posisi_data_padded);
    
        return $norm;
    }
    

    public function get_data_dokter_with_poli(){
        $this->db->select('dokter.*, poli.id AS idpoli, poli.nama_poli');
        $this->db->from('dokter');
        $this->db->join('poli', 'dokter.id_poli = poli.id');
        return $this->db->get()->result_array();
    }

    public function get_where_data_dokter_and_poli($target){
        $this->db->select('dokter.*, poli.id AS poli_id, poli.nama_poli');
        $this->db->from('dokter');
        $this->db->join('poli', 'dokter.id_poli = poli.id');
        $this->db->where('dokter.id', $target['id']);
        return $this->db->get()->row_array();
    }

    public function nomor_antrian($id_jadwal, $tanggal) {
        $this->db->where('id_jadwal', $id_jadwal); // Cek id_jadwal
        $this->db->from('daftar_poli');
        $jumlah_pendaftar = $this->db->count_all_results(); // Menghitung jumlah pendaftar yang sudah terdaftar dengan id_jadwal dan tanggal yang sama
        
        // Posisi antrian adalah jumlah pendaftar + 1
        $no_antrian = $jumlah_pendaftar + 1;
        
        return $no_antrian;
    }

    public function ambil_dokter_dan_poli($target){
        $this->db->select('dokter.*, poli.id AS poli_id, poli.nama_poli');
        $this->db->from('dokter');
        $this->db->join('poli', 'dokter.id_poli = poli.id');
        $this->db->where('dokter.id_user', $target);
        return $this->db->get()->row_array();
    }

    public function ambil_riwayat_poli($idpasien){
        $this->db->select('
        daftar_poli.id AS daftar_poli_id, daftar_poli.keluhan, daftar_poli.no_antrian, daftar_poli.status, daftar_poli.tanggal,
        pasien.id AS pasien_id, pasien.nama AS pasien_nama, pasien.no_rm, 
        dokter.id AS dokter_id, dokter.nama AS dokter_nama, dokter.id_poli, 
        poli.id AS poli_id, poli.nama_poli, 
        jadwal_periksa.id, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai');
        $this->db->from('daftar_poli');
        $this->db->join('jadwal_periksa', 'daftar_poli.id_jadwal = jadwal_periksa.id');
        $this->db->join('pasien', 'daftar_poli.id_pasien = pasien.id');
        $this->db->join('dokter', 'jadwal_periksa.id_dokter = dokter.id');
        $this->db->join('poli', 'dokter.id_poli = poli.id');
        $this->db->where('daftar_poli.id_pasien', $idpasien);
        return $this->db->get()->result_array();
    }

    public function ambil_data_jadwal_dokter($idpoli){
        $this->db->select('dokter.nama, jadwal_periksa.id, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, jadwal_periksa.status');
        $this->db->from('dokter');
        $this->db->join('jadwal_periksa','dokter.id = jadwal_periksa.id_dokter');
        $this->db->where('dokter.id_poli',$idpoli);
        $this->db->where('jadwal_periksa.status','aktif');
        return $this->db->get()->result_array();
    }

    public function get_detail_periksa_pasien_by_id_daftar_poli_for_pasien($iddaftarpoli){
        $this->db->select('
        daftar_poli.id AS daftar_poli_id, daftar_poli.keluhan, daftar_poli.no_antrian, daftar_poli.status, daftar_poli.tanggal,
        poli.id AS poli_id, poli.nama_poli, dokter.id AS dokter_id, dokter.nama AS dokter_nama, jadwal_periksa.id,jadwal_periksa.id_dokter,
        periksa.id AS periksa_id, periksa.id_daftar_poli, periksa.tgl_periksa, periksa.catatan, periksa.biaya_periksa,
        pasien.id AS pasien_id, pasien.nama AS pasien_nama, pasien.no_rm,
        detail_periksa.id AS detail_periksa_id, detail_periksa.id_periksa, detail_periksa.id_obat');
        $this->db->from('periksa');
        $this->db->join('daftar_poli', 'periksa.id_daftar_poli = daftar_poli.id');
        $this->db->join('pasien', 'daftar_poli.id_pasien = pasien.id');
        $this->db->join('detail_periksa', 'periksa.id = detail_periksa.id_periksa');
        $this->db->join('jadwal_periksa', 'daftar_poli.id_jadwal= jadwal_periksa.id');
        $this->db->join('dokter', 'jadwal_periksa.id_dokter = dokter.id');
        $this->db->join('poli', 'dokter.id_poli = poli.id');
        $this->db->where('periksa.id_daftar_poli', $iddaftarpoli);
        return $this->db->get()->row_array();
    }

    public function get_detail_periksa_obat_pasien_by_id_daftar_poli_for_pasien($iddaftarpoli){
        $this->db->select('
        daftar_poli.id AS daftar_poli_id, daftar_poli.keluhan, daftar_poli.no_antrian, daftar_poli.status, daftar_poli.tanggal,
        poli.id AS poli_id, poli.nama_poli, dokter.id AS dokter_id, dokter.nama AS dokter_nama, jadwal_periksa.id,jadwal_periksa.id_dokter,
        periksa.id AS periksa_id, periksa.id_daftar_poli, periksa.tgl_periksa, periksa.catatan, periksa.biaya_periksa,
        pasien.id AS pasien_id, pasien.nama AS pasien_nama, pasien.no_rm,
        detail_periksa.id_obat, obat.id AS obat_id, obat.nama_obat, obat.harga, obat.kemasan,
        detail_periksa.id AS detail_periksa_id, detail_periksa.id_periksa, detail_periksa.id_obat');
        $this->db->from('periksa');
        $this->db->join('daftar_poli', 'periksa.id_daftar_poli = daftar_poli.id');
        $this->db->join('pasien', 'daftar_poli.id_pasien = pasien.id');
        $this->db->join('detail_periksa', 'periksa.id = detail_periksa.id_periksa');
        $this->db->join('jadwal_periksa', 'daftar_poli.id_jadwal= jadwal_periksa.id');
        $this->db->join('dokter', 'jadwal_periksa.id_dokter = dokter.id');
        $this->db->join('poli', 'dokter.id_poli = poli.id');
        $this->db->join('obat', 'detail_periksa.id_obat = obat.id');
        $this->db->where('periksa.id_daftar_poli', $iddaftarpoli);
        return $this->db->get()->result_array();
    }

}