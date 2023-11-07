
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
            <h6 class="px-2">SKU List</h6>
          </span>
          <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">Add New</button>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-4">
            <table class="table align-items-center mb-0" id="myDataTable">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Code</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit Price</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($skus as $sku => $value): ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $value['name'] ?></h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $value['code'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-xs font-weight-bold mb-0"><?= $value['unitPrice'] ?></p>
                    </td>
                    <td class="align-middle text-center">
                      <?php if($value['active']): ?>
                      <span class="badge badge-sm bg-gradient-success">Active</span>
                      <?php else: ?>
                      <span class="badge badge-sm bg-gradient-danger">Not Active</span>
                      <?php endif ?>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <img src="<?= base_url('assets/img/sku/'.$value['img']) ?>" class="avatar avatar-sm me-3 preview-image" alt="user1">
                      <!-- Preview container -->
                      <div class="preview">
                          <img src="<?= base_url('assets/img/sku/'.$value['img']) ?>" class="w-100 h-100" alt="user1">
                      </div>
                    </td>
                    <td class="align-middle">
                      <a href="javascript:;" class="text-secondary font-weight-bold text-xs edit-btn" data-toggle="tooltip" data-original-title="Edit" data-id="<?= $value['id'] ?>" data-bs-toggle="modal" data-bs-target="#edit-modal">
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