<?php 

// Berfungsi untuk mengambil data dari database, yang kemudian akan ditampilkan melalui view
class M_data extends CI_Model{
	function tampil_data(){
		return $this->db->get('user'); //mendapatkan data dari database di tabel user
    }
    
    // Berfungsi untuk menginputkan data dari array data dan di inputkan ke tabel
    function input_data($data,$table){
	    $this->db->insert($table,$data);
    }

    // berfungsi untuk menghapus data berdasarkan id yang disimpan dalam array where dari tabel    
    function hapus_data($where,$table){
	$this->db->where($where);
    $this->db->delete($table);
    }

    // Berfungsi edit data
    function edit_data($where,$table){		
	return $this->db->get_where($table,$where);
    }

    //function untuk update data
    function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

}