<?php defined('BASEPATH') or exit('No direct script access allowed');
class Status extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $this->load->model('Status_model');
    }

    // =========================================================================================
    /** INDEX : Menampilkan halaman status */
    // =========================================================================================
    public function index()
    {
        $data['title'] = 'Status';
        $data['content'] = 'status/html/index';
        $data['footer'] = array(
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/datatables.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/dataTables.bootstrap4.min.js'),
            );
        $data['js_script'] = 'status/js/js';
		
        $this->load->view('template/backend/header', $data, FALSE);
        $this->load->view('template/backend/index', $data);
    }

    // =========================================================================================
    /** API LIST : Mengambil data yang ada di tabel sesuai limit dan mengembalikannya ke dalam DataTabel */
    // =========================================================================================
    public function api_list()
    {
        $draw 		= $this->input->get('draw');
		$offset		= $this->input->get('start');
		$limit		= $this->input->get('length');
		$search		= $this->input->get('search')['value']; if ($search == ''){$search = null; };	
		$order		= $this->input->get('order')[0]['column'];
		$sort 		= $this->input->get('order')[0]['dir'];
		$columns	= $this->input->get('columns')[$order]['data'];
		
		$result 	= $this->Status_model->get_all($limit, $offset, $search, $columns, $sort);
		$total		= $this->Status_model->count_all($search);
		
		$data['draw'] 	= $draw ;
		$data['recordsTotal'] 	= $total;
		$data['recordsFiltered'] 	= $total;
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

    // =========================================================================================
    /** API UPDATE : Memperbarui data yang ingin di ubah berdasarkan ID */
    // =========================================================================================
    public function api_update()
	{
		$config = array(
			array(
                'field' => 'id',
                'label' => 'ID',
                'rules' => 'trim|required'
			),
			array(
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'trim|required'
            ),
		);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$this->output->set_status_header(404);
			echo json_encode([
						'status' => FALSE,
						'message' => 'Required field'
					]);
			exit;
		};
			
		$data = array(
				'status' => $this->input->post('status', TRUE),
			    );
			
		if ($this->Status_model->update((int)$this->input->post('id', TRUE), $data)) { 	
		$this->output->set_status_header(201);
            echo json_encode(
                [
                    'status' => 'ok',
                    'message' => 'Added a resource'
                ]
            );
		} else {
		$this->output->set_status_header(404);	
            echo json_encode(
                [
                    'status' => 'error',
                    'message' => 'Save failed'
                ]
            );
		}
	}

    // =========================================================================================
    /** API SAVE : Menambah data baru kedalam tabel */
    // =========================================================================================
    public function api_save()
	{
		$config = array(
			array(
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'trim|required'
            ),
		);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$this->output->set_status_header(404);
			echo json_encode(
                [
                    'status' => FALSE,
                    'message' => 'Required field'
				]
            );
			exit;
		};
			
		$data = array(
			'status' => $this->input->post('status', TRUE),
		);

		if ($this->Status_model->save($data)) { 	
		$this->output->set_status_header(201);	
		echo json_encode(
            [
                'status' => 'ok',
                'message' => 'Added a resource'
            ]
        );	
		} else {
            $this->output->set_status_header(404);	
            echo json_encode(
                [
                    'status' => 'error',
                    'message' => 'Save failed'
                ]
            );
		}
	}

    // =========================================================================================
    /** API DELETE : Menghapus data di dalam tabel berdasarkan ID yang dikirim */
    // =========================================================================================
    public function api_delete()
    {
		$id = (int)$this->input->post('id', TRUE);
        if (!$id) {
			$this->output->set_status_header(404);	
			echo json_encode(
                [
                    'status' => 'error',
                    'message' => $id
				]
            );
			exit;
		}
		
		if ($this->Status_model->destroy($id)) {
		$this->output->set_status_header(201);
		echo json_encode(
            [
                'status' => 'ok',
                'message' => 'Success delete'
            ]
        );
		} else {
            $this->output->set_status_header(404);
            echo json_encode(
                [
                    'status' => FALSE,
                    'message' => 'Required id'	
                ]
            );
		}
    }
	
	public function api_list_all()
    {

		$result 	= $this->Status_model->get_all(1000, 0, null, null, null);

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
}