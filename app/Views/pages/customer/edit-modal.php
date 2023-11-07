<!-- Modal -->
<form method="post" action="<?= base_url('customers/update') ?>" id="edit-form">
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="Edit Modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 text-left">
              <h3 class="font-weight-bolder text-primary text-gradient">Edit Customer</h3>
          </div>
          <div class="card-body pb-3">
            <form role="form text-left">
              <label>Firstname</label>
              <div class="input-group mb-3">
                <input type="text" name="fname" id="fname" class="form-control" placeholder="Firstname" aria-label="Firstname" aria-describedby="fname-addon" value="<?= old('fname') ?>">
              </div>
              <label>Lastname</label>
              <div class="input-group mb-3">
                <input type="text" name="lname" id="lname" class="form-control" placeholder="Lastname" aria-label="Lastname" aria-describedby="lname-addon" value="<?= old('lname') ?>">
              </div>
              <label>Mobile</label>
              <div class="input-group mb-3">
                <input type="number" minlength="8" maxlength="10" name="mobile" id="mobile" class="form-control" placeholder="Mobile" aria-label="Mobile" aria-describedby="mobile-addon" value="<?= old('mobile') ?>">
              </div>
              <label>City</label>
              <div class="input-group mb-3">
                <input type="text" name="city" id="city" class="form-control" placeholder="City" aria-label="City" aria-describedby="city-addon" value="<?= old('city') ?>">
              </div>
              <label>Active</label>
              <div class="input-group mb-3">
                <select class="form-select" name="status" id="status">
                  <option value="0" <?php echo old('active') == 0 ? 'selected' : ''; ?>>No</option>
                  <option value="1" <?php echo old('active') == 1 ? 'selected' : ''; ?>>Yes</option>
                </select>
              </div>
              <label>User</label>
              <div class="input-group mb-3">
                <select class="form-select" name="selUser" id="selUser">
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