<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <form @submit.prevent="login">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" v-model="form.email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" v-model="form.password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        async login() {
            // You would use Axios or another HTTP library to send a POST request to your backend for authentication.
            // Example using Axios:
            try {
                const response = await axios.post('/login', this.form);
                // Handle the response, maybe redirect on success.
            } catch (error) {
                // Handle authentication errors here.
            }
        }
    }
}
</script>
