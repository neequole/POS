<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pos extends CI_Controller {

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

	public function trial() {
		$this->load->view('main_content');
	}

	public function index()
	{
		$data['message'] = " ";
		$data['header'] = 'POS';
		
		$data['page'] = 'forms/login_form';
		
		$this->load->view('template', $data);
	}

	public function user_login() {
		
		$this->form_validation->set_rules('password','Password','required');

		// password is invalid
		if ($this->form_validation->run() == FALSE) {
			$data['message'] = "* Invalid password";
			$data['header'] = 'POS';
			$data['page'] = 'forms/login_form';
		
			$this->load->view('template', $data);
		}
		else {
			
			$password = $this->input->post('password');
			
			$account = $this->pos_model->check_user($password);
						
			if($account=='cashier') {
				redirect('pos/cashier_home');
			}
			else if($account=='admin') {
				redirect('pos/admin_home');
			}
			else {
				$data['message'] = "* Invalid password";
				$data['header'] = 'POS';
				$data['page'] = 'forms/login_form';
			
				$this->load->view('template', $data);			
			}
		}		
	}

	public function cashier_home() {

		$data['header'] = 'Cashier';
		
		$data['page'] = 'cashier_home';
		$data['subpage'] = 'dummy';

		$this->load->view('template', $data);
	}

	public function opening() {
		$data['header'] = 'Cashier';
		
		$data['page'] = 'forms/bills_form';
		$data['subpage'] = 'dummy';

		$this->load->view('template', $data);
	}

	public function closing() {
		$data['header'] = 'Cashier';
		
		$data['page'] = 'forms/closing_form';
		$data['subpage'] = 'dummy';

		$this->load->view('template', $data);
	}	

	public function admin_home() {

		$data['header'] = 'Administrator';
		
		$data['page'] = 'admin_home';
		$data['subpage'] = 'dummy';

		$this->load->view('template', $data);
	}	
}

/* End of file pos.php */
/* Location: ./application/controllers/pos.php */