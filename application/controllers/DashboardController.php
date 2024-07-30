<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    if (!$this->session->userdata('LoggedIn')) {
      redirect(base_url('/login'));
    }
  }

  public function index()
  {
    $this->load->view('admin_template/header');
    $this->load->view('admin_template/navbar');
    $this->load->view('dashboard/index');
    $this->load->view('admin_template/footer');
  }
}