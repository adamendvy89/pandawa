<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_sekolah extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://pandawamultitech.co.id
	 **/
 
   public function index($uri=0)
   {
      $d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','nav','sixteen columns');
      $d['menu_bawah'] = $this->app_global_model->generate_menu_top('0','bawah',$h='');
      $d['dt_bidang'] = $this->app_global_model->generate_menu_bidang();
      $d['dt_link'] = $this->app_global_model->generate_menu_link_terkait();
      $d['dt_pengumuman'] = $this->app_global_model->generate_menu_pengumuman($_SESSION['limit_sidebar_pengumuman'],0);
      $d['dt_produk'] = $this->app_global_model->generate_menu_produk($_SESSION['limit_sidebar_produk'],0);
      $d['dt_polling'] = $this->app_global_model->generate_menu_polling();
      $d['dt_statistik'] = $this->app_global_model->generate_menu_statistik();
      $d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
      $d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
      $d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
      $d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);

      $this->breadcrumb->append_crumb('Beranda', base_url());
      $this->breadcrumb->append_crumb('Indexs Data Sekolah', '/');

      $d['dt_kecamatan_dropdown'] = $this->db->get("dlmbg_super_kecamatan");
      $d['dt_pendidikan_dropdown'] = $this->db->get("dlmbg_super_jenjang_pendidikan");
	  $filter['id_jenjang_pendidikan'] = $this->session->userdata("by_id_jenjang_pendidikan");
	  $filter['id_kecamatan'] = $this->session->userdata("by_id_kecamatan");
      $d['dt_index_data_sekolah'] = $this->app_global_model->generate_index_data_sekolah($this->config->item("limit_item_big"),$uri,$filter);

      $this->load->view($_SESSION['site_theme'].'/bg_header',$d);
      if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
      $this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
      $this->load->view($_SESSION['site_theme'].'/bg_left');
      $this->load->view($_SESSION['site_theme'].'/data_sekolah/bg_home');
      $this->load->view($_SESSION['site_theme'].'/bg_right');
      $this->load->view($_SESSION['site_theme'].'/bg_footer');
   }
 
   public function profil($id_param)
   {
      $where['id_sekolah_profil'] = $id_param;
      $get_data = $this->db->get_where("dlmbg_sekolah_profil",$where);
      $ret_data = $get_data->row();
      if($get_data->num_rows()>0)
      {
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Indexs Data Sekolah', base_url().'web/data_sekolah');
			$this->breadcrumb->append_crumb($ret_data->nama_sekolah, '/');

			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','nav','sixteen columns');
			$d['menu_bawah'] = $this->app_global_model->generate_menu_top('0','bawah',$h='');
			$d['dt_bidang'] = $this->app_global_model->generate_menu_bidang();
			$d['dt_link'] = $this->app_global_model->generate_menu_link_terkait();
			$d['dt_pengumuman'] = $this->app_global_model->generate_menu_pengumuman($_SESSION['limit_sidebar_pengumuman'],0);
			$d['dt_produk'] = $this->app_global_model->generate_menu_produk($_SESSION['limit_sidebar_produk'],0);
			$d['dt_polling'] = $this->app_global_model->generate_menu_polling();
			$d['dt_statistik'] = $this->app_global_model->generate_menu_statistik();
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);

			$d['nama_sekolah'] = $ret_data->nama_sekolah;
			$d['id_sekolah'] = $ret_data->id_sekolah_profil;
      		$d['dt_data_sekolah'] = $this->app_global_model->generate_detail_data_sekolah($id_param);

			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/bg_left');
			$this->load->view($_SESSION['site_theme'].'/data_sekolah/bg_dashboard');
			$this->load->view($_SESSION['site_theme'].'/bg_right');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
      }
      else
      {
	      	redirect(base_url());
      }
   }
 
   public function set()
   {
      $sess['by_id_kecamatan'] = 'semua';
      $sess['by_id_jenjang_pendidikan'] = $this->input->post("id_jenjang_pendidikan");
	  $this->session->set_userdata($sess);
	  redirect("web/data_sekolah");
   }
}
 
/* End of file berita.php */
