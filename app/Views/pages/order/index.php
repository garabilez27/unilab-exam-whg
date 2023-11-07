
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">

      <?php if (session()->has('success')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <span class="alert-text text-white"><strong>Success!</strong> <?= session('success') ?></span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <?php elseif(session()->has('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text text-white">
              <strong>Danger!</strong> <?= session('error') ?>
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
            <h6 class="px-2">Order List</h6>
          </span>
          <a href="<?= base_url('orders/new') ?>" class="btn btn-primary btn-sm">Add New</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-4">
            <table class="table align-items-center mb-0" id="myDataTable">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Delivery Date</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount Due</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($orders as $order => $value): ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">
                            <?= $value['customer']['fullname'] ?>
                          </h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $value['dateOfDelivery'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-xs font-weight-bold mb-0"><?= $value['amountDue'] ?></p>
                    </td>
                    <td class="align-middle text-center">
                      <?php if($value['status'] == 1): ?>
                      <span class="badge badge-sm bg-gradient-primary">New</span>
                      <?php elseif($value['status'] == 2): ?>
                      <span class="badge badge-sm bg-gradient-success">Completed</span>
                      <?php elseif($value['status'] == 3): ?>
                      <span class="badge badge-sm bg-gradient-danger">Cancelled</span>
                      <?php endif ?>
                    </td>
                    <td class="align-middle">
                      <a href="<?= base_url('orders/edit/'.$value['id']) ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>