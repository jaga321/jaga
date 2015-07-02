<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enquiry extends MX_Controller {

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
		$this->load->model('enquiry/enquiry_model');
		$user_det = $this->session->userdata('logged_in'); 
		if($user_det['log_type']!='Agent')
		{
			$data["customers"]=$this->enquiry_model->get_customer_list();
			//echo "<pre>";print_r($data);
			
		}
		else
		{
			//print_r($user_det['user_id']);exit;
			$data["customers"]=$this->enquiry_model->get_agent_customer_list($user_det['user_id']['userid']);
		}
		//echo "<pre>"; print_r($data['customers']);exit;
		$data["agents"]=$this->enquiry_model->get_agent_list();
		$data["status_id"]=2;
		//echo "<pre>"; print_r($data['customers']);exit;
		$this->template->set_master_template('../../themes/'.$this->config->item("active_template").'/template.php');
		$this->template->write_view('content', 'enquiry/index',$data);
        $this->template->render();       
	}
	
	public function change_status()
	{
		$this->load->model('enquiry/enquiry_model');
		$aid=$this->input->post('id');
		$this->enquiry_model->approval_enquiry($aid);
		$data["agents"]=$this->enquiry_model->get_agent_list();
		//redirect($this->config->item('base_url').'enquiry/');
		
	}
	public function change_reject_status()
	{
		$this->load->model('enquiry/enquiry_model');
		$aid=$this->input->post('id');
		$data["status_id"]=$aid;
		$this->enquiry_model->change_reject_status($aid);
		//redirect($this->config->item('base_url').'enquiry/');
		
	}
	
	public function filter_table()
	{
		$this->load->model('enquiry/enquiry_model');
		$id=$this->input->post('status');
		//print_r($id);exit;
		$data["status_id"]=$id;
		$data["agents"]=$this->enquiry_model->get_agent_list();
		$data["customers"]=$this->enquiry_model->get_customer_by_app_status($id);
		//echo "<pre>";print_r($data["customers"]);exit;
		echo $this->load->view('view_table',$data);
	}
	
	public function export_filter_data($id)
	{
		$this->load->model('enquiry/enquiry_model');
		$data["customers"]=$this->enquiry_model->get_customer_by_app_status($id);
		echo $this->load->view('export_data_table',$data);
		
	}
	public function add_enquiry()
	{
		$this->load->model('enquiry/enquiry_model');
		$data["users"]=$this->enquiry_model->get_all_users();
		if($this->input->post())
		{
			
			$input=$this->input->post();
			
			$this->enquiry_model->add_enquiry($input);
			redirect($this->config->item('base_url')."enquiry/add_enquiry", "refresh");
		}
		$this->template->set_master_template('../../themes/'.$this->config->item("active_template").'/template.php');
		$this->template->write_view('content', 'enquiry/add_enquiry',$data);
        $this->template->render();       
	}
	
	public function edit_enquiry($id)
	{
	//print_r($id);
		$this->load->model('enquiry/enquiry_model');
		$user_det = $this->session->userdata('logged_in'); 
		$data["by_id"]=$this->enquiry_model->get_all_by_id($id);
		//print_r($data);exit;
		if($this->input->post())
		{
			$input=$this->input->post();
	        $this->enquiry_model->update_enquiry_id($id,$input);
			redirect($this->config->item('base_url')."enquiry/", "refresh",$data);
		}
		$data["customers"]=$this->enquiry_model->get_customer_list();
		//print_r($data["customers"]);exit;
		$data["users"]=$this->enquiry_model->get_all_users();
		$this->template->set_master_template('../../themes/'.$this->config->item("active_template").'/template.php');
		$this->template->write_view('content', 'enquiry/edit_enquiry',$data);
        $this->template->render();       
	}
	
	public function allocate_agent()
	{
		$this->load->model('enquiry/enquiry_model');
		$input=$this->input->post();
		//echo "<pre>"; print_r($input); 
		foreach($input['myarray'] as  $key => $val)
		{
			$this->enquiry_model->allocate_lead($input['agent_id'],$val); 
		}	
	}
	
	//import function code add jaga
	
	public function import_enqury()
 {
  $this->load->model('enquiry/enquiry_model');
  $this->template->set_master_template('../../themes/'.$this->config->item("active_template").'/template.php');
  $this->template->write_view('content', 'enquiry/import_enqury'); 
  $this->template->render();   
 }
 
 public function import_components_data()
 {
  $this->load->model('enquiry/enquiry_model');
  $csv_file = $_FILES['name_uplod']['tmp_name'];
  $csvfile = fopen($csv_file, 'r');
  $theData = fgets($csvfile);
  $i = 0;
  $insert_csv = array();
  while (!feof($csvfile)) 
  {
   $csv_data[] = fgets($csvfile, 1024);
   $csv_array = explode(",", $csv_data[$i]);
   $csv_array = array_filter($csv_array);
   
   if(empty($csv_array))
   {
    unset($csv_array);
   }
   else
   {
	   //echo"<pre>"; print_r($csv_array);exit;
    $insert_csv[$i]['id'] = "";
    $insert_csv[$i]['userid'] = $csv_array[1];
    $insert_csv[$i]['name'] = $csv_array[2];
    $insert_csv[$i]['phone'] = $csv_array[3];
    $insert_csv[$i]['distic'] = $csv_array[4];
    $insert_csv[$i]['village'] = $csv_array[5];
    $insert_csv[$i]['product_type'] = $csv_array[6];
    $insert_csv[$i]['remarks'] = $csv_array[7];
   // $insert_csv[$i]['approval_status'] = $csv_array[8];
//    $insert_csv[$i]['lead_status'] = $csv_array[9];
//    $insert_csv[$i]['agent_id'] = $csv_array[10];
//    $insert_csv[$i]['status'] = $csv_array[11];
//    $insert_csv[$i]['df'] = $csv_array[12];
	// echo"<pre>"; print_r($csv_array);exit;
     $i = $i + 1;
   }
  }
   
  
  $this->enquiry_model->import_comp($insert_csv);
  fclose($csvfile);
  //echo "File data successfully imported to database!!";
  redirect($this->config->item('base_url')."enquiry/import_enqury", "refresh");
  //mysql_close($connect); 
 }
 //import function code end jaga
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
