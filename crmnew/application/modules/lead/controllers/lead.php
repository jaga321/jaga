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
public function lead_export()
 {
  $this->load->model('lead/lead_model');
  
 $data["customers"]=$this->lead_model->get_customer_list();
 $data["cust"]=$this->lead_model->get_Dealer_list();
  //load PHPExcel library
  $this->load->library('Excel');
  // Create new PHPExcel object
  $objPHPExcel = new PHPExcel();
  $objPHPExcel->setActiveSheetIndex(0);
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'LEAD.No');
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Enquiry source');
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'Name');
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'Phone Number');
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'Village');
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'District');
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'Product Type');
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'Date');
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'Period');
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', 'Status');
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K1', 'Allocated to');
   
  
  $objPHPExcel->getActiveSheet(0)->getColumnDimension('B')->setWidth(15);
  $objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setWidth(15);
  $objPHPExcel->getActiveSheet(0)->getColumnDimension('D')->setWidth(15);
  $objPHPExcel->getActiveSheet(0)->getColumnDimension('E')->setWidth(15);
  $objPHPExcel->getActiveSheet(0)->getColumnDimension('F')->setWidth(15);
  $objPHPExcel->getActiveSheet(0)->getColumnDimension('G')->setWidth(15);
  $objPHPExcel->getActiveSheet(0)->getColumnDimension('H')->setWidth(15);
  $objPHPExcel->getActiveSheet(0)->getColumnDimension('I')->setWidth(15);
  $objPHPExcel->getActiveSheet(0)->getColumnDimension('J')->setWidth(15);
  $objPHPExcel->getActiveSheet(0)->getColumnDimension('K')->setWidth(15);
 
  
  
  $objPHPExcel->getActiveSheet(0)->getStyle('A1:M1')->getFont()->setBold(true);
        // Set fills
       $objPHPExcel->getActiveSheet(0)->getStyle('A1:M1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $objPHPExcel->getActiveSheet(0)->getStyle('A1:M1')->getFill()->getStartColor()->setARGB('3399ff');
   $i=2;$j=1;
   foreach($data['customers'] as $val)
   {//echo "<pre>";print_r($val);exit;
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $j);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$i, $val['userid']);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i, $val['name']);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $val['phone']);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$i, $val['distic']);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$i, $val['village']);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, $val['product_type']);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$i, $val['lead'][0]['post_dt']);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, $val['lead'][0]['days']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$i, $val['lead'][0]['status']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$i, $val['lead'][0]['delr_id']);
    $i++;$j++;
   }
 
 
  // Rename worksheet (worksheet, not filename)
  $objPHPExcel->getActiveSheet()->setTitle('Claims List');
  ob_end_clean();
  header('Content-type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="report.xls"');
  header('Cache-Control: max-age=0');
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
  $objWriter->save('php://output');
  //redirect($this->config->item('base_url').'lead/');
 }
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
