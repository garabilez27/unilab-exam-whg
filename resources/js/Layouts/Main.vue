<script setup>

</script>

<template>
    <main>
        <header class="d-block d-md-none d-lg-none">
            a
        </header>
        <section class="container-fluid py-2" id="breadcrumb">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                </ol>
            </nav>
        </section>
        <aside>
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light h-100" style="width: 280px;">
                <a href="/" class="d-flex flex-column align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none w-100">
                    <div>
                        <img src="/img/png/logo.png" width="75">
                    </div>
                    <div class="fs-5 fw-bold text-uppercase text-center">Systems Plus<br>Computer College</div>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="fa fa-home me-2" aria-hidden="true"></i>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link link-dark">
                            <i class="fa fa-tachometer me-2" aria-hidden="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link link-dark">
                            <i class="fa fa-list me-2" aria-hidden="true"></i>
                            Producst
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>mdo</strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </aside>
        <section class="container-fluid">
            <slot></slot>
        </section>
        <footer class="container-fluid py-2">
            All rights reserved.
        </footer>
    </main>
</template>