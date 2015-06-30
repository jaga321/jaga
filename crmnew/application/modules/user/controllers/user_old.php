<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('email');
	    $this->load->database();
		$this->load->library('form_validation');
			
	}
	
	public function index()
	{
		$this->template->set_master_template('../../themes/'.$this->config->item("active_template").'/template.php');
		
		$this->load->model('user/user_model');
		if($this->input->post())
		{
			$input=$this->input->post();
			$this->user_model->add_user($input);
			redirect($this->config->item('base_url')."user/", "refresh");
		}
		$data["customers"]=$this->user_model->get_customer_list();
		//print_r($data);exit;
		$this->template->write_view('content', 'user/index',$data);
        $this->template->render();       
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
