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
 
class Admin_model extends CI_Model{

   
    private $table_name	= 'admin';
	private $table_name0	= 'company_details';	
	private $table_name1	= 'user';	
	private $table_name3	= 'sales_order';	
	private $table_name4	= 'package';
	private $table_name5	= 'login_log';	
	function __construct()
	{
		parent::__construct();

	}
	public function check_login($email,$password)
	{ 
		$this->db->select('username,id,log_type');
		$this->db->where('username',$email);
		$this->db->where('password',md5($password));
		$query = $this->db->get($this->table_name);
		
		if ($query->num_rows() >= 0) {
			return $query->result_array();
		}
		return false;
	}
	
	public function insert_login_log($data)
	{ 
		if ($this->db->insert($this->table_name5, $data)) {
			$id = $this->db->insert_id();
			
			return array('id' => $id);
		}
		return false;
	}
	
	public function check_agent_login($email,$password,$u_type)
	{ 
		$this->db->select('username,id,log_type,user_id');
		$this->db->where('user_id',$email);
		$this->db->where('password',md5($password));
		$this->db->where('log_type',$u_type);
		$query = $this->db->get($this->table_name1);
		
		if ($query->num_rows() >= 0) {
			return $query->result_array();
		}
		return false;
	}
	
	
	
	public function get_admin()
	{
		
		$this->db->select('*');
		$query = $this->db->get($this->table_name)->result_array();
		return $query;
	}
	
	public function update_admin_user($data)
	{
		
		$this->db->where('id', '1');
		if ($this->db->update($this->table_name, $data)) {
			
			return true;
		}
		return false;
	}
	
	
		
