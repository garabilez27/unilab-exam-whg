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
            <title>Items</title>
        </Head>
    </main-layout>
</template>