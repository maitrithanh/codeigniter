<div class="container mt-2">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <div>
        Create Brand
      </div>
      <div>
        <a href="<?php echo base_url('brand/list') ?>" class="btn btn-primary">List Brand</a>
      </div>
    </div>
    <div class="card-body">
      <?php if ($this->session->flashdata("success")) { ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata("success") ?></div>
      <?php } else if ($this->session->flashdata("error")) { ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata("error") ?></div>
      <?php } ?>

      <form action="<?php echo base_url("brand/store") ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp"
            placeholder="Enter title">
          <?php echo '<span class="text text-danger">' . form_error('title') . '</span>' ?>
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
          <input type="file" name="image" class="form-control-file" id="image" placeholder="Image">
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

        <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
  </div>
</div>