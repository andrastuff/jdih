<?php defined('BASEPATH') or exit('No direct script access allowed');
class Menu extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $this->load->model('Menu_Model');
        $this->load->library('upload');
    }

    // =========================================================================================
    /** INDEX : Menampilkan halaman status */
    // =========================================================================================
    public function index()
    {
        $data['title'] = 'Menu';
        $data['content'] = 'menu/html/index';
        $data['footer'] = array(
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/datatables.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/dataTables.bootstrap4.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/chosen/chosen.jquery.js'),
                base_url('assets/themes/backend/inspina/js/plugins/select2/select2.full.min.js'),
            );
        $data['js_script'] = 'menu/js/js';
		
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
		
		$result 	= $this->Menu_Model->get_all($limit, $offset, $search, $columns, $sort);
		$total		= $this->Menu_Model->count_all($search);
		
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
                'field' => 'id_parent',
                'label' => 'Parent',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'nama_menu',
                'label' => 'Nama Menu',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'order_menu',
                'label' => 'Order Menu',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'link',
                'label' => 'Link',
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
        'id_parent' => $this->input->post('id_parent', TRUE),
        'nama_menu' => $this->input->post('nama_menu', TRUE),
        'order_menu' => $this->input->post('order_menu', TRUE),
        'link' => $this->input->post('link', TRUE),
        'status' => $this->input->post('status', TRUE),
        );
        
    if($this->Menu_Model->update((int)$this->input->post('id', TRUE), $data)){ 	
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

    // =========================================================================================
    /** API SAVE : Menambah data baru kedalam tabel */
    // =========================================================================================
    public function api_save()
	{
        $config = array(
            array(
                'field' => 'id_parent',
                'label' => 'Parent',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'nama_menu',
                'label' => 'Nama Menu',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'order_menu',
                'label' => 'Order Menu',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'link',
                'label' => 'Link',
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
            'id_parent' => $this->input->post('id_parent', TRUE),
            'nama_menu' => $this->input->post('nama_menu', TRUE),
            'order_menu' => $this->input->post('order_menu', TRUE),
            'link' => $this->input->post('link', TRUE),
            'status' => $this->input->post('status', TRUE),
        );
        
    if($this->Menu_Model->save($data)){ 	
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
			$this->output->set_status_header(500);	
			echo json_encode(
                [
                    'status' => 'error',
                    'message' => $id
				]
            );
			exit;
		}
		
		if ($this->Menu_Model->destroy($id)) {
		$this->output->set_status_header(201);
		echo json_encode(
            [
                'status' => 'ok',
                'message' => 'Success delete'
            ]
        );
		} else {
            $this->output->set_status_header(500);
            echo json_encode(
                [
                    'status' => FALSE,
                    'message' => 'Required id'	
                ]
            );
		}
    }

    public function api_nama_menu()
    {
        $data = $this->Menu_Model->menuList();
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