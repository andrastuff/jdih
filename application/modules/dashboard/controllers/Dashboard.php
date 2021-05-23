<?php defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends Backend_Controller
{

    public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
			
		}
		$this->load->model('websetting/Websetting_model');
		$this->load->model('artikel/Artikel_model');
		$this->load->model('halaman/Halaman_model');
		$this->load->model('perundangan/Perundangan_model');
	}
    public function index()
    {
        $data['content'] = 'dashboard/index';
		$data['meta'] 	= $this->Websetting_model->get_all();
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['count_artikel'] 	= $this->Artikel_model->count_all(null);
		$data['count_halaman'] 	= $this->Halaman_model->count_all(null);
		$data['count_perundangan'] 	= $this->Perundangan_model->count_all(null);
		$data['js_script'] = 'dashboard/js/js';
		
        $this->load->view('template/backend/header', $data, FALSE);
        $this->load->view('template/backend/index', $data, FALSE);
    }
}

/* End of file Admin_dashboard.php */
