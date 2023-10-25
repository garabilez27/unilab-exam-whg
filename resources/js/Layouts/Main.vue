<script>
import NavLink from '../Components/Navlink.vue';

export default {
    components: {
        NavLink,
    },

    props: {
        breadcrumb: Array
    }
}
</script>

<template>
    <main>
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
                        <NavLink href="/" :active="$page.component === 'Home'">
                            <i class="fa fa-home me-2" aria-hidden="true"></i>
                            Home
                        </NavLink>
                    </li>
                    <li class="nav-item">
                        <NavLink href="/customers" :active="$page.component === 'Customers'">
                            <i class="fa fa-tachometer me-2" aria-hidden="true"></i>
                            Customers
                        </NavLink>
                    </li>
                    <li class="nav-item">
                        <NavLink href="/skus" :active="$page.component === 'SKUs'">
                            <i class="fa fa-list me-2" aria-hidden="true"></i>
                            SKUs
                        </NavLink>
                    </li>
                    <li class="nav-item">
                        <NavLink href="/orders" :active="$page.component === 'Orders'">
                            <i class="fa fa-list me-2" aria-hidden="true"></i>
                            Orders
                        </NavLink>
                    </li>
                    <li class="nav-item">
                        <NavLink href="/items" :active="$page.component === 'Items'">
                            <i class="fa fa-list me-2" aria-hidden="true"></i>
                            Items
                        </NavLink>
                    </li>
                </ul>
            </div>
        </aside>
        <header class="d-block d-md-none d-lg-none">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1">Navbar</span>
                    <div class="ml-auto">
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa fa-bars"></i></button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasRightLabel"></h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <div class="d-flex flex-column flex-shrink-0 p-3 bg-light h-100">
                                    <a href="/" class="d-flex flex-column align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none w-100">
                                        <div>
                                            <img src="/img/png/logo.png" width="75">
                                        </div>
                                        <div class="fs-5 fw-bold text-uppercase text-center">Systems Plus<br>Computer College</div>
                                    </a>
                                    <hr>
                                    <ul class="nav nav-pills flex-column mb-auto">
                                        <li class="nav-item">
                                            <NavLink href="/" :active="$page.component === 'Home'">
                                                <i class="fa fa-home me-2" aria-hidden="true"></i>
                                                Home
                                            </NavLink>
                                        </li>
                                        <li class="nav-item">
                                            <NavLink href="/customers" :active="$page.component === 'Customers'">
                                                <i class="fa fa-tachometer me-2" aria-hidden="true"></i>
                                                Customers
                                            </NavLink>
                                        </li>
                                        <li class="nav-item">
                                            <NavLink href="/skus" :active="$page.component === 'SKUs'">
                                                <i class="fa fa-list me-2" aria-hidden="true"></i>
                                                SKUs
                                            </NavLink>
                                        </li>
                                        <li class="nav-item">
                                            <NavLink href="/orders" :active="$page.component === 'Orders'">
                                                <i class="fa fa-list me-2" aria-hidden="true"></i>
                                                Orders
                                            </NavLink>
                                        </li>
                                        <li class="nav-item">
                                            <NavLink href="/items" :active="$page.component === 'Items'">
                                                <i class="fa fa-list me-2" aria-hidden="true"></i>
                                                Items
                                            </NavLink>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <section class="container-fluid py-2" id="breadcrumb">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Library</li> -->
                    <li v-for="bread in breadcrumb" class="breadcrumb-item" v-text="bread"></li>
                </ol>
            </nav>
        </section>
        <section class="container-fluid">
            <slot></slot>
        </section>
        <footer class="container-fluid py-2">
            All rights reserved.
        </footer>
    </main>
</template>