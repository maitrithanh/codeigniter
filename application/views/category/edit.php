<div class="container mt-2">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <div>
        Edit Category
      </div>
      <div>
        <a href="<?php echo base_url('category/create') ?>" class="btn btn-success">Add Category</a>
        <a href="<?php echo base_url('category/list') ?>" class="btn btn-primary">List Category</a>
      </div>
    </div>
    <div class="card-body">
      <?php if ($this->session->flashdata("success")) { ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata("success") ?></div>
      <?php } else if ($this->session->flashdata("error")) { ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata("error") ?></div>
      <?php } ?>


      <form action="<?php echo base_url("category/update/" . $categoryById->id) ?>" method="POST"
        enctype="multipart/form-data">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" value="<?php echo $categoryById->title ?>" class="form-control" id="title"
            aria-describedby="emailHelp" placeholder="Enter title">
          <?php echo '<span class="text text-danger">' . form_error('title') . '</span>' ?>
        </div>
        <div class="form-group">
          <label for="title">Slug</label>
          <input type="text" name="slug" value="<?php echo $categoryById->slug ?>" class="form-control" id="title"
            placeholder="Enter title">
          <?php echo '<span class="text text-danger">' . form_error('slug') . '</span>' ?>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" name="description" value="<?php echo $categoryById->description ?>" class="form-control"
            id="description" placeholder="Description">
          <?php echo '<span class="text text-danger">' . form_error('description') . '</span>' ?>
        </div>

        <div class="form-group">
          <label for="image">Image</label>
          <div><?php if ($categoryById->image) { ?>
              <img src="<?php echo base_url('/uploads/category/') . $categoryById->image ?>" id="previewImg" width="150"
                height="150" alt="<?php echo $categoryById->title ?>">
            <?php } else { ?>
              <img src="<?php echo base_url('/uploads/noimage.png') ?>" id="previewImg" width="150" height="150"
                alt="<?php echo $categoryById->title ?>">
            <?php } ?>
          </div>
          <input type="file" name="image" class="form-control-file" id="image"
            onchange="ChangeImage(this, document.getElementById('previewImg'))" placeholder="Image">
          <?php if (isset($error)) {
            echo $error;
          } ?>
        </div>

        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" name="status" id="status">
            <?php if ($categoryById->status == 1) { ?>
              <option selected value="1">Active</option>
              <option value="0">InActive</option>
            <?php } else { ?>
              <option value="1">Active</option>
              <option selected value="0">InActive</option>
            <?php } ?>

          </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>