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
			
			$filter['judul'] = $this->session->userdata("by_judul");
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
			$this->breadcrumb->append_crumb("Input produk", '/');
			
			$d['aktif_artikel_sekolah'] = "";
			$d['aktif_galeri_sekolah'] = "";
			$d['aktif_berita'] = "";
			$d['aktif_pengumuman'] = "";
			$d['aktif_produk'] = "active";
			$d['aktif_buku_tamu'] = "";
			$d['aktif_list_download'] = "";
			
			$d['judul'] = "";
			$d['isi'] = "";
			
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
			
			$where['id_multi_produk'] = $id_param;
			$get = $this->db->get_where("dlmbg_multi_produk",$where)->row();
			
			$d['judul'] = $get->judul;
			$d['isi'] = $get->isi;
			
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
			$tipe = $this->input->post("tipe");
			$id['id_multi_produk'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['judul'] = $this->input->post("judul");
				$in['isi'] = $this->input->post("isi");
				$in['tanggal'] = time()+3600*7;
				$in['id_user'] = $this->session->userdata("id_admin_super");
				$in['id_bidang'] = $this->session->userdata("id_bidang");
				$in['tipe_user'] = "superadmin";
				$in['stts'] = "0";
				
				$this->db->insert("dlmbg_multi_produk",$in);
			}
			else if($tipe=="edit")
			{
				$in['judul'] = $this->input->post("judul");
				$in['isi'] = $this->input->post("isi");
				
				$this->db->update("dlmbg_multi_produk",$in,$id);
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
			$where['id_multi_produk'] = $id_param;
			$this->db->delete("dlmbg_multi_produk",$where);
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
