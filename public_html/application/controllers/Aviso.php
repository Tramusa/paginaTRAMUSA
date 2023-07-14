<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aviso extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
  }

  function index(){
    $this->load->view('header');
    $this->load->view('aviso');
    $this->load->view('footer');
  }
}
?>
