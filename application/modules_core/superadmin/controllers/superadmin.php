<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class superadmin extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://pandawamultitech.co.id
	 **/
 
   public function index()
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_produk'] = "";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$this->load->view('bg_header',$d);
			$this->load->view('bg_home');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
}
 
/* End of file superadmin.php */
