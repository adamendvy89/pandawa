<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bidang extends MX_Controller {

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
	  $this->breadcrumb->append_crumb('Bidang', '/');
      $d['dt_index_bidang'] = $this->app_global_model->generate_menu_bidang();

      $this->load->view($_SESSION['site_theme'].'/bg_header',$d);
      if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
      $this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
      $this->load->view($_SESSION['site_theme'].'/bg_left');
      $this->load->view($_SESSION['site_theme'].'/bidang/bg_home');
      $this->load->view($_SESSION['site_theme'].'/bg_right');
      $this->load->view($_SESSION['site_theme'].'/bg_footer');
   }
 
   public function profil($id_param)
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
	  
	  $where['id_super_bidang'] = $id_param;
	  $get = $this->db->get_where("dlmbg_super_bidang",$where);
	  if($get->num_rows()==0)
	  {
	  	redirect(base_url());
	  }
	  $get_data = $get->row();
	  
	  $d['bidang'] = $get_data->bidang;
	  $d['id_super_bidang'] = $get_data->id_super_bidang;

      $this->breadcrumb->append_crumb('Beranda', base_url());
	  $this->breadcrumb->append_crumb('Bidang', base_url().'web/bidang');
	  $this->breadcrumb->append_crumb($get_data->bidang, '/');

      $this->load->view($_SESSION['site_theme'].'/bg_header',$d);
      if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
      $this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
      $this->load->view($_SESSION['site_theme'].'/bg_left');
      $this->load->view($_SESSION['site_theme'].'/bidang/bg_dashboard');
      $this->load->view($_SESSION['site_theme'].'/bg_right');
      $this->load->view($_SESSION['site_theme'].'/bg_footer');
   }
}
 
/* End of file berita.php */
