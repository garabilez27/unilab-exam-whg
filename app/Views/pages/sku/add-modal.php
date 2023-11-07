<!-- Modal -->
<form method="post" action="<?= base_url('skus/create') ?>" enctype="multipart/form-data">
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="Add" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 text-left">
              <h3 class="font-weight-bolder text-primary text-gradient">New SKU</h3>
          </div>
          <div class="card-body pb-3">
            <form role="form text-left">
              <label>Name</label>
              <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon" value="<?= old('name') ?>">
              </div>
              <label>Code</label>
              <div class="input-group mb-3">
                <input type="text" name="code" class="form-control" placeholder="Code" aria-label="Code" aria-describedby="code-addon" value="<?= old('code') ?>">
              </div>
              <label>Price</label>
              <div class="input-group mb-3">
                <input type="number" minlength="1" maxlength="10" name="price" class="form-control" placeholder="Price" aria-label="Price" aria-describedby="price-addon" value="<?= old('price') ?>">
              </div>
              <label>Image</label>
              <div class="input-group mb-3">
                <input type="file" name="image" accept="image/*" class="form-control" placeholder="Image" aria-label="Image" aria-describedby="img-addon">
              </div>
              <label>User</label>
              <div class="input-group mb-3">
                <select class="form-select" name="selUser">
                  <?php foreach($users as $user => $value): ?>
                  <option value="<?= $value['id'] ?>" <?php echo old('selUser') == $value['id'] ? 'selected' : ''; ?>><?= $value['name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="text-center">
                <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>