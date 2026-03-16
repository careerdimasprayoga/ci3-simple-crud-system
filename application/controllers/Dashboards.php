<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {


  public function __construct() {
    parent::__construct();
    is_logged_in();
    $this->load->model('Dashboards_model');
  }

  // start::crud-goods
	public function index() {
    $data['total_categories'] = $this->Dashboards_model->get_all_total_goods_categories();   
    $this->load->view('dashboards/dashboard', $data);
	}


  

}
