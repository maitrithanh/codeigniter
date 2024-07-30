<div class="container mt-2">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <div>
        Edit Product
      </div>
      <div>
        <a href="<?php echo base_url('product/create') ?>" class="btn btn-success">Add Product</a>
        <a href="<?php echo base_url('product/list') ?>" class="btn btn-primary">List Product</a>
      </div>
    </div>
    <div class="card-body">
      <?php if ($this->session->flashdata("success")) { ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata("success") ?></div>
      <?php } else if ($this->session->flashdata("error")) { ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata("error") ?></div>
      <?php } ?>


      <form action="<?php echo base_url("product/update/" . $productById->id) ?>" method="POST"
        enctype="multipart/form-data">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" value="<?php echo $productById->title ?>" class="form-control" id="title"
            aria-describedby="emailHelp" placeholder="Enter title">
          <?php echo '<span class="text text-danger">' . form_error('title') . '</span>' ?>
        </div>
        <div class="form-group">
          <label for="quantity">Quantity</label>
          <input type="text" name="quantity" class="form-control" value="<?php echo $productById->quantity ?>"
            id="quantity" aria-describedby="emailHelp" placeholder="Enter quantity">
          <?php echo '<span class="text text-danger">' . form_error('quantity') . '</span>' ?>
        </div>
        <div class="form-group">
          <label for="title">Slug</label>
          <input type="text" name="slug" value="<?php echo $productById->slug ?>" class="form-control" id="title"
            placeholder="Enter title">
          <?php echo '<span class="text text-danger">' . form_error('slug') . '</span>' ?>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" name="description" value="<?php echo $productById->description ?>" class="form-control"
            id="description" placeholder="Description">
          <?php echo '<span class="text text-danger">' . form_error('description') . '</span>' ?>
        </div>

        <div class="form-group">
          <label for="image">Image</label>
          <div><?php if ($productById->image) { ?>
              <div>
                <img src="<?php echo base_url('/uploads/product/') . $productById->image ?>" id="previewImg" width="150"
                  height="150" alt="<?php echo $productById->title ?>">
              </div>
            <?php } else { ?>
              <img src="<?php echo base_url('/uploads/noimage.png') ?>" width="150" height="150"
                alt="<?php echo $productById->title ?>" id="previewImg">
            <?php } ?>
          </div>
          <input type="file" name="image" onchange="ChangeImage(this, document.getElementById('previewImg'))" />
          <?php if (isset($error)) {
            echo $error;
          } ?>
        </div>

        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" name="status" id="status">
            <?php if ($productById->status == 1) { ?>
              <option selected value="1">Active</option>
              <option value="0">InActive</option>
            <?php } else { ?>
              <option value="1">Active</option>
              <option selected value="0">InActive</option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="status">Category</label>
          <select class="form-control" name="category_id" id="category_id">
            <?php foreach ($category as $key => $cate) { ?>
              <option <?php if ($productById->category_id == $cate->id)
                echo 'selected'; ?> value="<?php echo $cate->id ?>">
                <?php echo $cate->title ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="status">Brand</label>
          <select class="form-control" name="brand_id" id="brand_id">

            <?php foreach ($brand as $key => $bra) { ?>
              <option <?php if ($productById->brand_id == $bra->id)
                echo 'selected'; ?> value="<?php echo $bra->id ?>">
                <?php echo $bra->title ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>