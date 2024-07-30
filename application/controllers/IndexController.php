<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndexController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('IndexModel');
		$this->data['category'] = $this->IndexModel->getCategory();
		$this->data['brand'] = $this->IndexModel->getBrand();
	}


	public function index()
	{
		$this->data['products'] = $this->IndexModel->getAllProduct();

		$this->load->view('pages/home', $this->data);
	}

	public function login()
	{
		$this->load->view('pages/login');
	}

	public function category($id)
	{
		$this->load->view('pages/category', $this->data);
	}

	public function brand($id)
	{
		$this->load->view('pages/brand');
	}

	public function productDetail($id)
	{
		$this->load->view('pages/product_detail');
	}

	public function cart()
	{
		$this->load->view('pages/cart');
	}


}
