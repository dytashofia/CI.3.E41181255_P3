<?php
class Crud extends CI_Controller{

    /*
    | Yang dipanggil pertama kali adalah m_data, karena pada m_data terletak operasi database
    | Yang kedua adalah mengaktifkan helper url, agar url yang diakses bisa terbaca
    */
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
                $this->load->helper('url');
    }
    
    /*
    | Pada index, merupakan syntax yang akan di parsing ke view dengan mengambil data dari database
    | 
    */
    	function index(){
		$data['user'] = $this->m_data->tampil_data()->result();
		$this->load->view('view_tampil',$data);
    }
    /* 
    | Method yang berfungsi untuk menampilkan view_input
    */
    	function tambah(){
		$this->load->view('view_input');
    }
    
    /*
    | Berfungsi sebagai method aksi ketika data telah di inputkan
    |
    */

	function tambah_aksi(){
        //menangkap inputan dari form
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');
        
        //data disimpan dalam bentuk array
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
            );
        
        // menginputkan database menggunakan model m_data
        // tujuan inputannya adalah ke tabel user
        $this->m_data->input_data($data,'user');
        
        // mengembaliken atau mengalihkan ke ethod index
		redirect('crud/index');
    }
    
    // method yang berfungsi untuk menghapus data yang di inputkan pada tabel user
    function hapus($id){
        // id digunakan untuk menerima data berdasarkan id yang dikirim melalui url dari link hapus
        $where = array('id' => $id);
		$this->m_data->hapus_data($where,'user');
		redirect('crud/index');
    }
    
    // methid untuk mengedit data yang mengambil dari id 
    function edit($id){
        $where = array('id' => $id);
        //fungsi result adalah untuk mengger=nerate hasil query menjadi array
	    $data['user'] = $this->m_data->edit_data($where,'user')->result(); //
	    $this->load->view('view_edit',$data);  
    }

    
    // method yang berfungsi untuk update data
    function update(){
    
    // menangkap data dari form edit
	$id = $this->input->post('id');
	$nama = $this->input->post('nama');
	$alamat = $this->input->post('alamat');
	$pekerjaan = $this->input->post('pekerjaan');
 
    // data disimpan dalam bentuk array
	$data = array(
		'nama' => $nama,
		'alamat' => $alamat,
		'pekerjaan' => $pekerjaan
	);
 
    // sebagai penentu id mana yang akan diedit
	$where = array(
		'id' => $id
	);
 
    // melakukan update data
	$this->m_data->update_data($where,$data,'user');
	redirect('crud/index');
}
}
