<?php defined('BASEPATH') or exit('No direct script access allowed');
class Websetting extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
        $this->load->model('Websetting_model');
		$this->load->library('upload');
    }
    public function index()
    {
        $data['title'] = 'Website Setting';
        $data['content'] = 'websetting/html/index';
        $data['footer'] = array('');
		$data['js_script'] = 'websetting/js/js';
		
		$this->load->view('template/backend/header', $data, FALSE);
        $this->load->view('template/backend/index', $data);
    }
	
    /**
	 *API Services 
	 **/

    public function api_update()
    {
			$config = array(
                    array(
                        'field' => 'title',
                        'label' => 'Judul',
						'rules' => 'required',
						'errors' => array(
                        'required' => 'You must provide a Title', ),
                        ), 
                  );
  
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE) 
			{
				$this->output->set_status_header(404);
				echo json_encode([
							'status' => FALSE,
							'message' => 'Required field'
						], 404);
						exit;
			};
			
				$name = $this->input->post('logo');
				 
				if (!empty($_FILES['userfile']['name']))
					{			 
						$originalPath = "assets/images/web/";
						if(!is_dir($originalPath)) {
							mkdir($originalPath, 0755, true);
						}
			
						@unlink($originalPath.$name); 
						
						$files  = $_FILES['userfile']['name'];
						 
						$tmp = explode('.',$files);
						$ext = end($tmp);
						$nama = 'logo.'.$ext;
						
						$config = array(
								'file_name'		=> $nama,
								'upload_path'   => realpath($originalPath),
								'allowed_types' => 'gif|jpg|png',
								'max_size'      => '1000',
								"overwrite"	=> TRUE,
								);
						
						$this->upload->initialize($config);
						
						if (! $this->upload->do_upload('userfile'))
						{
							 $name = '';
							  
						}else
						{ 
							$name = $nama;
						}
					}
					
					$input = array(
						'title'      		=> $this->input->post('title'),
						'description'  		=> $this->input->post('description'),
						'address'     		=> $this->input->post('address'),
						'phone'       		=> $this->input->post('phone'),
						'second_phone'      => $this->input->post('second_phone'),
						'email'     		=> $this->input->post('email'),
						'logo'       		=> $name,
						'google_code'   	=> $this->input->post('google_code'),
						'metakey'     		=> $this->input->post('metakey'),
						'metadesc'    		=> $this->input->post('metadesc'),
						'footer'    		=> $this->input->post('footer'),
					);
			
				
				if($this->Websetting_model->update(1, $input)){
					$this->output->set_status_header(201);
					echo json_encode([
							'status' => 'ok',
							'message' => 'Added a resource'
						]); 
						
				}else{
					$this->output->set_status_header(404);
					echo json_encode([
							'status' => FALSE,
							'message' => 'Save failed'
						]); 	
					
				}
			
    }

    public function api_get_by_id()
    {
		$result 	= $this->Websetting_model->get_all();
		 
		
		
		$data['data'] = $result;
		
        
			// Check if the users data store contains users (in case the database result returns NULL)
            if ($data)
            {
                // Set the response and exit
				$this->output->set_status_header(200);
                echo json_encode($data); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
				$this->output->set_status_header(404);
                echo json_encode([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ]); // NOT_FOUND (404) being the HTTP response code
            }
    }
}