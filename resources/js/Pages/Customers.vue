<script>

export default {
    props: {
        breadcrumb: Array,
        customers: Object
    },
    mounted() {
        $('#myDataTable').DataTable(); // Initialize DataTables.js
    },
}

</script>

<template>
    <Head>
        <title>Customers</title>
    </Head>
    <main-layout :breadcrumb="breadcrumb">
        <div>
            <table id="myDataTable" class="table table-stripped">
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
                <td>{{ customer.active }}</td>
                <td>Edit</td>
                </tr>
            </tbody>
            </table>
        </div>
    </main-layout>
</template>