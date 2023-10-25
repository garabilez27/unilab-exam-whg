<template>
    <Head>
        <title>Customers</title>
    </Head>
    <main-layout :breadcrumb="breadcrumb">
      <!-- Custom Modal -->
      <CustomModal :show="modalOpen" @close="closeModal" title="Add Customer">
        <!-- Content to display within the modal -->
        <p>This is the modal content.</p>
      </CustomModal>
  
      <h1>Customers</h1>
      <div class="pt-2">
        <div class="row">
          <div class="form-group offset-md-6 col-md-3 mb-3">
            <input
              type="text"
              id="customSearch"
              v-model="searchTerm"
              @input="customSearch"
              class="form-control"
              placeholder="Search..."
            >
          </div>
          <div class=" col-md-3">
            <button @click="openModal" class="btn btn-primary form-control">
                <i class="fa fa-plus"></i> Add Customer
            </button>
          </div>
        </div>
        <table id="myDataTable" class="table table-striped table-hover w-100">
          <thead>
            <tr>
              <th>Fullname</th>
              <th>Mobile #</th>
              <th>City</th>
              <th>Active</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- Iterate over your data and create table rows -->
            <tr v-for="customer in customers" :key="customer.cid">
              <td>{{ customer.fname }}</td>
              <td>{{ customer.mobile }}</td>
              <td>{{ customer.city }}</td>
              <td>
                <span v-if="customer.active" class="text-success">Yes</span>
                <span v-else class="text-danger">No</span>
              </td>
              <td>Edit</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main-layout>
  </template>
  
  <script>
  import CustomModal from '../Layouts/Modals/CustomerModal.vue'; // Adjust the import path
  
  export default {
    components: {
      CustomModal,
    },
    data() {
      return {
        modalOpen: false,
        searchTerm: '',
      };
    },
    methods: {
      openModal() {
        this.modalOpen = true;
      },
      closeModal() {
        this.modalOpen = false;
      },
      customSearch() {
        // Add your search logic here
        $('#myDataTable').DataTable().search(this.searchTerm).draw();
      },
    },
    mounted() {
      // Initialize your DataTable here
      $('#myDataTable').DataTable({
        lengthChange: false,
        ordering: true,
        responsive: true,
      });
    },
    props: {
        breadcrumb: Array,
        customers: Object
    }
  };
  </script>
  