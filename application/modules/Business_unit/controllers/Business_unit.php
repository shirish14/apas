<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business_unit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Business_model','business');
		$this->load->helper("url");
        $this->load->library("pagination");
		$this->lang->load('business');
		$this->load->helper(array('form','language'));
		$this->load->library('form_validation');
		$this->load->helper(array('form'));
	}
	
	public function index()
	{
		$this->load->helper('url');
		$data['subheader'] = true; // this page needs the sub header.
		$data['header']['page_title'] = 'Business Unit Listing'; // title for the page
		$data['content']['view_name'] = 'business_unit_listing_view'; // name of the partial view to load
		$data['content']['view_data'] = array();
		$data['message']= $this->session->set_flashdata('message');
		$this->load->view('main_page_view',$data);
	}
	
	public function business_list()
	{
	    $this->load->helper('url');
		$list = $this->business->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $business_data) 
		   {
		    	$no++;
			    $row = array();
			    $row[] = $business_data->name;
				$row[] = $business_data->description;
				$row[] = $business_data->tax_id;
				$row[] = $business_data->address1;
				$row[] = $business_data->address2;
				$row[] = $business_data->city;
				$row[] = $business_data->state_code;
				$row[]='<a  href="business_unit/business_view_page/'.$business_data->business_unit_id.'"> <img src="'.base_url().'assets/img/edit.png"/></a>
				        <a onclick="return confirm(\'Are you sure want to delete?\')" href="business_unit/business_delete/'.$business_data->business_unit_id.'"><img src="'.base_url().'assets/img/delete.png"/></a>';				
				 //anchor('country/country_view_page/'.$value->id,'Edit')			
				$data[] = $row;
			
		   }
           $output = array
		        (
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->business->count_all(),
						"recordsFiltered" => $this->business->count_filtered(),
						"data" => $data,
				);
			//output to json format
			echo json_encode($output);

	}
	
	public function business_insert_page()
	{
		$data['subheader'] = true; // this page needs the sub header.
		$data['header']['page_title'] = 'Business Unit insert'; // title for the page
		$data['content']['view_name'] = 'business_insert_update_view'; // name of the partial view to load
		$data['content']['view_data'] = array();	
		$this->load->view('main_page_view',$data);
	}
	
	public function business_view_page($id)
	{	
		$data['subheader'] = true; // this page needs the sub header.
		$data['header']['page_title'] = 'Business Unit Update'; // title for the page
		$data['content']['view_name'] = 'business_insert_update_view'; // name of the partial view to load
		$get_data = $this->business->get_by_id($id);
		$datafield['business_unit_id'] = $get_data->business_unit_id;
		$datafield['name'] = $get_data->name;
		$datafield['description'] = $get_data->description;
		$datafield['tax_id']= $get_data->tax_id;
		$datafield['bu_code']= $get_data->bu_code;
		$datafield['address1'] = $get_data->address1;
		$datafield['address2'] = $get_data->address2;
		$datafield['city'] = $get_data->city;
		$datafield['state_code'] = $get_data->state_code;
		$datafield['zip'] = $get_data->zip;
		$datafield['county_code'] = $get_data->county_code;
		$datafield['country'] = $get_data->country;
		$data['content']['view_data'] = $datafield;	
		$this->load->view('main_page_view',$data);
	}
	
	public function business_insert()
	{
	    
			
		 $id=$this->input->post('business_unit_id');
	         if($id=='')
	            {	
	                 $datafield = array(
				    'name' => $this->input->post('name'),
				     'description' => $this->input->post('description'),
					  'tax_id' => $this->input->post('tax_id'),
					  'bu_code' => $this->input->post('bu_code'),
				     'address1' => $this->input->post('address1'),
					  'address2' => $this->input->post('address2'),
				     'city' => $this->input->post('city'),
					  'state_code' => $this->input->post('state_code'),
				     'zip' => $this->input->post('zip'),
					  'county_code' => $this->input->post('county_code'),
				     'country' => $this->input->post('country'),
					  
				     );
				    $insert = $this->business->save($datafield);
		            $this->session->set_flashdata('message', 'Inserted Successfully');
		            redirect('business_unit');
		        }
		        else
		        {
					$data = array(
					'name' => $this->input->post('name'),
				     'description' => $this->input->post('description'),
					  'tax_id' => $this->input->post('tax_id'),
					   'bu_code' => $this->input->post('bu_code'),
				     'address1' => $this->input->post('address1'),
					  'address2' => $this->input->post('address2'),
				     'city' => $this->input->post('city'),
					  'state_code' => $this->input->post('state_code'),
				     'zip' => $this->input->post('zip'),
					  'county_code' => $this->input->post('county_code'),
				     'country' => $this->input->post('country'),
					);
					$this->business->update(array('business_unit_id' => $this->input->post('business_unit_id')), $data);
					$this->session->set_flashdata('message','Updated Successfully');
					redirect('business_unit');
						
				} 
		 
		 
	}
	
	public function business_delete($id)
	{
		$this->business->delete_by_id($id);
		$this->session->set_flashdata('message', 'Deleted Successfully');
		redirect('business_unit');
	}
}
