<?php if (! defined('BASEPATH')) { exit('No direct script access allowed');}

class Gt_modules extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('directory');
    }
    public function index()
    {
        $this->load->view('gt_modules/v_index');
	}
	/**
	 * List folder modules
	 *
	 **/
    public function ajax_get_module()
    {
        $list = glob('application/modules/*', GLOB_ONLYDIR);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $module) {
            $no++;
            $row = array();
            $row[] = str_replace('application/modules/', '', $module);
            //add html for action
            $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Uninstall</a>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => count(directory_map(APPPATH.'modules/', 1)),
                        "recordsFiltered" => count(directory_map(APPPATH.'modules/', 1)),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    public function ajax_gen_modul()
    {
        $modules_name=$this->input->post('mod_name');
        $mod_con_name=$this->input->post('mod_con_name');
        $mod_model_name=$this->input->post('mod_model_name');
        
        $mod_dir=array('controllers','models','views');

        $controller='controllers';
        $models='models';

        $controller_file=$mod_con_name.'.php';
        $model_file=$mod_model_name.'.php';

        $main_modules=APPPATH.'modules/'.$modules_name;
        //$views_path=APPPATH.'modules/main_modules/views/'.$theme_name;
        $isi = '';
        $view_file = array(
            'index.php',
            'add.php',
            'edit.php',
        );
        $js_file = array(
            'datatables.php',
        );

		if (!file_exists($main_modules)) 
		{
            $create_dir=mkdir($main_modules, 0777, true);
            
			if ($create_dir) 
			{
				foreach ($mod_dir as $dir) 
				{
                    mkdir($main_modules.'/'.$dir, 0644, true);
                }
                mkdir($main_modules.'/views/html/', 0644, true);
                mkdir($main_modules.'/views/js/', 0644, true);
                write_file($main_modules.'/controllers/'.$controller_file, $this->isi_controller($mod_con_name,$mod_model_name,$modules_name));
                write_file($main_modules.'/models/'.$model_file, $isi);
				foreach ($view_file as $view_file) 
				{
                    write_file($main_modules.'/views/html/'.$view_file, $isi);
                }
                foreach ($js_file as $js_file) 
				{
                    write_file($main_modules.'/views/js/'.$js_file, $isi);
                }
                echo json_encode(array("status" => true));
            }
		}
		else 
		{
            echo json_encode(array("status" => false));
        }
    }
    public function isi_controller($mod_con_name,$mod_model_name,$modules_name)
    {
return $isi_controller ="<?php defined('BASEPATH') or exit('No direct script access allowed');
class " . $mod_con_name . " extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        \$this->load->model('$mod_model_name');
    }
    public function index()
    {
        \$data['header'] = array(
			'stylesheets'	=> array(
				'',
            ),
        );
        \$data['content'] = '".$modules_name."/html/index';
        \$data['footer'] = array(
			'javascripts' => array(
				'',
			),
			'scripts'	=> array(
				\$this->load->view('".$modules_name."/views/js/datatables'),
			)
		);
        \$this->load->view('template/backend/html/index', \$data);
    }
    /**
	 *Data Services 
	 **/
    public function datatables()
    {
       
    }
    public function insert()
    {
       
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
}";
    }
}

/* End of file  */
/* Location: ./application/controllers/ */
