<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Admin CMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Brand
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('brand/create') ?>">Add Brand</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url('brand/list') ?>">List Brand</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('category/create') ?>">Add Category</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url('category/list') ?>">List Category</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Product
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('product/create') ?>">Add Product</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url('product/list') ?>">List Product</a>
        </div>
      </li>

    </ul>


    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <?php echo $this->session->userdata('LoggedIn')["username"]; ?>
      </button>
      <div class="dropdown-menu overflow-hidden" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Profile</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?php echo base_url('logout') ?>">Logout</a>
      </div>
    </div>

</nav>