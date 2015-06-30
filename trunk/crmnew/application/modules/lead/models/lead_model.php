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
 
class Lead_model extends CI_Model{

   
    private $table_name	= 'enquiry';
	private $table_name1	= 'lead';
	private $table_name2  = 'user';	
	
	function __construct()
	{
		parent::__construct();

	}

   public function get_customer_list()
  {
		$this->db->select('enquiry.*');
		$this->db->select('user.username');
		$this->db->join('user','user.user_id=enquiry.userid');
		$this->db->where('enquiry.approval_status',1);		
		$query = $this->db->get($this->table_name)->result_array();
		$i=0;
		foreach($query as $val)
		{
			$this->db->select('lead.*,lead.id as l_id');
			$this->db->where('enquiry_id',$val['id']);
			$this->db->where('userid',$val['userid']);
			$query[$i]['lead']=$this->db->get('lead')->result_array();	
			$i++;
		}
		//echo "<pre>"; print_r($query); exit;
		return $query;
 }
 
  public function get_agent_customer_list($id)
  {
		$this->db->select('enquiry.*');
		$this->db->select('user.username');
		$this->db->where('agent_id',$id);
		$this->db->join('user','user.user_id=enquiry.userid');
		$this->db->where('enquiry.approval_status',1);		
		$query = $this->db->get($this->table_name)->result_array();
		$i=0;
		foreach($query as $val)
		{
			$this->db->select('lead.*');
			$this->db->where('enquiry_id',$val['id']);
			$this->db->where('userid',$val['userid']);
			$query[$i]['lead']=$this->db->get('lead')->result_array();	
			$i++;
		}
		//echo "<pre>"; print_r($query); exit;
		return $query;
 }
 		
	
  public function get_customer_list_old()
  {
		$this->db->select('enquiry.*');
		$this->db->select('user.username');
		$this->db->join('user','user.user_id=enquiry.userid');
		$this->db->where('enquiry.approval_status',1);		
		$query = $this->db->get($this->table_name)->result_array();
		$i=0;
		foreach($query as $val)
		{
			$this->db->select('user.username as buyer');
			$this->db->where('user_id',$val['buyer_id']);
			$query[$i]['buyer']=$this->db->get('user')->result_array();	
			$i++;
		}
		
		return $query;
 }
 
  public function add_lead_by_id($input)
  {
	  			
	  	$t = time(); $cur_time = date("Y-m-d H:i:s",$t);
		$exp_date=date('Y-m-d H:i:s', strtotime("".$input['days']." days"));
		 if($input['d_stats']!=1)
 		 {
				$insert_data = array('days' =>$input['days'],'enquiry_id' =>$input['id'],'dealer' =>$input['d_stats'],
				'userid' =>$input['user_id'],'delr_id' =>$input['dealer'],'status' =>$input['status'],'post_dt'=>$cur_time,
				'expiry_date'=>$exp_date,'lead_status' =>1);
		 }
		 else
		 {
			 $insert_data = array('days' =>$input['days'],'enquiry_id' =>$input['id'],'dealer' =>$input['d_stats'],
				'userid' =>$input['user_id'],'delr_id' =>'All','status' =>$input['status'],'post_dt'=>$cur_time,
				'expiry_date'=>$exp_date,'lead_status' =>1);
		 }
		//echo "<pre>"; print_r($insert_data);exit;
		$lead=$this->db->insert('lead', $insert_data);
		//echo "<pre>"; print_r($lead); exit;
		if($lead)
		{					 
			$data = array('lead_status' =>1);
			$this->db->select('user.username');
		    $this->db->join('user','user.delr_id=enquiry.userid');
			$this->db->where('userid', $input['user_id']);
			$this->db->where('id', $input['id']);
			$this->db->update('enquiry', $data); 		
		}
  }
  
  public function update_lead_by_id($input)
  {
//echo "<pre>"; print_r($input);exit;
	$data = array('days' =>$input['days'],'enquiry_id' =>$input['id'],'dealer' =>$input['d_stats'],'userid' =>$input['user_id'],'delr_id' =>$input['dealer_name'],'status' =>$input['status']);
 	$this->db->where('id', $input['lead_id']);
	$this->db->where('userid', $input['user_id']);
	//$this->db->where('id', $input['id']);
	$this->db->update('lead', $data); 		
  }
  
  
  
 public function get_Dealer_list()
	 {
		
			$this->db->select('user.*');
			$this->db->where('log_type','Delear');
			$query = $this->db->get($this->table_name2)->result_array();
		
		//echo "<pre>"; print_r($query[0]['username']); exit;
		return $query;
		 
	 }
	  

	
 	 
}