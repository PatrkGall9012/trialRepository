<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class webproj_app extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{
		$this->load->view("webproj_view/webproj_view_home");

	}

	function signup(){
		$this->load->view("webproj_view/webproj_view_signup");
	}

	function register(){
		// echo 'OK';
		if($_SERVER['REQUEST_METHOD']=='POST') 
		{
			$this->form_validation->set_rules('user','Username','required');
			$this->form_validation->set_rules('pass','Password','required');
			$this->form_validation->set_rules('fname','First Name','required');
			$this->form_validation->set_rules('mname','Middle Name','required');
			$this->form_validation->set_rules('lname','Surname','required');
			$this->form_validation->set_rules('addrs','Address','required');
			$this->form_validation->set_rules('phnum','Phone Number','required');
			$this->form_validation->set_rules('email','Email Address','required');
			$this->form_validation->set_rules('bday','Birthday','required');

			if($this->form_validation->run()==TRUE)
			{
				$username = $this->input->post('user');
				$password = $this->input->post('pass');
				$firstname = $this->input->post('fname');
				$middlename = $this->input->post('mname');
				$surname = $this->input->post('lname');
				$address = $this->input->post('addrs');
				$phonenumber = $this->input->post('phnum');
				$emailaddress = $this->input->post('email');
				$birthday = $this->input->post('bday');		
			
				$data = array(
					'sender_user' => $username,
					'sender_pass' => $password,
					'sender_fname' => $firstname,
					'sender_mname' => $middlename,
					'sender_lname' => $surname,
					'sender_addrs' => $address,
					'sender_phnum' => $phonenumber,
					'sender_email' => $emailaddress,
					'sender_bday' => $birthday,
					'sender_status' => "1"
				);
				$this->load->model('webproj_model_app');
				$this->webproj_model_app->insert_into_user($data);
				$this->session->set_flashdata('success','Successfully User Created');
				redirect(base_url('webproj_app'));

			}
		}
	}
	function login()
	{
		$this->load->view("webproj_view/webproj_view_login");
	}

	function loginnow()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$this->form_validation->set_rules('user','Username','required');
			$this->form_validation->set_rules('pass','Password','required');

			if($this->form_validation->run()==TRUE)
			{
				$username = $this->input->post('user');
				$password = $this->input->post('pass');
				// $password = sha1($password);
			
				$this->load->model('webproj_model_app');
				$status = $this->webproj_model_app->checkPass($password, $username);
				if($status != false)
				{
					$username = $status->sender_user;
					$password = $status->sender_pass;

					$session_data = array(
						'sender_user' => $username,
						'sender_pass' => $password,		
					);

					$this->session->set_userdata('UserLoginSession', $session_data);

					redirect(base_url('webproj_app/dashboard'));
				}
				else{
					$this->session->set_flashdata('error','Username or Password is Wrong');
					redirect('webproj_app/login');
				}
			}
			else{
				$this->session->set_flashdata('error','Fill all the required fields');
				redirect(base_url('webproj_app/login'));
			}

		}
	}

	function dashboard()
	{
		$this->load->view('webproj_view/webproj_view_dashboard');
	}

	function logout()
	{
		session_destroy();
		redirect(base_url('webproj_app'));
	}

}
