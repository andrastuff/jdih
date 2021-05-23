<?php defined('BASEPATH') or exit('No direct script access allowed');
class Artikeltag extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Artikeltag_model');
    }
    public function index()
    {
        $data['title'] = 'Tags Artikel';
        $data['content'] = 'artikeltag/html/index';
        $data['footer'] = array(
				base_url('assets/themes/backend/inspina/js/plugins/dataTables/datatables.min.js'),
				base_url('assets/themes/backend/inspina/js/plugins/dataTables/dataTables.bootstrap4.min.js'),
				base_url('assets/themes/backend/inspina/js/plugins/iCheck/icheck.min.js'),
			);
		$data['js_script'] = 'artikeltag/js/js';
		
       $this->load->view('template/backend/header', $data, FALSE);
       $this->load->view('template/backend/index', $data);
    }
    /**
	 *Data Services 
	 **/
    public function api_list()
    {
		$draw 		= $this->input->get('draw');
		$offset		= $this->input->get('start');
		$limit		= $this->input->get('length');
		$search		= $this->input->get('search')['value']; if ($search == ''){$search = null; };	
		$order		= $this->input->get('order')[0]['column'];
		$sort 		= $this->input->get('order')[0]['dir'];
		$columns	= $this->input->get('columns')[$order]['data'];
		
		$result 	= $this->Artikeltag_model->get_all($limit, $offset, $search, $columns, $sort);
		$total		= $this->Artikeltag_model->count_all($search);
		
		$data['draw'] 	= $draw ;
		$data['recordsTotal'] 	= $total;
		$data['recordsFiltered'] 	= $total;
		$data['data'] = $result;
        
			// Check if the users data store contains users (in case the database result returns NULL)
            if ($data)
            {
                $this->output->set_status_header(200);
                echo json_encode($data);
            }
            else
            {
                $this->output->set_status_header(404);
                echo json_encode([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ]); 
            }
    }
	
	public function api_save()
	{
		
		$config = array(
				array(
					'field' => 'nama_tag',
					'label' => 'Judul Tag',
					'rules' => 'trim|required'
					),				
			 );

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) 
		{
			$this->output->set_status_header(404);
			echo json_encode([
						'status' => FALSE,
						'message' => 'Required field'
					]);
					exit;
		};
			
		$data = array(
				'nama_tag' => $this->input->post('nama_tag', TRUE),
			);
			
		if($this->Artikeltag_model->save($data)){ 	
		$this->output->set_status_header(201);	
		echo json_encode([
							'status' => 'ok',
							'message' => 'Added a resource'
						]);	
			
		}else{
		$this->output->set_status_header(404);	
		echo json_encode([
							'status' => 'error',
							'message' => 'Save failed'
						]);
		}
		
	}
	
	public function api_update()
	{
		
		$config = array(
				array(
					'field' => 'id',
					'label' => 'ID',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'nama_tag',
					'label' => 'Judul Tag',
					'rules' => 'trim|required'
					),				
			 );

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) 
		{
			$this->output->set_status_header(404);
			echo json_encode([
						'status' => FALSE,
						'message' => 'Required field'
					]);
			exit;
		};
			
		$data = array(
				'nama_tag' => $this->input->post('nama_tag', TRUE),
			);
			
		if($this->Artikeltag_model->update((int)$this->input->post('id', TRUE), $data)){ 	
		$this->output->set_status_header(201);	
		echo json_encode([
							'status' => 'ok',
							'message' => 'Added a resource'
						]);	
			
		}else{
		$this->output->set_status_header(404);	
		echo json_encode([
							'status' => 'error',
							'message' => 'Save failed'
						]);
		}
		
	}
	
	public function api_delete()
    {
        
		$id 		= (int)$this->input->post('id', TRUE);

        if (!$id)
        {
			$this->output->set_status_header(404);	
			echo json_encode([
								'status' => 'error',
								'message' => null
							]);
			exit;
		}
		
		if($this->Artikeltag_model->destroy($id)){
		
		$this->output->set_status_header(200);
		echo json_encode([
							'status' => 'ok',
							'message' => 'Success delete'
						]); 
		}else{
			
		$this->output->set_status_header(200);
		echo json_encode([
						'status' => FALSE,
						'message' => 'Required id'	
					]);
		
		}
    }
}