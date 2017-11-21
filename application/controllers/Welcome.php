<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

		function __construct()
	{
		parent::__construct();
		$this->load->model('Dokter_model');

	}

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
		$this->load->view('index');
	}
	public function Home()
	{
		$this->load->view('Home');
	}
	public function Login()
	{
		$this->load->view('Login');
	}
	public function About()
	{
		$this->load->view('About');
	}
	public function Portfolio()
	{
		$this->load->view('Portfolio');
	}
	public function Contact()
	{
		$this->load->view('Contact');
	}
	public function Team()
	{
		$data['dokter'] = $this->Dokter_model->ambil_data();
		$this->load->view('Team',$data);


	}

	public function Fasility()
	{
		$this->load->view('Fasility');
	}

	public function Waktutemu()
	{
		
			$this->load->view('admin/Waktutemu_list');
	}

	public function Regis()
	{
		$this->load->view('Regis');
	}


	public function Form_waktutemu()
	{
		$this->load->view('Form_waktutemu');
	}

	public function Home_member()
	{
		$this->load->view('Home_member');
	}

	public function About_member()
	{
		$this->load->view('About_member');
	}

	public function Portfolio_member()
	{
		$this->load->view('Portfolio_member');
	}

	public function Contact_member()
	{
		$this->load->view('Contact_member');
	}

	public function Fasility_member()
	{
		$this->load->view('Fasility_member');
	}

	public function Team_member()
	{
		$data['dokter'] = $this->Dokter_model->ambil_data();
		$this->load->view('Team_member', $data);
	}

}
