<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* load the MX_Router class */
class Backend_Controller extends MY_Controller
{	

	function __construct() 
	{
		parent::__construct();
		$this->load->helper('inflector');
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
