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
	
	  

	
 	 
}