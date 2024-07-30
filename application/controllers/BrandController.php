<?php
defined("BASEPATH") or exit("No direct script access allowed");

class BrandController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata("LoggedIn")) {
      redirect(base_url("/login"));
    }
  }

  public function list()
  {
    $this->load->view("admin_template/header");
    $this->load->view("admin_template/navbar");
    $this->load->model("BrandModel");
    $data['brand'] = $this->BrandModel->selectBrand();
    $this->load->view("brand/list", $data);
    $this->load->view("admin_template/footer");
  }

  public function create()
  {
    $this->load->view("admin_template/header");
    $this->load->view("admin_template/navbar");
    $this->load->view("brand/create");
    $this->load->view("admin_template/footer");
  }

  public function store()
  {
    $this->form_validation->set_rules("title", "Title", "trim|required", ['required' => 'Bạn chưa nhập %s']);
    $this->form_validation->set_rules("description", "Description", "trim|required", ['required' => 'Bạn chưa nhập %s']);
    $this->form_validation->set_rules("slug", "Slug", "trim|required", ['required' => 'Bạn chưa nhập %s']);
    // $this->form_validation->set_rules("image", "Image", "trim|required", ['required' => 'Bạn chưa tải %s']);

    if ($this->form_validation->run()) {
      //upload ảnh
      $ori_filename = $_FILES['image']['name'];
      $new_filename = time() . '' . str_replace(' ', '-', $ori_filename);
      $config = [
        'upload_path' => './uploads/brand',
        'allowed_types' => 'gif|jpg|png|jpeg',
        'file_name' => $new_filename,
      ];

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('image')) {
        $ImageError = array('error' => $this->upload->display_errors());
        $this->load->view("admin_template/header");
        $this->load->view("admin_template/navbar");
        $this->load->view("brand/create", $ImageError);
        $this->load->view("admin_template/footer");
      } else {

        $brand_filename = $this->upload->data("file_name");
        $data = [
          'title' => $this->input->post('title'),
          'description' => $this->input->post('description'),
          'slug' => $this->input->post('slug'),
          'status' => $this->input->post('status'),
          'image' => $brand_filename
        ];
        $this->load->model("BrandModel");
        $this->BrandModel->insertBrand($data);
        $this->session->set_flashdata('success', 'Add Brand Successfully!');
        redirect(base_url('brand/create'));
      }

    } else {
      $this->session->set_flashdata('error', 'Add Brand Something Went Wrong!');
      $this->create();
    }
  }

  public function edit($id)
  {
    $this->load->view("admin_template/header");
    $this->load->view("admin_template/navbar");
    $this->load->model("BrandModel");
    $data['brandById'] = $this->BrandModel->selectBrandById($id);
    $this->load->view("brand/edit", $data);
    $this->load->view("admin_template/footer");
  }

  public function update($id)
  {
    $this->form_validation->set_rules("title", "Title", "trim|required", ['required' => 'Bạn chưa nhập %s']);
    $this->form_validation->set_rules("description", "Description", "trim|required", ['required' => 'Bạn chưa nhập %s']);
    $this->form_validation->set_rules("slug", "Slug", "trim|required", ['required' => 'Bạn chưa nhập %s']);
    // $this->form_validation->set_rules("image", "Image", "trim|required", ['required' => 'Bạn chưa tải %s']);

    if ($this->form_validation->run()) {
      if (!empty($_FILES['image']['name'])) {
        //upload ảnh
        $ori_filename = $_FILES['image']['name'];
        $new_filename = time() . '' . str_replace(' ', '-', $ori_filename);
        $config = [
          'upload_path' => './uploads/brand',
          'allowed_types' => 'gif|jpg|png|jpeg',
          'file_name' => $new_filename,
        ];

        $this->load->library('upload', $config);
        //nếu không có ảnh upload thì trả về trang create + lỗi
        if (!$this->upload->do_upload('image')) {
          $ImageError = array('error' => $this->upload->display_errors());
          $this->load->view("admin_template/header");
          $this->load->view("admin_template/navbar");
          $this->load->view("brand/create", $ImageError);
          $this->load->view("admin_template/footer");
        } else {
          $brand_filename = $this->upload->data("file_name");
          $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'slug' => $this->input->post('slug'),
            'status' => $this->input->post('status'),
            'image' => $brand_filename
          ];

        }
      } else {
        $data = [
          'title' => $this->input->post('title'),
          'description' => $this->input->post('description'),
          'slug' => $this->input->post('slug'),
          'status' => $this->input->post('status'),
        ];
      }
      $this->load->model("BrandModel");
      $this->BrandModel->updateBrand($id, $data);
      $this->session->set_flashdata('success', 'Edit Brand Successfully!');
      redirect(base_url('brand/edit/' . $id));

    } else {
      $this->session->set_flashdata('error', 'Edit Brand Something Went Wrong!');
      $this->edit($id);
    }
  }

  public function delete($id)
  {
    $this->load->model('BrandModel');
    $data['brand'] = $this->BrandModel->deleteBrandById($id);
    if ($data['brand']) {
      $this->session->set_flashdata('success', 'Delete Brand Successfully!');
    } else {
      $this->session->set_flashdata('error', 'Delete Brand Something Went Wrong!');
    }
    redirect(base_url('brand/list'));
  }
}