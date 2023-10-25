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
            <title>SKUs</title>
        </Head>
    </main-layout>
</template>