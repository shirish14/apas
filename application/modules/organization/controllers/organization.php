<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('organization_model', 'organization');
		$this->load->helper("url");
        $this->load->library("pagination");
		$this->load->library('form_validation');
		//$this->lang->load('organization');
		$this->load->helper(array('form','language'));
	}
	
	
	public function index()
	{
		
		$this->load->helper('url');
		
		$data['subheader'] = true; // this page needs the sub header.
		$data['header']['page_title'] = 'Organization Listing'; // title for the page
		$data['content']['view_name'] = 'org_list_view'; // name of the partial view to load
		$data['content']['view_data'] = array();
		$data['message']= $this->session->set_flashdata('message');
		$this->load->view('main_page_view',$data);
	}
	public function org_insert()
	{
		$data['groups'] = $this->organization->getname();
		$data['subheader'] = true; // this page needs the sub header.
		//$data['header']['page_title'] = 'Organization Insert'; // title for the page
		$data['content']['view_name'] = 'org_insert_view'; // name of the partial view to load
		$data['action']= 'organization/org_save';
	    $data['content']['view_data'] = array();	
		$this->load->view('main_page_view',$data);
		
		
	}
	
	public function org_list()
	{
	    $this->load->helper('url');
		
		$list = $this->organization->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $org_data) 
		   {
		    	$no++;
			    $row = array();
			    $row[] = $org_data->name;
				$row[] = $org_data->description;
				$row[] = $org_data->org_code;
			    $row[] = $org_data->tax_id;
				$row[] = $org_data->address1;
				$row[] = $org_data->city;
				$row[] = $org_data->state_code;
				$row[] = $org_data->county_code;
				$row[]='<a href="organization/org_update_page/'.$org_data->org_id.'"> <img src="'.base_url().'assets/img/edit.png" title="Edit"/></a>
				        <a href="organization/org_delete/'.$org_data->org_id.'"><img src="'.base_url().'assets/img/delete.png" title="Delete" onClick="return doconfirm();"/></a>';			
				 //anchor('country/country_view_page/'.$value->id,'Edit')			
				$data[] = $row;
		   }
           $output = array
		        (
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->organization->count_all(),
						"recordsFiltered" => $this->organization->count_filtered(),
						"data" => $data,
				);
			//output to json format
			echo json_encode($output);
	}
	public function org_save()
	{
		$id=$this->input->post('org_id');
	         if($id=='')
			 {
		           /* $this->form_validation->set_error_delimiters('<div class="error">', '</div>');	
					$this->form_validation->set_rules('name', 'Name', 'required');
		            $this->form_validation->set_rules('description', 'Description', 'required');
		            $this->form_validation->set_rules('business_unit_id', 'Business_unit_id', 'required');
		            $this->form_validation->set_rules('org_code', 'Org_code', 'required');
		            $this->form_validation->set_rules('tax_id', 'Tax_id', 'required');
		            $this->form_validation->set_rules('address1', 'Address1', 'required');
		            $this->form_validation->set_rules('address2', 'Address2', 'required');
		            $this->form_validation->set_rules('city', 'City', 'required');
		            $this->form_validation->set_rules('state_code', 'State_code', 'required');
		            $this->form_validation->set_rules('zip', 'Zip', 'required');
		            $this->form_validation->set_rules('county_code', 'County_code', 'required');
					if ($this->form_validation->run() == TRUE)
					{*/
					 $datafield = array(
				     'name' => $this->input->post('name'),
				     'description' => $this->input->post('description'),
					 'business_unit_id' => $this->input->post('business_unit_id'),
					 'org_code' => $this->input->post('org_code'),
					 'tax_id' => $this->input->post('tax_id'),
					 'address1' => $this->input->post('address1'),
					 'address2' => $this->input->post('address2'),
					 'city' => $this->input->post('city'),
				     'state_code' => $this->input->post('state_code'),
					 'zip' => $this->input->post('zip'),
					 'county_code' => $this->input->post('county_code'),
					 
				     );
				    
		             $insert = $this->organization->save($datafield);
		            
		            $this->session->set_flashdata('message', 'Inserted Successfully');
		             redirect('organization');
					//}
					/*else
					{
					 redirect('organization/org_insert');	
					}*/
		        }
		        else
		        {
		        $data = array(
				     'name' => $this->input->post('name'),
				     'description' => $this->input->post('description'),
					 'business_unit_id' => $this->input->post('business_unit_id'),
					 'org_code' => $this->input->post('org_code'),
					 'tax_id' => $this->input->post('tax_id'),
					 'address1' => $this->input->post('address1'),
					 'address2' => $this->input->post('address2'),
					 'city' => $this->input->post('city'),
				     'state_code' => $this->input->post('state_code'),
					 'zip' => $this->input->post('zip'),
					 'county_code' => $this->input->post('county_code'),
				);
		        $this->organization->update(array('org_id' => $this->input->post('org_id')), $data);
		        $this->session->set_flashdata('message','Updated Successfully');
		        redirect('organization');
		        }
		
		
	}
	public function org_update_page($id)
	{	
	    $data['groups'] = $this->organization->getname();
		$data['subheader'] = true; // this page needs the sub header.
		//$data['header']['page_title'] = 'Country Update'; // title for the page
		$data['content']['view_name'] = 'org_insert_view';
        $data['action']= 'organization/org_save';		// name of the partial view to load
		$get_data = $this->organization->get_by_id($id);
		$datafield['org_id'] = $get_data->org_id;
		$datafield['name'] = $get_data->name;
		$datafield['description']= $get_data->description;
		$datafield['business_unit_id'] = $get_data->business_unit_id;
		$datafield['org_code'] = $get_data->org_code;
		$datafield['tax_id']= $get_data->tax_id;
		$datafield['address1'] = $get_data->address1;
		$datafield['address2']= $get_data->address2;
		$datafield['city'] = $get_data->city;
		$datafield['state_code']= $get_data->state_code;
		$datafield['zip'] = $get_data->zip;
		$datafield['county_code'] = $get_data->county_code;
		$data['content']['view_data'] = $datafield;	
		$this->load->view('main_page_view',$data);
	}
	public function org_delete($id)
	{
		$this->organization->delete_by_id($id);
		$this->session->set_flashdata('message', 'Deleted Successfully');
		redirect('organization');
	}
	}