	function update_profile($data,$id){
	  
		$this->db->where('id', $id);
		if ($this->db->update($this->table_name, $data)) {
			
			return true;
		}
		return false;
  }
  function insert_company_details($data)
  {
	  $this->db->where('id', 1);
		if ($this->db->update($this->table_name1, $data)) {
			
			return true;
		}
		return false;
  }
  function get_company_details()
  {
	  	$this->db->select('*');
		$query = $this->db->get($this->table_name1)->result_array();
		return $query;
  }
  function get_purchase_report($from_date,$to_date)
  {
		$this->db->select('SUM(full_total) AS total_qty,SUM(net_total) AS total_val');
		$this->db->where("DATE_FORMAT(".$this->table_name2.".inv_date,'%Y-%m-%d') >='".$from_date."' AND DATE_FORMAT(".$this->table_name2.".inv_date,'%Y-%m-%d') <= '".$to_date."'" );
		$this->db->where($this->table_name2.'.status',1);
		$this->db->where($this->table_name2.'.df',0);
	 	$query = $this->db->get($this->table_name2)->result_array();
		
		$current_day = date("N");
		$days_to_friday = 7 - $current_day;
		$days_from_monday = $current_day - 1;
		$monday = date("Y-m-d", strtotime("- {$days_from_monday} Days"));
		$sunday = date("Y-m-d", strtotime("+ {$days_to_friday} Days"));
		
		$this->db->select('SUM(net_total) AS this_week_total_val');
		$this->db->where("DATE_FORMAT(".$this->table_name2.".inv_date,'%Y-%m-%d') >='".$monday."' AND DATE_FORMAT(".$this->table_name2.".inv_date,'%Y-%m-%d') <= '".$sunday."'" );
		$this->db->where($this->table_name2.'.status',1);
		$this->db->where($this->table_name2.'.df',0);
	 	$query['last_week'] = $this->db->get($this->table_name2)->result_array();
		return $query;
  }
  function get_sales_report($from_date,$to_date)
  {
		$this->db->select('SUM(full_total) AS total_qty,SUM(net_final_total) AS total_val');
		$this->db->where("DATE_FORMAT(".$this->table_name3.".inv_date,'%Y-%m-%d') >='".$from_date."' AND DATE_FORMAT(".$this->table_name3.".inv_date,'%Y-%m-%d') <= '".$to_date."'" );
		$this->db->where($this->table_name3.'.status',1);
		$this->db->where($this->table_name3.'.df',0);
	 	$query = $this->db->get($this->table_name3)->result_array();
		
		$current_day = date("N");
		$days_to_friday = 7 - $current_day;
		$days_from_monday = $current_day - 1;
		$monday = date("Y-m-d", strtotime("- {$days_from_monday} Days"));
		$sunday = date("Y-m-d", strtotime("+ {$days_to_friday} Days"));
		
		$this->db->select('SUM(net_final_total) AS this_week_total_val');
		$this->db->where("DATE_FORMAT(".$this->table_name3.".inv_date,'%Y-%m-%d') >='".$monday."' AND DATE_FORMAT(".$this->table_name3.".inv_date,'%Y-%m-%d') <= '".$sunday."'" );
		$this->db->where($this->table_name3.'.status',1);
		$this->db->where($this->table_name3.'.df',0);
	 	$query['last_week'] = $this->db->get($this->table_name3)->result_array();
		return $query;
  }
  function get_package_report($from_date,$to_date)
  {
		$this->db->select('SUM(total_qty) AS total_qty');
		$this->db->where("DATE_FORMAT(".$this->table_name4.".created_date,'%Y-%m-%d') >='".$from_date."' AND DATE_FORMAT(".$this->table_name4.".created_date,'%Y-%m-%d') <= '".$to_date."'" );
		$this->db->where($this->table_name4.'.status',1);
	 	$query = $this->db->get($this->table_name4)->result_array();
		
		$current_day = date("N");
		$days_to_friday = 7 - $current_day;
		$days_from_monday = $current_day - 1;
		$monday = date("Y-m-d", strtotime("- {$days_from_monday} Days"));
		$sunday = date("Y-m-d", strtotime("+ {$days_to_friday} Days"));
		
		$this->db->select('SUM(total_qty) AS this_week_total_val');
		$this->db->where("DATE_FORMAT(".$this->table_name4.".created_date,'%Y-%m-%d') >='".$monday."' AND DATE_FORMAT(".$this->table_name4.".created_date,'%Y-%m-%d') <= '".$sunday."'" );
		$this->db->where($this->table_name4.'.status',1);
	 	$query['last_week'] = $this->db->get($this->table_name4)->result_array();
		return $query;
  }
  
  
	  function get_qty_chart()
	  {	
	  		$list_array=array(4,5,6,7,8,9,10,11,12,13,14,15);			
			$result=array();
			foreach($list_array as $val)
			{
				if(date('m')>3)
				{
					if($val=='13')
					{
						$date=(date('Y')+1). '-' . str_pad(1, 2, '0', STR_PAD_LEFT);	
					}
					elseif($val=='14')
					{
						$date=(date('Y')+1). '-' . str_pad(2, 2, '0', STR_PAD_LEFT);	
					}
					elseif($val=='15')
					{
						$date=(date('Y')+1). '-' . str_pad(3, 2, '0', STR_PAD_LEFT);		
					}
					else
					{
						if($val < 10)
							$date=date('Y').'-'.str_pad($val, 2, '0', STR_PAD_LEFT);	
						else
							$date=date('Y').'-'.$val;	
					}
				}
				else
				{
					if($val=='13')
					{
						$date=date('Y'). '-0' . str_pad(1, 2, '0', STR_PAD_LEFT);
					}
					elseif($val=='14')
					{
						$date=date('Y'). '-0' . str_pad(2, 2, '0', STR_PAD_LEFT);	
					}
					elseif($val=='15')
					{
						$date=date('Y'). '-0' . str_pad(3, 2, '0', STR_PAD_LEFT);
					}
					else
					{
						if($val < 10)
							$date=(date('Y')-1).'-'.str_pad($val, 2, '0', STR_PAD_LEFT);	
						else	
							$date=(date('Y')-1).'-'.$val;	
					}
				}

				$this->db->select('SUM(full_total) AS total_qty');
				$this->db->where("DATE_FORMAT(".$this->table_name2.".inv_date,'%Y-%m')",$date);
				$this->db->where($this->table_name2.'.status',1);
				$this->db->where($this->table_name2.'.df',0);
				$query = $this->db->get($this->table_name2)->result_array();
				if(!empty($query[0]['total_qty']))
					$result[$val]=$query[0]['total_qty'];
				else
					$result[$val]=0;
				
			}
			return $result;
 	 }
	 function get_qty_chart1()
	  {	
	  		$list_array=array(4,5,6,7,8,9,10,11,12,13,14,15);			
			$result=array();
			foreach($list_array as $val)
			{
				if(date('m')>3)
				{
					if($val=='13')
					{
						$date=(date('Y')+1). '-' . str_pad(1, 2, '0', STR_PAD_LEFT);	
					}
					elseif($val=='14')
					{
						$date=(date('Y')+1). '-' . str_pad(2, 2, '0', STR_PAD_LEFT);	
					}
					elseif($val=='15')
					{
						$date=(date('Y')+1). '-' . str_pad(3, 2, '0', STR_PAD_LEFT);		
					}
					else
					{
						if($val < 10)
							$date=date('Y').'-'.str_pad($val, 2, '0', STR_PAD_LEFT);	
						else
							$date=date('Y').'-'.$val;	
					}
				}
				else
				{
					if($val=='13')
					{
						$date=date('Y'). '-0' . str_pad(1, 2, '0', STR_PAD_LEFT);
					}
					elseif($val=='14')
					{
						$date=date('Y'). '-0' . str_pad(2, 2, '0', STR_PAD_LEFT);	
					}
					elseif($val=='15')
					{
						$date=date('Y'). '-0' . str_pad(3, 2, '0', STR_PAD_LEFT);
					}
					else
					{
						if($val < 10)
							$date=(date('Y')-1).'-'.str_pad($val, 2, '0', STR_PAD_LEFT);	
						else	
							$date=(date('Y')-1).'-'.$val;	
					}
				}
				
				$this->db->select('SUM(full_total) AS total_qty');
				$this->db->where("DATE_FORMAT(".$this->table_name3.".inv_date,'%Y-%m')",$date);
				$this->db->where($this->table_name3.'.status',1);
				$this->db->where($this->table_name3.'.df',0);
				$query = $this->db->get($this->table_name3)->result_array();
				if(!empty($query[0]['total_qty']))
					$result[$val]=$query[0]['total_qty'];
				else
					$result[$val]=0;
				
			}
			return $result;
 	 }
}