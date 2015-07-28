<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class produk extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://pandawamultitech.co.id
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("produk", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_produk'] = "active";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$filter['nama'] = $this->session->userdata("by_judul");
			$d['data_retrieve'] = $this->app_global_superadmin_model->generate_index_produk($this->config->item("limit_item"),$uri,$filter);
			
			$this->load->view('bg_header',$d);
			$this->load->view('produk/bg_home');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function tambah()
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("produk", base_url().'superadmin/produk');
			$this->breadcrumb->append_crumb("Input Produk", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_produk'] = "active";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['id_kategori'] = "";
			$d['nama'] = "";
			$d['deskripsi'] = "";
			$d['tipe_p'] = "";
			$d['harga'] = "";
			$d['harga_beli'] = "";
			$d['stok'] = "";
			$d['diskon'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
			$this->load->view('bg_header',$d);
			$this->load->view('produk/bg_input');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function edit($id_param)
   {
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$this->breadcrumb->append_crumb('Dashboard', base_url().'superadmin');
			$this->breadcrumb->append_crumb("produk", base_url().'superadmin/produk');
			$this->breadcrumb->append_crumb("Update produk", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_produk'] = "active";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$where['id_produk'] = $id_param;
			$get = $this->db->get_where("dlmbg_produk",$where)->row();
			
			$d['nama'] = $get->judul;
			$d['deskripsi'] = $get->isi;
			
			$d['id_param'] = $get->id_multi_produk;
			$d['tipe'] = "edit";
			
			$this->load->view('bg_header',$d);
			$this->load->view('produk/bg_input');
			$this->load->view('bg_footer');
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function simpan()
   {

		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$tipe = $this->input->post("s_tipe");
			$id['id_produk'] = $this->input->post("id_param");
			
			if($tipe=="Tambah")
			{
				
				$config['upload_path'] = './asset/images/produk/';
				$config['allowed_types']= 'gif|jpg|png|jpeg';
				$config['encrypt_name']	= TRUE;
				$config['remove_spaces']	= TRUE;	
				$config['max_size']     = '3000';
				$config['max_width']  	= '3000';
				$config['max_height']  	= '3000';
		 
				$this->load->library('upload', $config);
				
				//var_dump($this->upload->do_upload("userfile")); exit;
				
				if ($this->upload->do_upload("userfile")) {
					$data	 	= $this->upload->data();
					
					
		 
					/* PATH */
					$source             = "./asset/images/produk/".$data['file_name'] ;
					$destination_thumb	= "./asset/images/produk/thumb/" ;
					$destination_medium	= "./asset/images/produk/medium/" ;
		 
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
					$limit_thumb    = 200 ;
		 
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
					
					$in['filegambar'] = $data['file_name'];
					$in['nama'] = $this->input->post("nama");
					$in['deskripsi'] = $this->input->post("deskripsi");
					$in['harga'] = $this->input->post("harga");
					$in['harga_beli'] = $this->input->post("harga_beli");
					$in['stok'] = $this->input->post("stok");
					$in['diskon'] = $this->input->post("diskon");
					$in['tipe'] = $this->input->post("tipe");
					$in['tanggal'] = time()+3600*7;
					$in['id_user'] = $this->session->userdata("id_admin_super");
					$in['id_kategori'] = $this->input->post("kategori");
					$in['dijual'] = "1";
					
					$this->db->insert("dlmbg_produk",$in);
					echo mysql_error();
			
					unlink($source);
					
					redirect("superadmin/produk/index/".$this->input->post("id_produk")."");
					
				}
				else 
				{
					echo $this->upload->display_errors('<p>','</p>');
				}
					
			}
			else if($tipe=="Edit")
			{
				$in['nama'] = $this->input->post("nama");
				$in['deskripsi'] = $this->input->post("deskripsi");
				
				$this->db->update("dlmbg_produk",$in,$id);
			}
			
			redirect("superadmin/produk");
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
	public function set()
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$sess['by_judul'] = $this->input->post("by_judul");
			$this->session->set_userdata($sess);
			redirect("superadmin/produk");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$where['id_produk'] = $id_param;
			$this->db->delete("dlmbg_produk",$where);
			redirect("superadmin/produk");
		}
		else
		{
			redirect("web");
		}
   }
 
	public function approve($id_param,$value)
	{
		if($this->session->userdata("logged_in")!="" && $this->session->userdata("tipe_user")=="superadmin")
		{
			$id['id_multi_produk'] = $id_param;
			$up['stts'] = $value;
			$this->db->update("dlmbg_multi_produk",$up,$id);
			redirect("superadmin/produk");
		}
		else
		{
			redirect("web");
		}
   }
}
 
/* End of file superadmin.php */
