<div class="container mt-2">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <div>
        List Product
      </div>
      <div>
        <a href="<?php echo base_url('product/create') ?>" class="btn btn-success">Add Product</a>
      </div>
    </div>

    <div class="card-body">
      <?php if ($this->session->flashdata("success")) { ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata("success") ?></div>
      <?php } elseif ($this->session->flashdata("error")) {
        ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata("error") ?></div>
      <?php } ?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
            <th scope="col">Image</th>
            <th scope="col">Category</th>
            <th scope="col">Brand</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($product as $key => $pro) { ?>
            <tr>
              <th scope="row"><?php echo $key ?></th>
              <td><?php echo $pro->title ?></td>
              <td><?php echo $pro->description ?></td>
              <td><?php echo $pro->quantity ?></td>
              <td>
                <?php if ($pro->image) { ?>
                  <img src="<?php echo base_url('/uploads/product/') . $pro->image ?>" width="50" height="50"
                    alt="<?php echo $pro->title ?>">
                <?php } else { ?>
                  <img src="<?php echo base_url('/uploads/noimage.png') ?>" width="50" height="50"
                    alt="<?php echo $pro->title ?>">
                <?php } ?>
              </td>
              <td><?php echo $pro->tendanhmuc ?></td>
              <td><?php echo $pro->tenthuonghieu ?></td>
              <td><?php if ($pro->status == 1) {
                echo '<span class="text-success font-weight-bold">Active</span>';
              } else {
                echo '<span class="text-danger">InActive</span>';
              } ?></td>

              <td>
                <a href="<?php echo base_url("product/edit/" . $pro->id) ?>" class="btn btn-warning">Edit</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                  Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Click Confirm Delete to Delete:
                        <?php echo '<span class="text text-danger">' . $pro->title . '</span>' ?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="<?php echo base_url("product/delete/" . $pro->id) ?>" class="btn btn-danger">Confirm
                          Delete</a>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</div>