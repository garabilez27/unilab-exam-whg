<script>
export default {
    props: {
        breadcrumb: Array
    }
}
</script>

<template>
    <main-layout :breadcrumb="breadcrumb">
        <Head>
            <title>Orders</title>
        </Head>
    </main-layout>
</template>