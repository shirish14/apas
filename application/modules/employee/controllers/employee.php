<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Employee_model','employee');
		$this->load->helper("url");
        $this->load->library("pagination");
		$this->lang->load('employee');
		$this->load->helper(array('form','language'));
		$this->load->library('form_validation');
		$this->load->helper(array('form'));
		 $this->load->helper(array('dropdown','form'));
	}
	
	public function index()
	{
		$this->load->helper('url');
		$data['subheader'] = true; // this page needs the sub header.
		$data['header']['page_title'] = 'Employee Unit Listing'; // title for the page
		$data['content']['view_name'] = 'employee_unit_listing_view'; // name of the partial view to load
		$data['content']['view_data'] = array();
		$data['message']= $this->session->set_flashdata('message');
		$this->load->view('main_page_view',$data);
	}
	
	public function employee_list()
	{
	    $this->load->helper('url');
		$list = $this->employee->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $employee_data) 
		   {
		    	$no++;
			    $row = array();
			    $row[] = $employee_data->first_name;
				$row[] = $employee_data->last_name;
				$row[] = $employee_data->gender;
				$row[] = $employee_data->date_of_birth;
				$row[] = $employee_data->email;
				$row[] = $employee_data->management_level;
				$row[] = $employee_data->manager_id;
				$row[]='<a  href="employee/employee_view_page/'.$employee_data->employee_id.'"> <img src="'.base_url().'assets/img/edit.png"/></a>
				        <a onclick="return confirm(\'Are you sure want to delete?\')" href="employee/employee_delete/'.$employee_data->employee_id.'"><img src="'.base_url().'assets/img/delete.png"/></a>';				
				 //anchor('country/country_view_page/'.$value->id,'Edit')			
				$data[] = $row;
			}
           $output = array
		        (
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->employee->count_all(),
						"recordsFiltered" => $this->employee->count_filtered(),
						"data" => $data,
				);
			//output to json format
			echo json_encode($output);

	}
	
	public function employee_insert_page()
	{
	
	
		$data['subheader'] = true; // this page needs the sub header.
		$data['header']['page_title'] = 'Employee insert'; // title for the page
		$data['content']['view_name'] = 'employee_insert_update_view'; // name of the partial view to load
		//$data['bus_id']=$this->get_business_unit();
		
         $data['bu_id'] = listData('business_unit','business_unit_id','name');
		 //$data['org_id']=$org_id = listData('organization','org_id', 'name');
		 // $data['org_id']=$org_id = listDataview('organization','org_id', 'name',1);
		 $data['org_id']= array();
		$data['content']['view_data'] = array();
		$this->load->view('main_page_view',$data);
		//echo json_encode($data['bu_id']);
	}
	
	public function employee_view_page($id)
	{	
		$data['subheader'] = true; // this page needs the sub header.
		$data['header']['page_title'] = 'Employee Update'; // title for the page
		$data['content']['view_name'] = 'employee_insert_update_view'; // name of the partial view to load
		$get_data = $this->employee->get_by_id($id);
		$datafield['employee_id'] = $get_data->employee_id;
		$datafield['first_name'] = $get_data->first_name;
		$datafield['last_name'] = $get_data->last_name;
		$datafield['middle_name']= $get_data->middle_name;
		$datafield['gender']= $get_data->gender;
		$datafield['date_of_birth'] = $get_data->date_of_birth;
		$datafield['emp_no'] = $get_data->emp_no;
		$datafield['email'] = $get_data->email;
		$datafield['password'] = $get_data->password;
		$datafield['management_level'] = $get_data->management_level;
		$datafield['manager_id'] = $get_data->manager_id;
		
		$datafield['business_unit_id'] = $get_data->business_unit_id;
		
		$datafield['bu_id'] = listData('business_unit','business_unit_id','name');
		
		//$datafield['organization_id'] = $get_data->organization_id;
		
		 //$datafield['$org_id'] = listDataview('organization','org_id', 'name','business_unit_id', $get_data->business_unit_id);
		 $datafield['org_id'] = listDataview('organization','org_id', 'name','business_unit_id', $get_data->business_unit_id);
		
		//$datafield['business_unit_id'] = $get_data->business_unit_id;
		//$this->get_business_all();
		//$datafield['business_unit_id'] = $get_data->business_unit_id;
		//$this->get_org_id_view();
		//$datafield['organization_id'] = $get_data->organization_id;
		
		
		$datafield['organization_id'] = $get_data->organization_id;
		$datafield['access'] = $get_data->access;
		$data['content']['view_data'] = $datafield;	
		$this->load->view('main_page_view',$data);
	}
	
	public function employee_insert()
	{
	    
			
		 $id=$this->input->post('employee_id');
	         if($id=='')
	            {	
	                 $datafield = array(
					 'first_name' => $this->input->post('first_name'),
				     'last_name' => $this->input->post('last_name'),
					 'middle_name' => $this->input->post('middle_name'),
					 'gender' => $this->input->post('gender'),
					 'date_of_birth' => $this->input->post('date_of_birth'),
					 'emp_no' => $this->input->post('emp_no'),
					 'email' => $this->input->post('email'),
					 'password' => $this->input->post('password'),
					 'management_level' => $this->input->post('management_level'),
					 'manager_id' => $this->input->post('manager_id'),
					 'organization_id' => $this->input->post('organization_id'),
					 'business_unit_id' => $this->input->post('business_unit_id'),
					 'access' => $this->input->post('access'),
 				     );
				    $insert = $this->employee->save($datafield);
		            $this->session->set_flashdata('message', 'Inserted Successfully');
		            redirect('employee');
		        }
		        else
		        {
					$data = array(
					 'first_name' => $this->input->post('first_name'),
				     'last_name' => $this->input->post('last_name'),
					 'middle_name' => $this->input->post('middle_name'),
					 'gender' => $this->input->post('gender'),
					 'date_of_birth' => $this->input->post('date_of_birth'),
					 'emp_no' => $this->input->post('emp_no'),
					 'email' => $this->input->post('email'),
					 'password' => $this->input->post('password'),
					 'management_level' => $this->input->post('management_level'),
					 'manager_id' => $this->input->post('manager_id'),
					 'organization_id' => $this->input->post('organization_id'),
					 'business_unit_id' => $this->input->post('business_unit_id'),
					 'access' => $this->input->post('access'),
					);
					$this->employee->update(array('employee_id' => $this->input->post('employee_id')), $data);
					$this->session->set_flashdata('message','Updated Successfully');
					redirect('employee');
						
				} 
		 
		 
	}
	
	public function employee_delete($id)
	{
		$this->employee->delete_by_id($id);
		$this->session->set_flashdata('message', 'Deleted Successfully');
		redirect('employee');
	}
	
	
	/* public function get_business_all() 
 {
	
	$bus_id = listData('business_unit','business_unit_id','name');
	echo form_dropdown('business_unit_id',$bus_id,'','id="business_unit_id"');
  }
	
	public function get_org_id1() 
	{
	 
 $table = $_POST['table'];
  $org_id = listDataview('organization','org_id', 'name',$table);
 
echo form_dropdown('organization_id',$org_id,'id="organization_id"');

    }*/
	public function get_business_all() 
 {
	//$this->employee_view_page();
	$bus_id = listData('business_unit','business_unit_id','name');
  echo form_dropdown('business_unit_id',$bus_id,$selected=!empty($data['business_unit_id'])?$data['business_unit_id']:'','id="business_unit_id"');
  }
	
	public function get_org_id() 
	{
	 
 $bussiness_id = $_POST['bussiness_id'];
  $org_id=array();
    $org_id = listDataview('organization','org_id', 'name','business_unit_id',$bussiness_id);
  
 //echo json_encode($org_id);
echo form_dropdown('organization_id',$org_id,$selected=!empty($data['organization_id'])?$data['organization_id']:'','id="organization_id"');

    }
	
	
	public function get_org_id_view() 
	{
	 
  //$table = $_POST['table'];
  $org_id = listData('organization','org_id', 'name');
 
echo form_dropdown('organization_id',$org_id,$selected=!empty($data['organization_id'])?$data['organization_id']:'','id="organization_id"');

 
    }
	
	
	
	/* public function get_org_id_comm() 
	{
	// $table = $_POST['table'];
	$org_id = listDataview('organization','org_id', 'name',$table);
	echo form_dropdown('year',$org_id,$selected=!empty($data['organization_id'])?$data['organization_id']:'','id="organization_id"');
	
    }*/
	
 public function get_org_id_all() 
 {
	
	$org_id = listData('organization','org_id', 'name');
	echo form_dropdown('organi_id',$org_id);
  }
	

 
function ajax_call() {
 echo '<script>alert("ajax");</script>';
 if ($_POST) 
 {
 
  $table = $_POST['table'];
  echo '<script>alert("ajax");</script>';
  $arrYear = $this->employee->get_year(1);
  foreach ($arrYear as $years) 
  {
   $arrFinal[$years->business_unit_id] = $years->business_unit_id;
  }
  //echo json_encode($arrFinal);
  echo form_dropdown('year',$arrFinal);
 } 
 
}	
	 
}
