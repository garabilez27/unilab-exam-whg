<script>
export default {
    props: {
        breadcrumb: Array
    }
}
</script>

<template>
    <Head>
        <title>Home</title>
    </Head>
    <main-layout :breadcrumb="breadcrumb">
        <h1>Welcome back, User!</h1>
    </main-layout>
</template>