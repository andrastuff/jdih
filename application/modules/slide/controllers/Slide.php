<?php defined('BASEPATH') or exit('No direct script access allowed');
class Slide extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
        $this->load->model('Slide_model');
		$this->load->library('upload');
    }
    public function index()
    {
        $data['title'] = 'Slide Carousel';
        $data['content'] = 'slide/html/index';
		$data['footer'] = array('');
		$data['js_script'] = 'slide/js/js';
		
        $this->load->view('template/backend/header', $data, FALSE);
        $this->load->view('template/backend/index', $data);
    }
    /**
	 *Data Services 
	 **/
    
    public function api_list()
    {
 
		$get 	= $this->Slide_model->get_all();
		$result		= [];
		$i 			= 0;
		
		foreach ($get as $item) {
			$img = base_url('assets/images/slide/'.$item['img']);
			$result[] =	array(
						'no' => $i++,
						'img' => $img,
						'id' => $item['id'],
						'judul' => $item['judul'],
						'link' => $item['link'],
						);
			
		};
		
		$data['data'] 	= $result;
		
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
		
		if (empty($_FILES['file'])) {
			$this->output->set_status_header(404);
			echo json_encode(['error'=>'No files found for upload.']);  
			return ;  
		}
		else
		{
			if($this->input->post('judul')){
			$filenames = $_FILES['file']['name'];
			$title = $this->input->post('judul');
			$dataInfo = array();
			 
			$originalPath = "assets/images/slide/";
			if(!is_dir($originalPath)) {
				mkdir($originalPath, 0755, true);
			}
			
				$config = array(
                        'encrypt_name' => TRUE,
                        'file_name'		=> $filenames,
						'upload_path'   => realpath($originalPath),
						'allowed_types' => 'gif|jpg|png',
						'max_size'      => '20000',
						"overwrite"	=> TRUE,
						);
						
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('file'))
				{
					$error = "Upload Error";  
					$dataInfo = [];  
							  
				}else{
					$error =[];
					$dataInfo = $this->upload->data();
					$data = array(
								'judul' => $this->input->post('judul'),
								'link' => $this->input->post('link'),
								'img' => $dataInfo['file_name']
								);
					$return = $this->Slide_model->save($data);
				}
			$this->output->set_status_header(201);	
			echo json_encode([
								'status' => 'ok',
								'message' => []
							]);	
				
			}else{
			$this->output->set_status_header(404);	
			echo json_encode([
								'status' => 'error',
								'message' => 'Judul tidak boleh Kosong'
							]);
			}
		}
	}
	
	public function api_delete()
    {
        
		$id 		= (int)$this->input->get('id');

        if (!$id)
        {
			$this->output->set_status_header(404);	
			echo json_encode([
								'status' => 'error',
								'message' => null
							]);
        }else{

			$return =$this->Slide_model->get_one($id);
			if($return['id']){
				
			@unlink('assets/images/slide/');	
			$this->Slide_model->destroy($id);
			
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
}