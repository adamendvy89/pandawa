<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class galeri_sekolah extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://pandawamultitech.co.id
	 **/
 
	public function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'operator/dashboard');
			$this->breadcrumb->append_crumb("List Download", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','nav','sixteen columns');
			$d['menu_bawah'] = $this->app_global_model->generate_menu_top('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$filter['judul'] = $this->session->userdata("by_judul");
			$d['dt_galeri_sekolah'] = $this->app_global_operator_model->generate_index_galeri_sekolah($this->config->item("limit_item_big"),$uri,$filter);
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/operator/galeri_sekolah/bg_home');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
	}
 
	public function tambah()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'operator/dashboard');
			$this->breadcrumb->append_crumb("List Download", base_url().'operator/galeri_sekolah');
			$this->breadcrumb->append_crumb("Tambah Data", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','nav','sixteen columns');
			$d['menu_bawah'] = $this->app_global_model->generate_menu_top('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$d['judul'] = "";
			$d['gambar'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/operator/galeri_sekolah/bg_input');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
   }
 
	public function edit($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Dashboard', base_url().'operator/dashboard');
			$this->breadcrumb->append_crumb("List Download", base_url().'operator/galeri_sekolah');
			$this->breadcrumb->append_crumb("Edit Data", '/');
			
			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','nav','sixteen columns');
			$d['menu_bawah'] = $this->app_global_model->generate_menu_top('0','bawah',$h='');
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
			
			$where['id_sekolah_galeri_sekolah'] = $id_param;
			$where['id_sekolah'] = $this->session->userdata("id_sekolah");
			$get = $this->db->get_where("dlmbg_sekolah_galeri_sekolah",$where)->row();
			
			$d['judul'] = $get->judul;
			$d['gambar'] = $get->gambar;
			
			$d['id_param'] = $get->id_sekolah_galeri_sekolah;
			$d['tipe'] = "edit";
			
			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/operator/galeri_sekolah/bg_input');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
		}
		else
		{
			redirect("web");
		}
   }
 
	public function simpan()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$tipe = $this->input->post("tipe");
			$id['id_sekolah_galeri_sekolah'] = $this->input->post("id_param");
			$id['id_sekolah'] = $this->session->userdata("id_sekolah");
			
			if($tipe=="tambah")
			{
				$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
				
				if ($this->form_validation->run() == FALSE)
				{
					$this->tambah();
				}
				else
				{
					$config['upload_path'] = './asset/images/galeri-sekolah/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./asset/images/galeri-sekolah/".$data['file_name'] ;
						$destination_thumb	= "./asset/images/galeri-sekolah/thumb/" ;
						$destination_medium	= "./asset/images/galeri-sekolah/medium/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 800 ;
						$limit_thumb    = 250 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
	 
						////// Making MEDIUM /////////////
						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['gambar'] = $data['file_name'];
						$in_data['judul'] = $this->input->post("judul");
						$in_data['id_admin_sekolah'] = $this->session->userdata("id_admin_sekolah");
						$in_data['id_sekolah'] = $this->session->userdata("id_sekolah");
						$in_data['stts'] = "0";
						$this->db->insert("dlmbg_sekolah_galeri_sekolah",$in_data);
				
						unlink($source);
						
						redirect("operator/galeri_sekolah");
						
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
				}
			}
			else if($tipe=="edit")
			{
				if(empty($_FILES['userfile']['name']))
				{
					$in_data['judul'] = $this->input->post("judul");
					$in_data['id_admin_sekolah'] = $this->session->userdata("id_admin_sekolah");
					$in_data['id_sekolah'] = $this->session->userdata("id_sekolah");
					$this->db->update("dlmbg_sekolah_galeri_sekolah",$in_data,$id);
					redirect("operator/galeri_sekolah");
				}
				else
				{
					$config['upload_path'] = './asset/images/galeri-sekolah/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./asset/images/galeri-sekolah/".$data['file_name'] ;
						$destination_thumb	= "./asset/images/galeri-sekolah/thumb/" ;
						$destination_medium	= "./asset/images/galeri-sekolah/medium/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 800 ;
						$limit_thumb    = 250 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
	 
						////// Making MEDIUM /////////////
						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['gambar'] = $data['file_name'];
						$in_data['judul'] = $this->input->post("judul");
						$in_data['id_admin_sekolah'] = $this->session->userdata("id_admin_sekolah");
						$in_data['id_sekolah'] = $this->session->userdata("id_sekolah");
						$this->db->update("dlmbg_sekolah_galeri_sekolah",$in_data,$id);
				
						$old_thumb	= "./asset/images/galeri-sekolah/thumb/".$this->input->post("gambar")."" ;
						$old_medium	= "./asset/images/galeri-sekolah/medium/".$this->input->post("gambar")."" ;
						unlink($source);
						unlink($old_thumb);
						unlink($old_medium);
						
						redirect("operator/galeri_sekolah");
						
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
				}
			}
		}
		else
		{
			redirect("web");
		}
   }
 
	public function set()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$sess['by_judul'] = $this->input->post("by_judul");
			$this->session->set_userdata($sess);
			redirect("operator/galeri_sekolah");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_param,$file)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="operator")
		{
			$path = "./asset/images/galeri-sekolah/medium/".$file."";
			$path_thumb = "./asset/images/galeri-sekolah/thumb/".$file."";
			unlink($path);
			unlink($path_thumb);
			$where['id_sekolah_galeri_sekolah'] = $id_param;
			$where['id_sekolah'] = $this->session->userdata("id_sekolah");
			$this->db->delete("dlmbg_sekolah_galeri_sekolah",$where);
			redirect("operator/galeri_sekolah");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file berita.php */
