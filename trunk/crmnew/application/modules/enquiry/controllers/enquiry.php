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
	public function change_rej_status()
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
		
		if($this->input->post())
		{
			$input=$this->input->post();
			//echo "<pre>";print_r($input);exit;
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
  //echo $csv_file; exit;
  $csvfile = fopen($csv_file, 'r');
  $theData = fgets($csvfile);
  $i = 0;
  $insert_csv = array();
  $check='';
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
			$insert_csv[$i]['userid'] = $csv_array[1];
			$insert_csv[$i]['name'] = $csv_array[2];
			$insert_csv[$i]['phone'] = $csv_array[3];
			$insert_csv[$i]['distic'] = $csv_array[4];
			$insert_csv[$i]['village'] = $csv_array[5];
			$insert_csv[$i]['product_type'] = $csv_array[6];
			$insert_csv[$i]['remarks'] = $csv_array[7];
			
				if(count($csv_array)!=7)
					$check=1;
		
			/*$insert_csv[$i]['approval_status'] = $csv_array[8];
			$insert_csv[$i]['lead_status'] = $csv_array[9];
			$insert_csv[$i]['agent_id'] = $csv_array[10];
			$insert_csv[$i]['status'] = $csv_array[11];
			$insert_csv[$i]['df'] = $csv_array[12];*/
			//echo"<pre>"; print_r($csv_array[6]);
			$i = $i + 1;
	   }
   
  }
  if($check==1)
  {
	  echo "File Upload Error...Kindly check all the datas are filled....<a href='".$this->config->item('base_url')."enquiry/import_enqury' class='btn btn-primary'>Back to Import Page</a>";
  }
  else
  {
		  if($csv_array[1] !='')
		  {
			   echo '<script> alert("Import error");
						 window.location="enquiry/import_enqury";
			   </script>';
		  
		  }
		  else
		  {
		   $this->enquiry_model->import_comp($insert_csv);
		  fclose($csvfile);
		  echo '<script> alert("Data Imported successfully..");
						 window.location="enquiry/import_enqury";
			   </script>';
			 
		  }
		  //print_r("File data successfully imported to database!!");
		  redirect($this->config->item('base_url')."enquiry/import_enqury", "refresh");
		  //mysql_close($connect); 
		 }
		 //import function code end jaga
  }
  public function export_datas($id)
  {
	  	$this->load->model('enquiry/enquiry_model');
		//print_r($id);exit;
		$data["status_id"]=$id;
		$data["agents"]=$this->enquiry_model->get_agent_list();
		$customers=$this->enquiry_model->get_customer_by_app_status($id);
	
		
		$this->load->library('Excel');
		 
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
  		$user_det = $this->session->userdata('logged_in'); 
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'S.No');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Enquiry source');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'Name');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'Phone Number');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'Village');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'District');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'Product Type');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'Date');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'Status');
		if($user_det['log_type']!='Agent'){
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', 'Allocated to');
		} 
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('B')->setWidth(20);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setWidth(20);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('D')->setWidth(20);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('E')->setWidth(20);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('F')->setWidth(20);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('G')->setWidth(20);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('H')->setWidth(20);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('I')->setWidth(20);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('J')->setWidth(20);
		
		$objPHPExcel->getActiveSheet(0)->getStyle('A1:J1')->getFont()->setBold(true);
        // Set fills
        $objPHPExcel->getActiveSheet(0)->getStyle('A1:J1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $objPHPExcel->getActiveSheet(0)->getStyle('A1:J1')->getFill()->getStartColor()->setARGB('3399ff');
		if(isset($customers) && !empty($customers))
		{
			$i=2;$j=1;
			foreach($customers as $cus)
			{
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $j);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$i, $cus["username"]);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i, $cus["name"]);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $cus["phone"]);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$i, $cus["distic"]);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$i, $cus["village"]);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, $cus["product_type"]);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$i, ($cus['post_dt']==0)?'--':date("d-M-Y",strtotime($cus["post_dt"])));
				if($cus["approval_status"]==2)
				{
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, 'Rejected');
				} 
                else if($cus["approval_status"]==1)
				{
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, 'Approved');
				}
                else
				{
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, 'Pending');
				}
				
				if($user_det['log_type']!='Agent'){
                   
                      if(isset($cus["allocate"]) && !empty($cus["allocate"]))
                        {
                            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$i, $cus['allocate'][0]['ag_al_user']);
                        }
                        else
                        {
                           $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$i, '');
                        } 
                  
                } 
				$i++;$j++;
			}
		}
		// Rename worksheet (worksheet, not filename)
		$objPHPExcel->getActiveSheet()->setTitle('Enquiry');
		
		
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Enquiry.xlsx"');
	
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');	
	
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
