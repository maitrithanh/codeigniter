<?php
defined("BASEPATH") or exit("No direct script access allowed");

class ProductController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ProductModel");
    $this->load->model("BrandModel");
    $this->load->model("CategoryModel");
    if (!$this->session->userdata("LoggedIn")) {
      redirect(base_url("/login"));
    }
  }

  public function list()
  {
    $this->load->view("admin_template/header");
    $this->load->view("admin_template/navbar");
    $data['product'] = $this->ProductModel->selectAllProduct();
    $this->load->view("product/list", $data);
    $this->load->view("admin_template/footer");
  }

  public function create()
  {
    $this->load->view("admin_template/header");
    $this->load->view("admin_template/navbar");
    $data['category'] = $this->CategoryModel->selectCategory();
    $data['brand'] = $this->BrandModel->selectBrand();
    $this->load->view("product/create", $data);
    $this->load->view("admin_template/footer");
  }

  public function store()
  {
    $this->form_validation->set_rules("title", "Title", "trim|required", ['required' => 'Bạn chưa nhập %s']);
    $this->form_validation->set_rules("quantity", "quantity", "trim|required", ['required' => 'Bạn chưa nhập %s']);
    $this->form_validation->set_rules("slug", "Slug", "trim|required", ['required' => 'Bạn chưa nhập %s']);
    $this->form_validation->set_rules("description", "Description", "trim|required", ['required' => 'Bạn chưa nhập %s']);
    // $this->form_validation->set_rules("image", "Image", "trim|required", ['required' => 'Bạn chưa tải %s']);

    if ($this->form_validation->run()) {
      //upload ảnh
      $ori_filename = $_FILES['image']['name'];
      $new_filename = time() . '' . str_replace(' ', '-', $ori_filename);
      $config = [
        'upload_path' => './uploads/product',
        'allowed_types' => 'gif|jpg|png|jpeg',
        'file_name' => $new_filename,
      ];

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('image')) {
        $ImageError = array('error' => $this->upload->display_errors());
        $this->load->view("admin_template/header");
        $this->load->view("admin_template/navbar");
        $this->load->view("product/create", $ImageError);
        $this->load->view("admin_template/footer");
      } else {

        $category_filename = $this->upload->data("file_name");
        $data = [
          'title' => $this->input->post('title'),
          'quantity' => $this->input->post('quantity'),
          'description' => $this->input->post('description'),
          'slug' => $this->input->post('slug'),
          'status' => $this->input->post('status'),
          'category_id' => $this->input->post('category_id'),
          'brand_id' => $this->input->post('brand_id'),
          'image' => $category_filename
        ];
        $this->ProductModel->insertProduct($data);
        $this->session->set_flashdata('success', 'Add Product Successfully!');
        redirect(base_url('product/create'));
      }

    } else {
      $this->session->set_flashdata('error', 'Add Product Something Went Wrong!');
      $this->create();
    }
  }

  public function edit($id)
  {
    $this->load->view("admin_template/header");
    $this->load->view("admin_template/navbar");
    $this->load->model("CategoryModel");
    $data['productById'] = $this->ProductModel->selectProductById($id);
    $data['category'] = $this->CategoryModel->selectCategory();
    $data['brand'] = $this->BrandModel->selectBrand();
    $this->load->view("product/edit", $data);
    $this->load->view("admin_template/footer");
  }

  public function update($id)
  {
    $this->form_validation->set_rules("title", "Title", "trim|required", ['required' => 'Bạn chưa nhập %s']);
    $this->form_validation->set_rules("quantity", "quantity", "trim|required", ['required' => 'Bạn chưa nhập %s']);
    $this->form_validation->set_rules("slug", "Slug", "trim|required", ['required' => 'Bạn chưa nhập %s']);
    $this->form_validation->set_rules("description", "Description", "trim|required", ['required' => 'Bạn chưa nhập %s']);
    // $this->form_validation->set_rules("image", "Image", "trim|required", ['required' => 'Bạn chưa tải %s']);

    if ($this->form_validation->run()) {
      if (!empty($_FILES['image']['name'])) {
        //upload ảnh
        $ori_filename = $_FILES['image']['name'];
        $new_filename = time() . '' . str_replace(' ', '-', $ori_filename);
        $config = [
          'upload_path' => './uploads/product',
          'allowed_types' => 'gif|jpg|png|jpeg',
          'file_name' => $new_filename,
        ];

        $this->load->library('upload', $config);
        //nếu không có ảnh upload thì trả về trang create + lỗi
        if (!$this->upload->do_upload('image')) {
          $ImageError = array('error' => $this->upload->display_errors());
          $this->load->view("admin_template/header");
          $this->load->view("admin_template/navbar");
          $this->load->view("product/create", $ImageError);
          $this->load->view("admin_template/footer");
        } else {
          $category_filename = $this->upload->data("file_name");
          $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'slug' => $this->input->post('slug'),
            'status' => $this->input->post('status'),
            'category_id' => $this->input->post('category_id'),
            'brand_id' => $this->input->post('brand_id'),
            'image' => $category_filename
          ];

        }
      } else {
        $data = [
          'title' => $this->input->post('title'),
          'description' => $this->input->post('description'),
          'slug' => $this->input->post('slug'),
          'status' => $this->input->post('status'),
          'category_id' => $this->input->post('category_id'),
          'brand_id' => $this->input->post('brand_id'),
        ];
      }
      $this->ProductModel->updateProduct($id, $data);
      $this->session->set_flashdata('success', 'Edit Product Successfully!');
      redirect(base_url('product/edit/' . $id));

    } else {
      $this->session->set_flashdata('error', 'Edit Product Something Went Wrong!');
      $this->edit($id);
    }
  }

  public function delete($id)
  {
    $this->load->model('CategoryModel');
    $data['category'] = $this->ProductModel->deleteProductById($id);
    if ($data['category']) {
      $this->session->set_flashdata('success', 'Delete Product Successfully!');
    } else {
      $this->session->set_flashdata('error', 'Delete Product Something Went Wrong!');
    }
    redirect(base_url('product/list'));
  }
}