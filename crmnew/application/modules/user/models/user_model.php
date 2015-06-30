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
 
class User_model extends CI_Model{

   
    private $table_name	= 'user';	
	
	function __construct()
	{
		parent::__construct();

	}
	
	
  public function get_customer_list()
  {
		$this->db->select('*');
		$this->db->where('status',1);
		$query = $this->db->get($this->table_name);
		if ($query->num_rows() >= 1) 
		{
			return $query->result_array();
		}
		return false;
	}
	public function add_user($fm_inputs)
  {
	    $t = time(); $cur_time = date("Y-m-d H:i:s",$t);
		$password=md5($fm_inputs['password']);
		$data=array('username'=>$fm_inputs['name'],'user_id'=>$fm_inputs['user_id'],'password'=>$password,'phone_no'=>$fm_inputs['p_number'],
			'address'=>$fm_inputs['address'],'log_type'=>$fm_inputs['user_type'],'del_point'=>$fm_inputs['credit_point'],'post_dt'=>$cur_time);
		$query = $this->db->insert('user',$data);
		if($query)
		return true;
	}
	
	  
 public function get_customer_list1($id)
  {
	  //print_r($id);exit;
		$this->db->select('*');
		$this->db->where('status',1);
		$this->db->where('id',$id);
		$query = $this->db->get($this->table_name);
		//echo $query;exit;
		if ($query->num_rows() >= 1) 
		{
			return $query->result_array();
		}
		
		return false;
	}
	
	 public function get_customer_delete($id)
  {
	 $this->db->where('id', $id);
		$this->db->update($this->table_name,$data=array('status'=>0));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		return false;
	}
	
	
	
	
	 public function update_user($id,$input)
  {
	  //echo "<pre>"; print_r($input);exit;
	
		$this->db->where('id', $id);
		$password_up=md5($fm_inputs['password_up']);
		if($password_up='')
		{
		if($input['user_type_up']=='Delear')
		{
			$data=array('username'=>$input['name_up'],'user_id'=>$input['user_id_up'],'phone_no'=>$input['p_number_up'],
			'address'=>$input['address_up'],'log_type'=>$input['user_type_up'],'del_point'=>$input['credit_point_up']);
		}
		else
		{
			$data=array('username'=>$input['name_up'],'user_id'=>$input['user_id_up'],'phone_no'=>$input['p_number_up'],
			'address'=>$input['address_up'],'log_type'=>$input['user_type_up'],'del_point'=>0);
		}
		}else
		{
			if($input['user_type_up']=='Delear')
		{
			$data=array('username'=>$input['name_up'],'user_id'=>$input['user_id_up'],'phone_no'=>$input['p_number_up'],
			'address'=>$input['address_up'],'log_type'=>$input['user_type_up'],'password'=>$password_up,'del_point'=>$input['credit_point_up']);
		}
		else
		{
			$data=array('username'=>$input['name_up'],'password'=>$password_up,'user_id'=>$input['user_id_up'],'phone_no'=>$input['p_number_up'],
			'address'=>$input['address_up'],'log_type'=>$input['user_type_up'],'del_point'=>0);
		}
		}
		if ($this->db->update($this->table_name, $data)) {
			
			return true;
		}
		return false;
  }
	
 	 
}