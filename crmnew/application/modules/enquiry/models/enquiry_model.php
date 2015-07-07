<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Admin_model
 *
 * This model represents admin access. It operates the following tables:
 * admin,
 *
 * @package	i2_soft
 * @author	Elavarasan
 */
 
class Enquiry_model extends CI_Model{

   
    private $table_name	= 'enquiry';	
	 private $table_name1	= 'user';	
	
	function __construct()
	{
		parent::__construct();

	}
	
	
  public function get_customer_list()
  {
		$this->db->select('enquiry.*,enquiry.id as e_id,enquiry.post_dt as p_date');
		$this->db->select('user.*,user.id as u_id');
		$this->db->join('user','user.user_id=enquiry.userid','left');
		$query = $this->db->get($this->table_name)->result_array();
		//echo "<pre>"; print_r($query); exit;
		
		//select * from enquiry as a,user as b WHERE a.userid=b.user_id
		
		$i=0;
		foreach($query as $val)
		{
			$this->db->select('user.username as ag_al_user');
			$this->db->where('id',$val['agent_id']);
			$query[$i]['allocate']=$this->db->get('user')->result_array();	
			$i++;
		}
		
		return $query;
		
		
	}
	
	public function get_agent_customer_list($id)
  	{
		$this->db->select('enquiry.*,enquiry.id as e_id,enquiry.post_dt as p_date');
		$this->db->select('user.*,user.id as u_id');
		$this->db->join('user','user.user_id=enquiry.userid','left');
		$this->db->where('agent_id',$id);
		
		
		/*$this->db->where('approval_status',0);
		$this->db->where('df',1);*/
		$query = $this->db->get($this->table_name);
		if ($query->num_rows() >= 1) 
		{
			return $query->result_array();
		}
		return false;
	}
	
	
	public function approval_enquiry($aid)
   {
	  	$t = time(); $cur_time = date("Y-m-d H:i:s",$t);
		$data = array('approval_status' =>1,'df' =>1,'post_dt'=>$cur_time);
    	$this->db->where('id', $aid);
    	$this->db->update('enquiry', $data); 		
	}
	
	public function change_reject_status($aid)
   {
	 $t = time(); $cur_time = date("Y-m-d H:i:s",$t);
	$data = array('df' =>1,'approval_status' =>2,'post_dt'=>$cur_time);
    	$this->db->where('id', $aid);
    	$this->db->update('enquiry', $data); 		
	}
	public function get_agent_list()
	{
		$this->db->select('user.*');
		$this->db->where('log_type','Agent');
		$query = $this->db->get($this->table_name1);
		if ($query->num_rows() >= 1) 
		{
			return $query->result_array();
		}
		return false;
		
	}
	
	
	public function get_customer_by_app_status($id)
  {
	  if($id==0)
	  {
		$this->db->select('enquiry.*');
		$this->db->select('user.username');
		$this->db->join('user','user.user_id=enquiry.userid');
		$query = $this->db->get($this->table_name)->result_array();
		$i=0;
		foreach($query as $val)
		{
			$this->db->select('user.username as ag_al_user');
			$this->db->where('id',$val['agent_id']);
			$query[$i]['allocate']=$this->db->get('user')->result_array();	
			$i++;
		}
		
		return $query;
		
		  
	  }
	  else
	  {
		$this->db->select('enquiry.*');
		$this->db->select('user.username');
		$this->db->join('user','user.user_id=enquiry.userid');
		$this->db->where('approval_status', $id);
		$query = $this->db->get($this->table_name)->result_array();
		$i=0;
		foreach($query as $val)
		{
			$this->db->select('user.username as ag_al_user');
			$this->db->where('id',$val['agent_id']);
			$query[$i]['allocate']=$this->db->get('user')->result_array();	
			$i++;
		}
		
		return $query;
	  }
	}
	
	public function get_all_users()
	{
		$this->db->select('user.*');
		$this->db->where('status',1);
		$query = $this->db->get($this->table_name1);
		if ($query->num_rows() >= 1) 
		{
			return $query->result_array();
		}
		return false;
	}
	
	public function add_enquiry($input)
	{
		$t = time(); $cur_time = date("Y-m-d H:i:s",$t);
		//echo "<pre>";print_r($input);exit;
		$query = $this->db->insert('enquiry',$input['enquiry']);
		if($query)
		return true;
	}
	
	public function get_all_by_id($id)
	{
		$this->db->select('enquiry.*');
		$this->db->where('id',$id);
		$query = $this->db->get($this->table_name);
		//print_r($query->result_array());exit;
		if ($query->num_rows() >= 1) 
		{
			return $query->result_array();
		}
		return false;
	}
	public function update_enquiry_id($id,$input)
	{
		//print_r($id);exit;
		$this->db->where('id', $id);
		
		$data=array('userid'=>$input['enquiry_edit'],'name'=>$input['name_edit'],'phone'=>$input['phone_edit'],
			'distic'=>$input['distic_edit'],'village'=>$input['village_edit'],'product_type'=>$input['product_edit'],'approval_status'=>$input['st_edit']);
		if ($this->db->update($this->table_name, $data)) {
			
			return true;
		}
		
	}
	
	public function allocate_lead($agent_id,$id)
	{
		$data = array('agent_id' =>$agent_id);
    	$this->db->where('id', $id);
    	$this->db->update('enquiry', $data); 	
	}
	
	
	
	//import option code add jaga
	function import_comp($data)
	{
		foreach($data as $val)
		{
			$this->db->insert('enquiry', $val);
		}
	}
 //end import
	
	
	}