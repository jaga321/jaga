<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {

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
		$this->load->model('admin/admin_model');
	
			$data["admin"]=$this->admin_model->get_admin();
			//	echo"<pre>"; print_r($data);exit;
		if($this->input->post())
		{
			//echo "<pre>";print_r($this->input->post());exit;
			$data=$this->admin_model->login($this->input->post());
			if(isset($data) && !empty($data))
			{			
				$this->session->set_userdata('user_info', $data);
 				redirect($this->config->item('base_url').'admin/dashboard');
			}
			else
				redirect($this->config->item('base_url').'admin?login=fail');
			
		}
		//echo $this->config->item("active_template");exit;<?php 
	
		$this->template->set_master_template('../../themes/'.$this->config->item("active_template").'/template_login.php');
		$this->template->write_view('content', 'admin/index');
        $this->template->render();       
	}
	public function dashboard()
	{
		$this->template->set_master_template('../../themes/'.$this->config->item("active_template").'/template.php');
		$this->template->write_view('content', 'admin/dashboard');
        $this->template->render();  
	}
	
	public function account()
	{
		$this->load->model('admin/admin_model');
		if($this->input->post())
		{
			$input=$this->input->post();
			$data=array('username'=>$input['username'],'password'=>md5($input['password']));
			$this->admin_model->update_admin_user($data);
			redirect($this->config->item('base_url')."enquiry/", "refresh");
		}
		$this->template->set_master_template('../../themes/'.$this->config->item("active_template").'/template.php');
		$this->template->write_view('content', 'admin/account');
        $this->template->render();  
	}
	
	
	
	//login  verification code
	public function verify()
	{
		$this->load->model('admin/admin_model');
		
		$email=$this->security->xss_clean($this->input->post('email'));
                $password=$this->security->xss_clean($this->input->post('upass'));	
		$u_type=$this->input->post('u_type');
		//print_r($this->input->post('email'));exit;
		if($u_type=='Agent')
		{
			
			$result = $this->admin_model->check_agent_login($email,$password,$u_type);
		}
		else
		{
			$result = $this->admin_model->check_login($email,$password);
		}
		//echo "<pre>"; print_r($result); exit;
		if($result)
		{
			
			foreach($result as $row)
      		{
        		$sess_array = array('email'=>$row['username'],'application'=>'crmnew','user_id'=>$row['id'],'log_type'=>$row['log_type'],'userid'=>$row['user_id']);
        		$this->session->set_userdata('logged_in', $sess_array);								
	  		}
			
			$user_det = $this->session->userdata('logged_in');
					
			$ipaddress =gethostbyname(trim(`hostname`));
			
			$t = time(); $cur_time = date("Y-m-d H:i:s",$t);
			$insert_login_log=array('users_id'=>$user_det['user_id'],'ip_address'=>$ipaddress,'post_dt'=>$cur_time,'online_status'=>1);
			
			$this->admin_model->insert_login_log($insert_login_log);
			
			
		    redirect($this->config->item('base_url').'enquiry/enquiry');				
		
		}
		else
		{
			redirect($this->config->item('base_url').'admin?check=fail');
		} 
	}
	
	//login  verification code
	
	public function enquiry()
	{
		$this->template->set_master_template('../../themes/'.$this->config->item("active_template").'/template.php');
		$this->template->write_view('content', 'admin/enquiry');
        $this->template->render();  
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect($this->config->item('base_url').'admin/');
	}
	
	public function update_profile()
	{
		$this->load->model('admin/admin_model');
		if($this->input->post())
		{
			$conpany_details=$this->input->post('company');
			$this->admin_model->insert_company_details($conpany_details);
			$data["admin"]=$this->admin_model->get_admin();
			$this->load->helper('text');
			
			$config['upload_path'] = './admin_image/original';
			
			$config['allowed_types'] = '*';
			
			$config['max_size']	= '2000';
			
			$this->load->library('upload', $config);
			
			$upload_data['file_name']=$_FILES;
			if(isset($_FILES) && !empty($_FILES))
			{
				$upload_files = $_FILES;
				if($upload_files['admin_image'] !='')
				{
					$_FILES['admin_image'] = array(
					'name' => $upload_files['admin_image']['name'],
					'type' => $upload_files['admin_image']['type'],
					'tmp_name' => $upload_files['admin_image']['tmp_name'],
					'error' => $upload_files['admin_image']['error'],
					'size' => '2000'
					);
				$this->upload->do_upload('admin_image');
				
				$upload_data = $this->upload->data();
				
				$dest= getcwd()."/admin_image/original/" .$upload_data['file_name'];
				
				$src=$this->config->item("base_url").'admin_image/original/'.$upload_data['file_name'];
				
				}
			}
			
			$id=$this->input->post('id');
		
			$password=$this->input->post('password');
   
			if((!$password) && empty($password))
			{
					if($upload_data['file_name']!='')
					{
						$input_data['admin']['admin_image']=$upload_data['file_name'];
						$input=array('username'=>$this->input->post('admin_name'),'admin_image'=>$upload_data['file_name']);
						$this->admin_model->update_profile($input,$id);
					}
			}
			else
			{
				$pass=md5($password);
				$input_data['admin']['admin_image']=$upload_data['file_name'];
				$input=array('username'=>$this->input->post('admin_name'),'password'=>$pass);
				$this->admin_model->update_profile($input,$id);
			}
			
			redirect($this->config->item('base_url').'admin/dashboard');
		}
		$data["admin"]=$this->admin_model->get_admin();
		$data['company_details']=$this->admin_model->get_company_details();
		$this->template->write_view('content', 'admin/update_profile',$data);
        $this->template->render();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */