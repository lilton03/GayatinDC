<?php
class Pages extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('gayatin_model');
	}

	public function index(){
		$this->load->view('home');
	}

	public function appointment(){
		$this->load->view('appointment');
	}

	public function about_us(){
		$this->load->view('about_us');
	}

	public function clinic_sched(){
		$this->load->view('clinic_sched');
	}

	public function add_appointment(){
		$this->load->view('add_appointment');
	}


}?>