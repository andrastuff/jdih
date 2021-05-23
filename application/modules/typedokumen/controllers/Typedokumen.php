<?php defined('BASEPATH') or exit('No direct script access allowed');
class Typedokumen extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
		if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $this->load->model('Typedokumen_model');
    }
    public function index()
    {
        $data['header'] = array(
			'stylesheets'	=> array(
				'',
            ),
        );
        $data['content'] = 'typedokumen/html/index';
        $data['footer'] = array(
			'javascripts' => array(
				'',
			),
			'scripts'	=> array(
				$this->load->view('typedokumen/views/js/datatables'),
			)
		);
		
        $this->load->view('template/backend/html/index', $data);
    }
    /**
	 *Data Services 
	 **/
    public function api_list_all()
    {

		$result 	= $this->Typedokumen_model->get_all_where(['parent_id' => '0']);

		$data['data'] = $result;

        if ($data) {
            $this->output->set_status_header(200);
            echo json_encode($data);
        } else {
            $this->output->set_status_header(404);
            echo json_encode([
                'status' => FALSE,
                'message' => 'No users were found'
            ]); 
        }
    
    }
	
	public function api_list_all_turunan()
    {
		$id			= $this->input->get('id');
		$result 	= $this->Typedokumen_model->get_all_turunan_where(['second_id' => $id]);

		$data['data'] = $result;

        if ($data) {
            $this->output->set_status_header(200);
            echo json_encode($data);
        } else {
            $this->output->set_status_header(404);
            echo json_encode([
                'status' => FALSE,
                'message' => 'No users were found'
            ]); 
        }
    
    }
	
    public function edit()
    {
       
    }
    public function delete()
    {
       
    }
    public function get_by_id()
    {
       
    }
}