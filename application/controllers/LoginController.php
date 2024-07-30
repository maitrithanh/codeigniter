<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

  }

  public function index()
  {
    $this->load->view('template/header');
    $this->load->view('login/index');
    $this->load->view('template/footer');
  }

  public function login()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Bạn chưa cung cấp email %s']);
    $this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Bạn chưa cung cấp mật khẩu %s']);

    if ($this->form_validation->run()) {
      $email = $this->input->post('email');
      $password = md5($this->input->post('password'));

      $this->load->model('LoginModel');
      $result = $this->LoginModel->checkLogin($email, $password);
      if ($result) {
        $session_array = [
          "id" => $result[0]->id,
          "username" => $result[0]->username,
          "email" => $result[0]->email
        ];
        $this->session->set_userdata('LoggedIn', $session_array);
        $this->session->set_flashdata('success', 'Login Successfully');
        redirect(base_url('/dashboard'));
      } else {
        $this->session->set_flashdata('error', 'email or password wrong! try again.');
        redirect(base_url('login'));
      }

    }
    $this->index();
  }

  public function logout()
  {
    // $this->session->sess_destroy();
    $this->session->unset_userdata('LoggedIn');
    $this->session->set_flashdata('success', 'Logout successfully!');
    redirect(base_url('/login'));
  }

}