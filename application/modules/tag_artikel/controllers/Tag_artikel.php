<?php defined('BASEPATH') or exit('No direct script access allowed');
class Tag_artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tag_artikel_model');
    }
    public function index()
    {
        $data['header'] = array(
			'stylesheets'	=> array(
				'',
            ),
        );
        $data['content'] = 'tag_artikel/html/index';
        $data['footer'] = array(
			'javascripts' => array(
				'',
			),
			'scripts'	=> array(
				$this->load->view('tag_artikel/views/js/datatables'),
			)
		);
        $this->load->view('template/backend/html/index', $data);
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
}