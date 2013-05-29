<?php
class Pos_model extends CI_Model {


	

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
	
	function getAll_items_bySupplier($supplier_name) {

		$this->db->select('*');
		$this->db->from('item');
		$this->db->where('supplier_code',$supplier_name);
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
	
	function get_item_byCode($item_code){
		$this->db->select('*');
		$this->db->from('item');
		$this->db->where('item_code',$item_code);
		$result = $this->db->get();
		 if($result->num_rows() > 0) {
				foreach ($result->result() as $row) {
					$data = $row;
				}
				return $data;
		}
		else 
				return false;
	}
	
	
	function getAll_supplier() {

		$result = $this->db->get('supplier');
		
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

	
}
?>