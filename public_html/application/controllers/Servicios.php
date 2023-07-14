<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
  }

  function index(){
    $this->load->view('header');
    $this->load->view('servicios');
    $this->load->view('footer');
  }
}
?>
