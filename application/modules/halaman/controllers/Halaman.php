<?php defined('BASEPATH') or exit('No direct script access allowed');
class Halaman extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $this->load->model('Halaman_Model');
        $this->load->library('upload');
    }

    // =========================================================================================
    /** INDEX : Menampilkan halaman status */
    // =========================================================================================
    public function index()
    {
        $data['title'] = 'Halaman';
        $data['content'] = 'halaman/html/index';
        $data['footer'] = array(
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/datatables.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/dataTables.bootstrap4.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/chosen/chosen.jquery.js'),
                base_url('assets/themes/backend/inspina/js/plugins/select2/select2.full.min.js'),
            );
        $data['js_script'] = 'halaman/js/js';
		
        $this->load->view('template/backend/header', $data, FALSE);
        $this->load->view('template/backend/index', $data);
    }

    public function add_halaman()
    {
        $data['title'] = 'Tambah Halaman';
        $data['content'] = 'halaman/html/add';
        $data['footer'] = array(
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/datatables.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/dataTables.bootstrap4.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/chosen/chosen.jquery.js'),
                base_url('assets/themes/backend/inspina/js/plugins/select2/select2.full.min.js'),
            );
        $data['js_script'] = 'halaman/js/add';
		
        $this->load->view('template/backend/header', $data, FALSE);
        $this->load->view('template/backend/index', $data);
    }

    public function edit_halaman()
    {
        $data['title'] = 'Sunting Halaman';
        $data['content'] = 'halaman/html/edit';
        $data['footer'] = array(
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/datatables.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/dataTables.bootstrap4.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/chosen/chosen.jquery.js'),
                base_url('assets/themes/backend/inspina/js/plugins/select2/select2.full.min.js'),
            );
        $data['js_script'] = 'halaman/js/edit';
		
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
		
		$result 	= $this->Halaman_Model->get_all($limit, $offset, $search, $columns, $sort);
		$total		= $this->Halaman_Model->count_all($search);
		
		$data['draw'] = $draw ;
		$data['recordsTotal'] = $total;
		$data['recordsFiltered'] = $total;
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
                'label' => 'id',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'judul',
                'label' => 'Judul',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'content',
                'label' => 'Content',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'keyword',
                'label' => 'Keyword',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'status',
                'label' => 'Status',
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
            'slug' => 'NULL',
            'judul' => $this->input->post('judul', TRUE),
            'content' => $this->input->post('content', TRUE),
            'keyword' => $this->input->post('keyword', TRUE),
            'description' => $this->input->post('description', TRUE),
            'status' => $this->input->post('status', TRUE),
        );
        
        if ($this->Halaman_Model->update($this->input->post('id', TRUE) ,$data)) {
            $this->output->set_status_header(201);
            echo json_encode(
                [
                    'status' => 'ok',
                    'message' => 'Added a resource'
                ]
            );
        } else {
            $this->output->set_status_header(500);
            echo json_encode(
                [
                    'status' => 'error',
                    'message' => 'error'
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
                'field' => 'judul',
                'label' => 'Judul',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'content',
                'label' => 'Content',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'keyword',
                'label' => 'Keyword',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'status',
                'label' => 'Status',
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
            'slug' => 'NULL',
            'judul' => $this->input->post('judul', TRUE),
            'content' => $this->input->post('content', TRUE),
            'keyword' => $this->input->post('keyword', TRUE),
            'description' => $this->input->post('description', TRUE),
            'status' => $this->input->post('status', TRUE),
        );
        
    if($this->Halaman_Model->save($data)){ 	
    $this->output->set_status_header(201);	
    echo json_encode([
                        'status' => 'ok',
                        'message' => 'Added a resource'
                    ]);	
        
    } else {
    $this->output->set_status_header(404);	
    echo json_encode([
                        'status' => 'error',
                        'message' => 'Save failed'
                    ]);
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
		
		if ($this->Halaman_Model->destroy($id)) {
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

    public function api_detail_halaman()
    {
        $data = $this->Halaman_Model->artikelDetail($this->input->post('id', TRUE));
        if ($data) {
            $this->output->set_status_header(201);
            echo json_encode(
                [
                    'status' => 'ok',
                    'message' => 'Success delete',
                    'data' => $data
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
}