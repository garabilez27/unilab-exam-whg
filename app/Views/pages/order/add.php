
<form action="<?= base_url('orders/create') ?>" method="post">
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">

      <?php if(session()->has('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text text-white">
              <strong>Error!</strong> <?= session('error') ?>
              <?php if (isset($validation)) : ?>
                  <div class="validation-errors">
                      <?= $validation->listErrors() ?>
                  </div>
              <?php endif; ?>
            </span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <?php endif; ?>

      <div class="card mb-4">
        <div class="card-header pb-0 d-flex">
          <span class="d-flex justify-content-center align-items-center">
            <h6 class="px-2">Order Taking</h6>
          </span>
        </div>
        <div class="card-body">
          <div class="row mb-2">
            <div class="col-md-8">
              <select class="form-select" id="customerSearch" name="customer">
                <option value="">Select Customer</option>
                <?php foreach($customers as $customer => $value): ?>
                  <option value="<?= $value['id'] ?>"><?= $value['fullname'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-4">
              <a href="<?= base_url('orders') ?>" class="btn btn-success form-control my-0">View Orders</a>
            </div>
          </div>

          <div class="row mb-2">
            <div class="col-md-8">
              <div class="input-group">
                <span class="input-group-text">Date</span>
                <input type="date" name="dt" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" class="form-control">
              </div>
            </div>
            <div class="col-md-4"></div>
          </div>

          <div class="row mb-2">
            <div class="col-md-8">
              <div class="input-group">
                <span class="input-group-text">Status</span>
                <select class="form-select" name="status">
                  <?php foreach($status as $stat => $value): ?>
                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <button type="button" class="btn btn-primary form-control my-0" data-bs-toggle="modal" data-bs-target="#add-modal" onclick="resetAdd()">Add Items</button>
            </div>
          </div>

          <div class="row mb-2">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-warning form-control">Save</button>
            </div>
          </div>

          <h6>Items:</h6>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>SKU</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="items">
                
              </tbody>
            </table>
          </div>

          <div class="mt-4">
            <h3>
              Total Amount: <span id="oamount">0</span>
              <input type="text" name="dueAmt" id="dueAmt" hidden="" readonly="">
            </h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>