<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// mengekstensi class benda pada CI Controler
class Benda extends CI_Controller {
	
	public function warna(){		
		echo "Mobil itu berwarna " . $this->uri->segment('3'); // menuju kepada segmen 3
		
	}
 
}