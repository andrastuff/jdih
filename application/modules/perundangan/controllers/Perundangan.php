<?php defined('BASEPATH') or exit('No direct script access allowed');
class Perundangan extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
		if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $this->load->model('Perundangan_model');
        $this->load->model('Teu_model');
        $this->load->model('Subjek_model');
        $this->load->model('Lampiran_model');
        $this->load->model('Status_model');
        $this->load->library('upload');
    }
    public function index()
    {
         
		$data['title'] = 'Perundangan';
        $data['content'] = 'perundangan/html/index';
        $data['footer'] = array(
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/datatables.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/dataTables.bootstrap4.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/chosen/chosen.jquery.js'),
                base_url('assets/themes/backend/inspina/js/plugins/select2/select2.full.min.js'),
            );
        $data['js_script'] = 'perundangan/js/js';

		$this->load->view('template/backend/header', $data, FALSE);
        $this->load->view('template/backend/index', $data);
    }
	
	public function add()
    {
        $data['title'] = 'Tambah Perundangan';
        $data['content'] = 'perundangan/html/add';
        $data['footer'] = array(
                base_url('assets/themes/backend/inspina/js/plugins/chosen/chosen.jquery.js'),
                base_url('assets/themes/backend/inspina/js/plugins/select2/select2.full.min.js'),
            );
        $data['js_script'] = 'perundangan/js/add';
		
        $this->load->view('template/backend/header', $data, FALSE);
        $this->load->view('template/backend/index', $data);
    }
	
	public function edit($id)
    {
        $data['title'] = 'Update Perundangan';
        $data['content'] = 'perundangan/html/add';
        $data['footer'] = array(
                base_url('assets/themes/backend/inspina/js/plugins/chosen/chosen.jquery.js'),
                base_url('assets/themes/backend/inspina/js/plugins/select2/select2.full.min.js'),
            );
        $data['js_script'] = 'perundangan/js/add';
		
        $this->load->view('template/backend/header', $data, FALSE);
        $this->load->view('template/backend/index', $data);
    }
	
    /**
	 *Data Services Perundangan
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
		
		$result 	= $this->Perundangan_model->get_all($limit, $offset, $search, $columns, $sort);
		$total		= $this->Perundangan_model->count_all($search);
		
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
                'message' => 'No data were found'
            ]); 
        }
    }
	
	public function api_view()
    {
		$id 		= $this->input->get('id');
		
		$result 	= $this->Perundangan_model->get_one($id);
		
		$data['data'] = $result;

        if ($data) {
            $this->output->set_status_header(200);
            echo json_encode($data);
        } else {
            $this->output->set_status_header(404);
            echo json_encode([
                'status' => FALSE,
                'message' => 'No data were found'
            ]); 
        }
    }
   
    public function api_save()
    {
       $config = array(
			array(
                'field' => 'type_dokumen',
                'label' => 'type_dokumen',
                'rules' => 'trim|required'
            ),

		);
		$data = array();
		
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
		
		
		if($this->input->post('type_dokumen') == 1){		
			$data = array(
				'tipe_dokumen' => $this->input->post('type_dokumen', TRUE),
                "jenis_peraturan" => $this->input->post('jenis_peraturan1', TRUE),
                "bidang_hukum" => $this->input->post('bidang_hukum1', TRUE),
                "judul" => $this->input->post('judul1', TRUE),
                "nomor_peraturan" => $this->input->post('nomor_peraturan1', TRUE),
                "tahun_terbit" => $this->input->post('tahun_terbit1', TRUE),
                "singkatan_bentuk" => $this->input->post('singkatan_bentuk1', TRUE),
                "tempat_terbit" => $this->input->post('tempat_terbit1', TRUE), //mindyrow
                "bahasa" => $this->input->post('bahasa1', TRUE),
                "tanggal_dibacakan" => $this->input->post('tanggal_dibacakan2', TRUE),
                "tanggal_penetapan" => $this->input->post('tanggal_penetapan', TRUE),
                "inisiatif" => $this->input->post('inisiatif', TRUE),
                "sumber" => $this->input->post('sumber1', TRUE),
                "pemrakarsa" => $this->input->post('pemrakarsa', TRUE),
                "daerah" => $this->input->post('daerah', TRUE),
                "tanggal_pengundangan" => $this->input->post('tanggal_pengundangan', TRUE),
                "penandatanganan" => $this->input->post('penandatanganan', TRUE),
                "integrasi" => 1,
                "promosikan_ke_beranda" => $this->input->post('promosikan_ke_beranda1', TRUE),
                "urusan_pemerintahan" => $this->input->post('urusan_pemerintahan', TRUE),
				
			);
		}elseif($this->input->post('type_dokumen') == 2){
			$data = array(
				'tipe_dokumen' => $this->input->post('type_dokumen', TRUE),
                "jenis_peraturan" => $this->input->post('jenis_peraturan2', TRUE),
                "judul" => $this->input->post('judul2', TRUE),
                "tahun_terbit" => $this->input->post('tahun_terbit2', TRUE),
                "integrasi" => 1,
                "nomor_panggil" => $this->input->post('nomor_panggil', TRUE),
                "edisi" => $this->input->post('edisi', TRUE),
                "tempat_terbit" => $this->input->post('tempat_terbit2', TRUE),
                "penerbit" => $this->input->post('penerbit', TRUE),
                "deskripsi_fisik" => $this->input->post('deskripsi_fisik', TRUE),
                "isbn" => $this->input->post('isbn', TRUE),
                "bahasa" => $this->input->post('bahasa2', TRUE),
				
			);
		}elseif($this->input->post('type_dokumen') == 3){
			$data = array(
				'tipe_dokumen' => $this->input->post('type_dokumen', TRUE),
                "jenis_peraturan" => $this->input->post('jenis_peraturan3', TRUE),
                "bidang_hukum" => $this->input->post('bidang_hukum3', TRUE),
                "judul" => $this->input->post('judul3', TRUE),
                "integrasi" => 1,
                "tahun_terbit" => $this->input->post('tahun_terbit3', TRUE),
                "bahasa" => $this->input->post('bahasa3', TRUE),
                "sumber" => $this->input->post('sumber3', TRUE),
                "judul_seri" => $this->input->post('judul_seri', TRUE),
                "kala_terbit" => $this->input->post('kala_terbit', TRUE),
				
			);
		}elseif($this->input->post('type_dokumen') == 4){
			$data = array(
				'tipe_dokumen' => $this->input->post('type_dokumen', TRUE),
                "jenis_peraturan" => $this->input->post('jenis_peraturan4', TRUE),
                "bidang_hukum" => $this->input->post('bidang_hukum4', TRUE),
                "judul" => $this->input->post('judul4', TRUE),
                "integrasi" => 1,
				"nomor_peraturan" => $this->input->post('nomor_peraturan4', TRUE),
                "singkatan_bentuk" => $this->input->post('singkatan_bentuk4', TRUE),
                "tempat_terbit" => $this->input->post('tempat_terbit4', TRUE),
                "bahasa" => $this->input->post('bahasa4', TRUE),
                "sumber" => $this->input->post('sumber4', TRUE),
                "tanggal_dibacakan" => $this->input->post('tanggal_dibacakan4', TRUE),
                "tahun_terbit" => $this->input->post('tahun_terbit4', TRUE),
                "lembaga_peradilan" => $this->input->post('lemper', TRUE),
                "pemohon" => $this->input->post('pempen', TRUE),
                "termohon" => $this->input->post('terter', TRUE),
                "amar_status" => $this->input->post('amstat', TRUE),
                "catatan_status_peraturan" => $this->input->post('camar', TRUE),
                "berkekuatan_hukum_tetap" => $this->input->post('berak', TRUE),
				
			);
		}
		$data['_created_by'] = $this->ion_auth->user()->row()->id;
        $data['created_at'] = date('Y-m-d H:i:s');
		$last_id = $this->Perundangan_model->save($data);
		if ($last_id != null) { 	
		$this->output->set_content_type('application/json');	
		$this->output->set_status_header(201);	
		echo json_encode(
            [
                'status' => 'ok',
                'id' => $last_id,
                'message' => 'Added a resource'
            ]
        );	
		} else {
			$this->output->set_content_type('application/json');
            $this->output->set_status_header(404);	
            echo json_encode(
                [
                    'status' => 'error',
                    'id' => $last_id,
                    'message' => 'Save failed'
                ]
            );
		}
    }
    
	public function api_update()
    {
       $config = array(
			array(
                'field' => 'type_dokumen',
                'label' => 'type_dokumen',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'dokumen_id',
                'label' => 'dokumen_id',
                'rules' => 'trim|required'
            ),

		);
		$data 	= array();
		$id		= $this->input->post('dokumen_id', TRUE);
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
		
		
		if($this->input->post('type_dokumen') == 1){		
			$data = array(
				'tipe_dokumen' => $this->input->post('type_dokumen', TRUE),
                "jenis_peraturan" => $this->input->post('jenis_peraturan1', TRUE),
                "bidang_hukum" => $this->input->post('bidang_hukum1', TRUE),
                "judul" => $this->input->post('judul1', TRUE),
                "nomor_peraturan" => $this->input->post('nomor_peraturan1', TRUE),
                "tahun_terbit" => $this->input->post('tahun_terbit1', TRUE),
                "singkatan_bentuk" => $this->input->post('singkatan_bentuk1', TRUE),
                "tempat_terbit" => $this->input->post('tempat_terbit1', TRUE), //mindyrow
                "bahasa" => $this->input->post('bahasa1', TRUE),
                "tanggal_dibacakan" => $this->input->post('tanggal_dibacakan2', TRUE),
                "tanggal_penetapan" => $this->input->post('tanggal_penetapan', TRUE),
                "inisiatif" => $this->input->post('inisiatif', TRUE),
                "sumber" => $this->input->post('sumber1', TRUE),
                "pemrakarsa" => $this->input->post('pemrakarsa', TRUE),
                "daerah" => $this->input->post('daerah', TRUE),
                "tanggal_pengundangan" => $this->input->post('tanggal_pengundangan', TRUE),
                "penandatanganan" => $this->input->post('penandatanganan', TRUE),
                "integrasi" => 1,
                "promosikan_ke_beranda" => $this->input->post('promosikan_ke_beranda1', TRUE),
                "urusan_pemerintahan" => $this->input->post('urusan_pemerintahan', TRUE),
				
			);
		}elseif($this->input->post('type_dokumen') == 2){
			$data = array(
				'tipe_dokumen' => $this->input->post('type_dokumen', TRUE),
                "jenis_peraturan" => $this->input->post('jenis_peraturan2', TRUE),
                "judul" => $this->input->post('judul2', TRUE),
                "tahun_terbit" => $this->input->post('tahun_terbit2', TRUE),
                "integrasi" => 1,
                "nomor_panggil" => $this->input->post('nomor_panggil', TRUE),
                "edisi" => $this->input->post('edisi', TRUE),
                "tempat_terbit" => $this->input->post('tempat_terbit2', TRUE),
                "penerbit" => $this->input->post('penerbit', TRUE),
                "deskripsi_fisik" => $this->input->post('deskripsi_fisik', TRUE),
                "isbn" => $this->input->post('isbn', TRUE),
                "bahasa" => $this->input->post('bahasa2', TRUE),
				
			);
		}elseif($this->input->post('type_dokumen') == 3){
			$data = array(
				'tipe_dokumen' => $this->input->post('type_dokumen', TRUE),
                "jenis_peraturan" => $this->input->post('jenis_peraturan3', TRUE),
                "bidang_hukum" => $this->input->post('bidang_hukum3', TRUE),
                "judul" => $this->input->post('judul3', TRUE),
                "integrasi" => 1,
                "tahun_terbit" => $this->input->post('tahun_terbit3', TRUE),
                "bahasa" => $this->input->post('bahasa3', TRUE),
                "sumber" => $this->input->post('sumber3', TRUE),
                "judul_seri" => $this->input->post('judul_seri', TRUE),
                "kala_terbit" => $this->input->post('kala_terbit', TRUE),
				
			);
		}elseif($this->input->post('type_dokumen') == 4){
			$data = array(
				'tipe_dokumen' => $this->input->post('type_dokumen', TRUE),
                "jenis_peraturan" => $this->input->post('jenis_peraturan4', TRUE),
                "bidang_hukum" => $this->input->post('bidang_hukum4', TRUE),
                "judul" => $this->input->post('judul4', TRUE),
                "integrasi" => 1,
				"nomor_peraturan" => $this->input->post('nomor_peraturan4', TRUE),
                "singkatan_bentuk" => $this->input->post('singkatan_bentuk4', TRUE),
                "tempat_terbit" => $this->input->post('tempat_terbit4', TRUE),
                "bahasa" => $this->input->post('bahasa4', TRUE),
                "sumber" => $this->input->post('sumber4', TRUE),
                "tanggal_dibacakan" => $this->input->post('tanggal_dibacakan4', TRUE),
                "tahun_terbit" => $this->input->post('tahun_terbit4', TRUE),
                "lembaga_peradilan" => $this->input->post('lemper', TRUE),
                "pemohon" => $this->input->post('pempen', TRUE),
                "termohon" => $this->input->post('terter', TRUE),
                "amar_status" => $this->input->post('amstat', TRUE),
                "catatan_status_peraturan" => $this->input->post('camar', TRUE),
                "berkekuatan_hukum_tetap" => $this->input->post('berak', TRUE),
				
			);
		}
		$data['_created_by'] = $this->ion_auth->user()->row()->id;
        $data['updated_at'] = date('Y-m-d H:i:s');
		$last_id = $this->Perundangan_model->update($id, $data);
		if ($last_id != null) { 	
		$this->output->set_content_type('application/json');	
		$this->output->set_status_header(201);	
		echo json_encode(
            [
                'status' => 'ok',
                'id' => $last_id,
                'message' => 'Added a resource'
            ]
        );	
		} else {
			$this->output->set_content_type('application/json');
            $this->output->set_status_header(404);	
            echo json_encode(
                [
                    'status' => 'error',
                    'id' => $last_id,
                    'message' => 'Save failed'
                ]
            );
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
		 
		if($this->Perundangan_model->destroy($id)){
		
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
   
   /**
	 *Data Services Teu
	 **/
    public function api_list_teu()
    {
		$dokumen_id = $this->input->get('id');
		
		$result 	= $this->Teu_model->get_all($dokumen_id);
		$total		= $this->Teu_model->count_all($dokumen_id);


		$data['recordsFiltered'] = $total;
		$data['data'] = $result;

        if ($data) {
            $this->output->set_status_header(200);
            echo json_encode($data);
        } else {
            $this->output->set_status_header(404);
            echo json_encode([
                'status' => FALSE,
                'message' => 'No data were found'
            ]); 
        }
    }
	
	public function api_save_teu()
    {
       $config = array(
			array(
                'field' => 'perundangan_id',
                'label' => 'perundangan_id',
                'rules' => 'trim|required'
            ),

		);
		$data = array();
		
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
				'id_dokumen' => $this->input->post('perundangan_id', TRUE),
                "nama_pengarang" => $this->input->post('namapengarang', TRUE),
                "tipe_pengarang" => $this->input->post('tipepengarang', TRUE),
                "jenis_pengarang" => $this->input->post('jenispengarang', TRUE),
                "status" => "",
                
			);
		
		$data['_created_by'] = $this->ion_auth->user()->row()->id;
        $data['created_at'] = date('Y-m-d H:i:s');
		
		if ($this->Teu_model->save($data)) { 	
		$this->output->set_content_type('application/json');	
		$this->output->set_status_header(201);	
		echo json_encode(
            [
                'status' => 'ok',
                'message' => 'Added a resource'
            ]
        );	
		} else {
			$this->output->set_content_type('application/json');
            $this->output->set_status_header(404);	
            echo json_encode(
                [
                    'status' => 'error',
                    'message' => 'Save failed'
                ]
            );
		}
    }
	
	public function api_delete_teu()
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
		
		if($this->Teu_model->destroy($id)){
		
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
	
	/**
	 *Data Services Subjek
	 **/
    public function api_list_subjek()
    {
		$dokumen_id = $this->input->get('id');
		
		$result 	= $this->Subjek_model->get_all($dokumen_id);
		$total		= $this->Subjek_model->count_all($dokumen_id);
		

		$data['recordsFiltered'] = $total;
		$data['data'] = $result;

        if ($data) {
            $this->output->set_status_header(200);
            echo json_encode($data);
        } else {
            $this->output->set_status_header(404);
            echo json_encode([
                'status' => FALSE,
                'message' => 'No data were found'
            ]); 
        }
    }
	
	public function api_save_subjek()
    {
       $config = array(
			array(
                'field' => 'perundangan_id',
                'label' => 'perundangan_id',
                'rules' => 'trim|required'
            ),

		);
		$data = array();
		
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
				'id_dokumen' => $this->input->post('perundangan_id', TRUE),
				'subyek' => $this->input->post('namasubjek', TRUE),
                "tipe_subyek" => $this->input->post('tipesubjek', TRUE),
                "jenis_subyek" => $this->input->post('jenissubjek', TRUE),
                "status" => "",
                
			);
		
		$data['_created_by'] = $this->ion_auth->user()->row()->id;
        $data['created_at'] = date('Y-m-d H:i:s');
		
		if ($this->Subjek_model->save($data)) { 	
		$this->output->set_content_type('application/json');	
		$this->output->set_status_header(201);	
		echo json_encode(
            [
                'status' => 'ok',
                'message' => 'Added a resource'
            ]
        );	
		} else {
			$this->output->set_content_type('application/json');
            $this->output->set_status_header(404);	
            echo json_encode(
                [
                    'status' => 'error',
                    'message' => 'Save failed'
                ]
            );
		}
    }
	
	public function api_delete_subjek()
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
		
		if($this->Subjek_model->destroy($id)){
		
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
	
	/**
	 *Data Services Lampiran
	 **/
    public function api_list_lampiran()
    {
		$dokumen_id = $this->input->get('id');
		
		$result 	= $this->Lampiran_model->get_all($dokumen_id);
		$total		= $this->Lampiran_model->count_all($dokumen_id);
		

		$data['recordsFiltered'] = $total;
		$data['data'] = $result;

        if ($data) {
            $this->output->set_status_header(200);
            echo json_encode($data);
        } else {
            $this->output->set_status_header(404);
            echo json_encode([
                'status' => FALSE,
                'message' => 'No data were found'
            ]); 
        }
    }
	
	public function api_save_lampiran()
    {
       
	   $config = array(
			array(
                'field' => 'perundangan_id',
                'label' => 'perundangan_id',
                'rules' => 'trim|required'
            ),

		);
		$data = array();
		
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
			if (!empty($_FILES['berkaslampiran']['name']))
			{			 
				$originalPath = "storage/lampiran/";
				if(!is_dir($originalPath)) {
					mkdir($originalPath, 0755, true);
				}
	
				$files  = $_FILES['berkaslampiran']['name'];
				 
				
				$config = array(
						'file_name'		=> $files,
						'upload_path'   => realpath($originalPath),
						'allowed_types' => 'pdf|doc|docx',
						'max_size'      => '5000',
						"overwrite"	=> TRUE,
						);
				
				$this->upload->initialize($config);
				
				if (! $this->upload->do_upload('berkaslampiran'))
				{
					$name = '';
					exit;
					  
				}else
				{ 
					$name = $this->upload->data('file_name');
				}
			}
					
			$data = array(
				'id_dokumen' => $this->input->post('perundangan_id', TRUE),
				'judul_lampiran' => $this->input->post('judullampiran', TRUE),
                "dokumen_lampiran" => $name,
                "status" => "",
                
			);
		
		$data['_created_by'] = $this->ion_auth->user()->row()->id;
        $data['created_at'] = date('Y-m-d H:i:s');
		
		if ($this->Lampiran_model->save($data)) { 	
		$this->output->set_content_type('application/json');	
		$this->output->set_status_header(201);	
		echo json_encode(
            [
                'status' => 'ok',
                'message' => 'Added a resource'
            ]
        );	
		} else {
			$this->output->set_content_type('application/json');
            $this->output->set_status_header(404);	
            echo json_encode(
                [
                    'status' => 'error',
                    'message' => 'Save failed'
                ]
            );
		}
    }
	
	public function api_delete_lampiran()
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
		$data 		= $this->Lampiran_model->get_one($id);
		$file 		= $data['dokumen_lampiran'];
		@unlink(".storage/lampiran/".$file);
		
		if($this->Lampiran_model->destroy($id)){
		
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
	
	/**
	 *Data Services Status
	 **/
    public function api_list_status()
    {
		$dokumen_id = $this->input->get('id');
		
		$result 	= $this->Status_model->get_all($dokumen_id);
		$total		= $this->Status_model->count_all($dokumen_id);
		$results	= array();
		
		foreach($result as $val){
			$results[] = array(
				'id' => $val['id'],
				'id_dokumen' => $val['id_dokumen'],
				'catatan_status_peraturan' => $val['catatan_status_peraturan'],
				'status_peraturan' => $val['status_peraturan'],
				'judul_dokumen' => $this->Perundangan_model->get_one($val['id_dokumen'])['judul'],
				'name_status_peraturan' => $this->Status_model->get_one_status($val['status_peraturan'])['status'],
				);
		}

		$data['recordsFiltered'] = $total;
		$data['data'] = $results;

        if ($data) {
            $this->output->set_status_header(200);
            echo json_encode($data);
        } else {
            $this->output->set_status_header(404);
            echo json_encode([
                'status' => FALSE,
                'message' => 'No data were found'
            ]); 
        }
    }
	
	public function api_save_status()
    {
       $config = array(
			array(
                'field' => 'perundangan_id',
                'label' => 'perundangan_id',
                'rules' => 'trim|required'
            ),

		);
		$data = array();
		
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
				'id_dokumen' => $this->input->post('perundangan_id', TRUE),
				'status_peraturan' => $this->input->post('dokumenstatus', TRUE),
                "catatan_status_peraturan" => $this->input->post('catatanstatus', TRUE),
                "status" => "",
                
			);
		
		$data['_created_by'] = $this->ion_auth->user()->row()->id;
        $data['created_at'] = date('Y-m-d H:i:s');
		
		if ($this->Status_model->save($data)) { 	
		$this->output->set_content_type('application/json');	
		$this->output->set_status_header(201);	
		echo json_encode(
            [
                'status' => 'ok',
                'message' => 'Added a resource'
            ]
        );	
		} else {
			$this->output->set_content_type('application/json');
            $this->output->set_status_header(404);	
            echo json_encode(
                [
                    'status' => 'error',
                    'message' => 'Save failed'
                ]
            );
		}
    }
	
	public function api_delete_status()
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
		
		if($this->Status_model->destroy($id)){
		
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