<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lead extends MX_Controller {

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
		$this->load->model('lead/lead_model');
		$user_det = $this->session->userdata('logged_in'); 
		if($user_det['log_type']!='Agent')
		{
			$data["customers"]=$this->lead_model->get_customer_list();
			$data["cust"]=$this->lead_model->get_Dealer_list();
		}
		else
		{
			$data["customers"]=$this->lead_model->get_agent_customer_list($user_det['user_id']);
			$data["cust"]=$this->lead_model->get_Dealer_list();
		}
		//echo "<pre>"; print_r($data);exit;
		$this->template->write_view('content', 'lead/index',$data);
        $this->template->render();       
	}
	
	public function add_lead()
	{
		$this->load->model('lead/lead_model');
		$input=$this->input->post();
		//echo "<pre>";print_r($input);exit;
		$this->lead_model->add_lead_by_id($input);
		redirect($this->config->item('base_url').'lead/');       
	}
	public function up_lead()
	{
		$this->load->model('lead/lead_model');
		$input=$this->input->post();
		//echo "<pre>";print_r($input);exit;
		$this->lead_model->update_lead_by_id($input);
		redirect($this->config->item('base_url').'lead/');       
	}
	public function up_lead_status()
	{
		$this->load->model('lead/lead_model');
		$input=$this->input->post();
		$this->lead_model->up_lead_by_id_status($input);

		
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
