<?php defined('BASEPATH') or exit('No direct script access allowed');
class Report extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
		if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        
        $this->load->model('Report_model');

        $this->load->library('upload');
    }
    public function index()
    {
         
		$data['title'] = 'Halaman Laporan';
        $data['content'] = 'report/html/index';
        $data['footer'] = array(
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/datatables.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/dataTables/dataTables.bootstrap4.min.js'),
                base_url('assets/themes/backend/inspina/js/plugins/chosen/chosen.jquery.js'),
                base_url('assets/themes/backend/inspina/js/plugins/select2/select2.full.min.js'),
            );
        $data['js_script'] = 'report/js/js';

		$this->load->view('template/backend/header', $data, FALSE);
        $this->load->view('template/backend/index', $data);
    }
	

    /**
	 *Data Services Perundangan
	 **/
    public function api_list()
    {
        $filter['tahun_terbit'] 		= $this->input->get('tahun');
        $filter['tipe_dokumen'] 	= $this->input->get('tipedokumen');
        $filter['jenis_peraturan'] = $this->input->get('jenisdokumen');
		
        $draw 		= $this->input->get('draw');
		$offset		= $this->input->get('start');
		$limit		= $this->input->get('length');
		$search		= $this->input->get('search')['value']; if ($search == ''){$search = null; };	
		$order		= $this->input->get('order')[0]['column'];
		$sort 		= $this->input->get('order')[0]['dir'];
		$columns	= $this->input->get('columns')[$order]['data'];
		
		$result 	= $this->Report_model->get_all($limit, $offset, $search, $columns, $sort, $filter);
		$total		= $this->Report_model->count_all($search, $filter);
		
		$data['draw'] = $draw ;
		$data['recordsTotal'] = $total;
		$data['recordsFiltered'] = $total;
		$data['data'] = $result;
		$data['filter'] = $filter;

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
	
	public function api_chart_perundangan()
    {
		
		$tahun			= $this->input->get('tahun');
		$tipedokumen 	= $this->input->get('tipedokumen');
		$jenisdokumen 	= $this->input->get('jenisdokumen');
		$result			= array();
		$x				= [];
		
		if($this->input->get('jenisdokumen') != ''){
			$class 			= $this->Report_model->get_class_where('jenis_peraturan');
			
			foreach ($class as $key=>$val){
			$result[] =	[$this->Report_model->get_name_jenisPeraturan($val['jenis_peraturan']), $this->Report_model->get_count_where('jenis_peraturan', $val['jenis_peraturan'], $tahun)];
			 $x[] =	$this->Report_model->get_name_jenisPeraturan($val['jenis_peraturan']);
			}
			
		}else{
			
			$class 			= $this->Report_model->get_class_where('tipe_dokumen');
			
			foreach ($class as $key=>$val){
			$result[] =	[$this->Report_model->get_name_tipeDokumen($val['tipe_dokumen']), $this->Report_model->get_count_where('tipe_dokumen', $val['tipe_dokumen'], $tahun)];
			 $x[] =	$this->Report_model->get_name_tipeDokumen($val['tipe_dokumen']);
			}
		}
		
		
		
 		
		$breadcrumb = 'Data Perundangan '.$tahun;
		$data['title'] 	= ucwords(str_replace('"', ' ', json_encode($breadcrumb)));
		$data['series'] = $result;
		$data['x'] = $x;
		 

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
	
}