<body class="g-sidenav-show   bg-gray-100">
<div class="min-height-300 bg-primary position-absolute w-100"></div>

<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main" style="z-index: 999 !important;">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
      <img src="<?= base_url('assets/img/logo-ct-dark.png') ?>" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">Argon Dashboard 2</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?php echo $root_page == 'Dashboard' ? 'active' : ''; ?>" href="<?= base_url() ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php echo $root_page == 'Order' ? 'active' : ''; ?>" href="<?= base_url('orders') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Purchase Orders</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php echo $root_page == 'Customer' ? 'active' : ''; ?>" href="<?= base_url('customers') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Customers</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php echo $root_page == 'Sku' ? 'active' : ''; ?>" href="<?= base_url('skus') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-cart text-secondary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">SKUs</span>
        </a>
      </li>
    </ul>
  </div>
</aside>