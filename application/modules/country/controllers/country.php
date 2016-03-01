<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('country_model', 'country');
		$this->load->helper("url");
        $this->load->library("pagination");
		$this->lang->load('country');
		$this->load->helper(array('form','language'));
		$this->load->library('form_validation');
		$this->load->helper(array('form'));
	}
	
	public function index()
	{
		$this->load->helper('url');
		$data['subheader'] = true; // this page needs the sub header.
		$data['header']['page_title'] = 'Country Listing'; // title for the page
		$data['content']['view_name'] = 'country_listing_view'; // name of the partial view to load
		$data['content']['view_data'] = array();
		$data['message']= $this->session->set_flashdata('message');
		$this->load->view('main_page_view',$data);
	}
	
	public function country_list()
	{
	    $this->load->helper('url');
		
		$list = $this->country->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $country_data) 
		   {
		    	$no++;
			    $row = array();
			    $row[] = $country_data->code;
				$row[] = $country_data->name;
				$row[]='<a href="country/country_view_page/'.$country_data->id.'"> <img src="'.base_url().'assets/img/edit.png"/></a>
				        <a onclick="return confirm(\'Are you sure want to delete?\')" href="country/country_delete/'.$country_data->id.'"><img src="'.base_url().'assets/img/delete.png"/></a>';
  
				 //anchor('country/country_view_page/'.$value->id,'Edit')			
				$data[] = $row;
		   }
           $output = array
		        (
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->country->count_all(),
						"recordsFiltered" => $this->country->count_filtered(),
						"data" => $data,
				);
			//output to json format
			echo json_encode($output);
	}
	
	public function country_insert_page()
	{
		$data['subheader'] = true; // this page needs the sub header.
		$data['header']['page_title'] = 'Add Country'; // title for the page
		$data['content']['view_name'] = 'insert_update_view'; // name of the partial view to load
		$data['content']['view_data'] = array();	
		$this->load->view('main_page_view',$data);
	}
	
	public function country_view_page($id)
	{	
		$data['subheader'] = true; // this page needs the sub header.
		$data['header']['page_title'] = 'Country Update'; // title for the page
		$data['content']['view_name'] = 'insert_update_view'; // name of the partial view to load
		$get_data = $this->country->get_by_id($id);
		$datafield['country_id'] = $get_data->id;
		$datafield['country_code']= $get_data->code;
		$datafield['country_name'] = $get_data->name;
		$data['content']['view_data'] = $datafield;	
		$this->load->view('main_page_view',$data);
	}
	
	public function country_insert()
	{
	   
			
		 $id=$this->input->post('country_id');
	         if($id=='')
	            {	
	                 $datafield = array(
				    'name' => $this->input->post('country_name'),
				     'code' => $this->input->post('country_code'),
				     );
				    $insert = $this->country->save($datafield);
		            $this->session->set_flashdata('message', 'Inserted Successfully');
		            redirect('country');
		        }
		        else
		        {
				
					$data = array(
					'name' => $this->input->post('country_name'),
					'code' => $this->input->post('country_code'),
					);
					$this->country->update(array('id' => $this->input->post('country_id')), $data);
					$this->session->set_flashdata('message','Updated Successfully');
				  redirect('country');
					
				} 
		
	}
	
	public function country_delete($id)
	{
		$this->country->delete_by_id($id);
		$this->session->set_flashdata('message', 'Deleted Successfully');
		redirect('country');
	}
}
