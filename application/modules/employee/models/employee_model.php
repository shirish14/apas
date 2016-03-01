<?php
class Employee_model extends CI_Model {

	var $table = 'employee';
	var $column = array('first_name','last_name','middle_name','gender','date_of_birth','emp_no','email','password','management_level','manager_id',
	'organization_id','business_unit_id','access');
	var $order = array('employee_id' => 'desc');
	
	var $bus_table = 'business_unit';
	var $bus_column = array('business_unit_id','name');
	var $bus_order = array('business_unit_id' => 'desc');
	
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
   	
//data table start
	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column as $item) 
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$i++;
		}
		
		if(isset($_POST['order']))
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
// datatable end
	
// crud start
public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
		$this->set_message('inserted_successful');
	}
	
	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('employee_id',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
     public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	
	public function delete_by_id($id)
	{
		$this->db->where('employee_id', $id);
		$this->db->delete($this->table);
	}
	
//crud end
function get_year($table) {
 $this->db->select('business_unit_id')->from('organization');
 $query = $this->db->get();
 return $query->result();
}


}
?>