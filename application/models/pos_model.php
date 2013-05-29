<?php
class Pos_model extends CI_Model {

	///private $results = FALSE;
	

	function getAll_items() {

		$result = $this->db->get('item');
		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function delete_item($item_code) {

		$this->db->delete('item', array('item_code' => $item_code));

	}

	function getAll_customers() {

		$this->db->from('customers');
		$this->db->join('transactions', 'customers.customer_id = transactions.customer_id');
		$this->db->join('trans_details', 'transactions.trans_id = trans_details.trans_id');

		$result = $this->db->get();

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_delivery() {

		$this->db->from('supplier');
		$this->db->join('delivery', 'supplier.supplier_id = delivery.supplier_id');
		$this->db->join('delivered_item', 'delivery.delivery_id = delivered_item.delivery_id');

		$result = $this->db->get();

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	


///////ADDED by Graycel

	function get_search($search)
	{
		$this->db->like('item_code',$search);
		$this->db->or_like('bar_code',$search);
		$this->db->or_like('desc1',$search);
		$this->db->or_like('desc2',$search);
		$this->db->or_like('desc3',$search);
		$this->db->or_like('desc4',$search);
		$this->db->or_like('group',$search);
		$this->db->or_like('class1',$search);
		$this->db->or_like('class2',$search);
		$this->db->or_like('cost',$search);
		$this->db->or_like('retail_price',$search);
		$this->db->or_like('model_quantity',$search);
		$this->db->or_like('supplier_code',$search);
		$this->db->or_like('manufacturer',$search);
		$this->db->or_like('quantity',$search);
		$this->db->or_like('reorder_point',$search);
		$this->db->from('item');

		$query = $this->db->get();

		return $query->result();
	}


	function get_edit_item($edit) {

		$this->db->where('item_code',$edit);
		$this->db->from('item');

		$query = $this->db->get();

		return $query->result();
	}

	function update_item($data,$edit){
			
			//update item
			$this->db->where('item_code',$edit);
			$this->db->update('item',$data);
							
	}

}

?>