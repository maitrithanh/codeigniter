<?php
defined("BASEPATH") or exit("No direct script access allowed");

class CategoryController extends CI_Controller
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
    $this->load->model("CategoryModel");
    $data['category'] = $this->CategoryModel->selectCategory();
    $this->load->view("category/list", $data);
    $this->load->view("admin_template/footer");
  }

  public function create()
  {
    $this->load->view("admin_template/header");
    $this->load->view("admin_template/navbar");
    $this->load->view("category/create");
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
        'upload_path' => './uploads/category',
        'allowed_types' => 'gif|jpg|png|jpeg',
        'file_name' => $new_filename,
      ];

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('image')) {
        $ImageError = array('error' => $this->upload->display_errors());
        $this->load->view("admin_template/header");
        $this->load->view("admin_template/navbar");
        $this->load->view("category/create", $ImageError);
        $this->load->view("admin_template/footer");
      } else {

        $category_filename = $this->upload->data("file_name");
        $data = [
          'title' => $this->input->post('title'),
          'description' => $this->input->post('description'),
          'slug' => $this->input->post('slug'),
          'status' => $this->input->post('status'),
          'image' => $category_filename
        ];
        $this->load->model("CategoryModel");
        $this->CategoryModel->insertCategory($data);
        $this->session->set_flashdata('success', 'Add Category Successfully!');
        redirect(base_url('category/create'));
      }

    } else {
      $this->session->set_flashdata('error', 'Add Category Something Went Wrong!');
      $this->create();
    }
  }

  public function edit($id)
  {
    $this->load->view("admin_template/header");
    $this->load->view("admin_template/navbar");
    $this->load->model("CategoryModel");
    $data['categoryById'] = $this->CategoryModel->selectCategoryById($id);
    $this->load->view("category/edit", $data);
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
          'upload_path' => './uploads/category',
          'allowed_types' => 'gif|jpg|png|jpeg',
          'file_name' => $new_filename,
        ];

        $this->load->library('upload', $config);
        //nếu không có ảnh upload thì trả về trang create + lỗi
        if (!$this->upload->do_upload('image')) {
          $ImageError = array('error' => $this->upload->display_errors());
          $this->load->view("admin_template/header");
          $this->load->view("admin_template/navbar");
          $this->load->view("category/create", $ImageError);
          $this->load->view("admin_template/footer");
        } else {
          $category_filename = $this->upload->data("file_name");
          $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'slug' => $this->input->post('slug'),
            'status' => $this->input->post('status'),
            'image' => $category_filename
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
      $this->load->model("CategoryModel");
      $this->CategoryModel->updateCategory($id, $data);
      $this->session->set_flashdata('success', 'Edit Category Successfully!');
      redirect(base_url('category/edit/' . $id));

    } else {
      $this->session->set_flashdata('error', 'Edit Category Something Went Wrong!');
      $this->edit($id);
    }
  }

  public function delete($id)
  {
    $this->load->model('CategoryModel');
    $data['category'] = $this->CategoryModel->deleteCategoryById($id);
    if ($data['category']) {
      $this->session->set_flashdata('success', 'Delete Category Successfully!');
    } else {
      $this->session->set_flashdata('error', 'Delete Category Something Went Wrong!');
    }
    redirect(base_url('category/list'));
  }
}