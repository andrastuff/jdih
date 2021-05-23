<?php defined('BASEPATH') or exit('No direct script access allowed');
class Artikel extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $this->load->model('Artikel_Model');
        $this->load->library('upload');
    }

    // =========================================================================================
    /** INDEX : Menampilkan halaman status */
    // =========================================================================================
    public function index()
    {
        $data['title'] = 'Artikel';
        $data['content'] = 'artikel/html/index';
        $data['footer'] = array(
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/datatables.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/dataTables.bootstrap4.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/chosen/chosen.jquery.js'),
                base_url('assets/themes/backend/inspina/js/plugins/select2/select2.full.min.js'),
            );
        $data['js_script'] = 'artikel/js/js';
		
        $this->load->view('template/backend/header', $data, FALSE);
        $this->load->view('template/backend/index', $data);
    }

    public function add_artikel()
    {
        $data['title'] = 'Tambah Artikel';
        $data['content'] = 'artikel/html/add';
        $data['footer'] = array(
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/datatables.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/dataTables.bootstrap4.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/chosen/chosen.jquery.js'),
                base_url('assets/themes/backend/inspina/js/plugins/select2/select2.full.min.js'),
            );
        $data['js_script'] = 'artikel/js/add';
		
        $this->load->view('template/backend/header', $data, FALSE);
        $this->load->view('template/backend/index', $data);
    }

    public function edit_artikel()
    {
        $data['title'] = 'Sunting Artikel';
        $data['content'] = 'artikel/html/edit';
        $data['footer'] = array(
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/datatables.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/dataTables.bootstrap4.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/chosen/chosen.jquery.js'),
                base_url('assets/themes/backend/inspina/js/plugins/select2/select2.full.min.js'),
            );
        $data['js_script'] = 'artikel/js/edit';
		
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
		
		$result 	= $this->Artikel_Model->get_all($limit, $offset, $search, $columns, $sort);
		$total		= $this->Artikel_Model->count_all($search);
		
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
		if (empty($_FILES['img'])) {
			$this->output->set_status_header(404);
			echo json_encode(['error'=>'No files found for upload.']);  
			return;

		} else {

			$filenames = $_FILES['img']['name'];
            $dataInfo = array();
        
            $originalPath = "assets/images/artikel/";

            if (!is_dir($originalPath)) {
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

            if (!$this->upload->do_upload('img'))
            {
                $dataInfo = [];
                $this->output->set_status_header(404);
                echo json_encode(
                    [
                        'status' => 'error',
                        'message' => $this->upload->display_errors()
                    ]
                );
                return;

            } else {

       
                $dataInfo = $this->upload->data();
                $data = array(
                    'judul_artikel' => $this->input->post('judul_artikel', TRUE),
                    'isi_artikel' => $this->input->post('isi_artikel', TRUE),
                    'kategori_id' => $this->input->post('kategori_id', TRUE),
                    'tag' => $this->input->post('tag', TRUE),
                    'metakey' => $this->input->post('metakey', TRUE),
                    'metadesc' => $this->input->post('metadesc', TRUE),
                    'caption' => $this->input->post('caption', TRUE),
                    'tanggal' => $this->input->post('tanggal', TRUE),
                    'utama' => $this->input->post('utama', TRUE),
                    'user_id' => 1,
                    'headlines' => "Headline",
                    'slug' => $this->input->post('judul_artikel', TRUE),
                    'view' => 1,
                    'parent' => 'NULL',
                    'img' => $dataInfo['file_name']
                );

                if ($this->Artikel_Model->update($this->input->post('id', TRUE) ,$data)) {
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
		}
	}

    // =========================================================================================
    /** API SAVE : Menambah data baru kedalam tabel */
    // =========================================================================================
    public function api_save()
	{
        if (empty($_FILES['img'])) {
			$this->output->set_status_header(404);
			echo json_encode(['error'=>'No files found for upload.']);  
			return;

		} else {

			$filenames = $_FILES['img']['name'];
            $dataInfo = array();
        
            $originalPath = "assets/images/artikel/";

            if (!is_dir($originalPath)) {
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

            if (!$this->upload->do_upload('img'))
            {
                $dataInfo = [];
                $this->output->set_status_header(201);
                echo json_encode(
                    [
                        'status' => 'error',
                        'message' => $this->upload->display_errors()
                    ]
                );
                return;

            } else {

       
                $dataInfo = $this->upload->data();
                $data = array(
                    'judul_artikel' => $this->input->post('judul_artikel', TRUE),
                    'isi_artikel' => $this->input->post('isi_artikel', TRUE),
                    'kategori_id' => $this->input->post('kategori_id', TRUE),
                    'tag' => $this->input->post('tag', TRUE),
                    'metakey' => $this->input->post('metakey', TRUE),
                    'metadesc' => $this->input->post('metadesc', TRUE),
                    'caption' => $this->input->post('caption', TRUE),
                    'tanggal' => $this->input->post('tanggal', TRUE),
                    'utama' => $this->input->post('utama', TRUE),
                    'user_id' => 1,
                    'headlines' => "Headline",
                    'slug' => $this->input->post('judul_artikel', TRUE),
                    'view' => 1,
                    'parent' => 'NULL',
                    'img' => $dataInfo['file_name']
                );

                if ($this->Artikel_Model->save($data)) {
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
		
		if ($this->Artikel_Model->destroy($id)) {
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

    public function api_kategori_list()
    {
        $data = $this->Artikel_Model->kategoriList();
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

    public function api_tag_list()
    {
        $data = $this->Artikel_Model->tagList();
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

    public function api_detail_artikel()
    {
        $data = $this->Artikel_Model->artikelDetail($this->input->post('id', TRUE));
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