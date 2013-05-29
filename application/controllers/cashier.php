<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cashier extends CI_Controller {

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
	function grace() {
		
	}
	 
	function purchase() {

		$data['header'] = 'Cashier';
		
		$data['page'] = 'cashier_home';
		$data['subpage'] = 'cashier/purchase_main';

		$this->load->view('template', $data);
	}
	
		function add_item() {

		$bar_code = $this->input->post('search_item');
		$qty = $this->input->post('quantity');

		$this->form_validation->set_rules('search_item','Bar Code', 'required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'required');

		if($this->form_validation->run() == FALSE) {
			$data['message'] = 'All fields are required!';

			$data['header'] = 'Cashier';
			
			$data['page'] = 'cashier_home';
			$data['subpage'] = 'cashier/purchase_main';

			$this->load->view('template', $data);
		}
		else {
			$this->db->from('item');
			$this->db->where('bar_code', $bar_code);
			$result = $this->db->get();
			
			if($result->num_rows() == 1) {
				foreach($result->result() as $r) {

					$data = array(
		               'id'      => $r->item_code,
		               'qty'     => $qty,
		               'price'   => $r->retail_price,
		               'name'    => $r->desc1
		            );
		            $this->cart->insert($data);
		        }
		    	$data['message'] = '';
		    }
		    else {
		    	$data['message'] = 'No item found!';		
		    }
		   
				$data['header'] = 'Cashier';
				
				$data['page'] = 'cashier_home';
				$data['subpage'] = 'cashier/purchase_main';

				$this->load->view('template', $data);		
		}
	}

	function do_purchase() {

		$customer = $this->input->post('cash_dropdown');

		// get customer ID
		$id = $this->pos_model->get_customerID($customer);

		// insert transactions
		$this->db->insert('transactions', array('trans_id'=>NULL, 'customer_id'=>$id, 'trans_date'=>date('y-m-d')));
		
		// get transaction id
		$trans_id = $this->db->insert_id();

		// insert trans_details
		$i = 1;

		foreach ($this->cart->contents() as $items):
			$this->db->insert('trans_details', array('trans_id'=> $trans_id,
				'item_code'=>$items['id'],
				'quantity'=>$items['qty'],
				'price'=>$items['subtotal']
				));
			$i++;
		endforeach;

		$this->cart->destroy();

		$data['message'] = "";
		$data['header'] = 'Cashier';
		
		$data['page'] = 'cashier_home';
		$data['subpage'] = 'cashier/purchase_main';

		$this->load->view('template', $data);


	}

	function credit() {

		/*$data['header'] = 'Cashier';
		
		$data['page'] = 'cashier_home';
		$data['subpage'] = 'cashier/credit_main';

		$this->load->view('template', $data);*/

		if($this->pos_model->getAll_customers()) {
			$data['customers'] = $this->pos_model->getAll_customers();
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Customers Found';
 		
		$data['header'] = 'Cashier';
		
		$data['page'] = 'cashier_home';
		$data['list_id'] = 2; // list id # 2 - list of customers
		$data['subpage'] = 'view_list';
		
		$this->load->view('template', $data);
	}

	function outgoing() {

		$data['header'] = 'Cashier';
		
		$data['page'] = 'cashier_home';
		$data['subpage'] = 'cashier/outgoing_main';

		$this->load->view('template', $data);
	}

	function incoming() {

		$data['header'] = 'Cashier';
		
		$data['page'] = 'cashier_home';
		$data['subpage'] = 'cashier/incoming_main';
		$data['supplier'] = $this->pos_model->getAll_supplier();
		$this->load->view('template', $data);
	}

	function expenses() {

		$data['header'] = 'Cashier';
		
		$data['page'] = 'cashier_home';
		$data['subpage'] = 'cashier/expenses_main';

		$this->load->view('template', $data);
	}

	function search() {

		$data['header'] = 'Cashier';
		
		$data['page'] = 'cashier_home';
		$data['subpage'] = 'cashier/search_main';

		$this->load->view('template', $data);
	}

	function inventory() {

		$data['header'] = 'Cashier';
		
		$data['page'] = 'cashier_home';
		$data['subpage'] = 'inventory_main';

		$this->load->view('template', $data);
	}

	function close() {

		$data['header'] = 'Cashier';
		
		$data['page'] = 'cashier_home';
		$data['subpage'] = 'cashier/close';

		$this->load->view('template', $data);
	}

	function logout() {

		$data['header'] = 'POS';
		
		$data['page'] = 'forms/login_form';
		
		$this->load->view('template', $data);
	}
	
}

/* End of file pos.php */
/* Location: ./application/controllers/pos.php */