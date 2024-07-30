<div class="container mt-2">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <div>
        List Category
      </div>
      <div>
        <a href="<?php echo base_url('category/create') ?>" class="btn btn-success">Add Category</a>
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
            <th scope="col">Image</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($category as $key => $cate) { ?>
            <tr>
              <th scope="row"><?php echo $key ?></th>
              <td><?php echo $cate->title ?></td>
              <td><?php echo $cate->description ?></td>
              <td>
                <?php if ($cate->image) { ?>
                  <img src="<?php echo base_url('/uploads/category/') . $cate->image ?>" width="50" height="50"
                    alt="<?php echo $cate->title ?>">
                <?php } else { ?>
                  <img src="<?php echo base_url('/uploads/noimage.png') ?>" width="50" height="50"
                    alt="<?php echo $cate->title ?>">
                <?php } ?>
              </td>
              <td><?php if ($cate->status == 1) {
                echo '<span class="text-success font-weight-bold">Active</span>';
              } else {
                echo '<span class="text-danger">InActive</span>';
              } ?></td>
              <td>
                <a href="<?php echo base_url("category/edit/" . $cate->id) ?>" class="btn btn-warning">Edit</a>
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
                        <?php echo '<span class="text text-danger">' . $cate->title . '</span>' ?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="<?php echo base_url("category/delete/" . $cate->id) ?>" class="btn btn-danger">Confirm
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