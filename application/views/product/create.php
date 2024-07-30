<div class="container mt-2">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <div>
        Create Product
      </div>
      <div>
        <a href="<?php echo base_url('product/list') ?>" class="btn btn-primary">List Product</a>
      </div>
    </div>
    <div class="card-body">
      <?php if ($this->session->flashdata("success")) { ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata("success") ?></div>
      <?php } else if ($this->session->flashdata("error")) { ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata("error") ?></div>
      <?php } ?>

      <form action="<?php echo base_url("product/store") ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp"
            placeholder="Enter title">
          <?php echo '<span class="text text-danger">' . form_error('title') . '</span>' ?>
        </div>
        <div class="form-group">
          <label for="quantity">Quantity</label>
          <input type="text" name="quantity" class="form-control" id="quantity" aria-describedby="emailHelp"
            placeholder="Enter quantity">
          <?php echo '<span class="text text-danger">' . form_error('quantity') . '</span>' ?>
        </div>
        <div class="form-group">
          <label for="title">Slug</label>
          <input type="text" name="slug" class="form-control" id="title" placeholder="Enter title">
          <?php echo '<span class="text text-danger">' . form_error('slug') . '</span>' ?>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" name="description" class="form-control" id="description" placeholder="Description">
          <?php echo '<span class="text text-danger">' . form_error('description') . '</span>' ?>
        </div>

        <div class="form-group">
          <label for="image">Image</label>
          <div>
            <img src="/uploads/noimage.png" class="border" alt="add" height="150" width="150" id="previewImg" />
          </div>
          <input type="file" name="image" onchange="ChangeImage(this, document.getElementById('previewImg'))" />
          <?php if (isset($error)) {
            echo $error;
          } ?>
        </div>

        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" name="status" id="status">
            <option value="1">Active</option>
            <option value="0">InActive</option>
          </select>
        </div>

        <div class="form-group">
          <label for="status">Category</label>
          <select class="form-control" name="category_id" id="category_id">
            <?php foreach ($category as $key => $cate) { ?>
              <option value="<?php echo $cate->id ?>"><?php echo $cate->title ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="status">Brand</label>
          <select class="form-control" name="brand_id" id="brand_id">
            <?php foreach ($brand as $key => $bra) { ?>
              <option value="<?php echo $bra->id ?>"><?php echo $bra->title ?></option>
            <?php } ?>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
  </div>
</div>