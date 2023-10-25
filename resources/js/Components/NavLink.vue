<script>
    export default {
        props: {
            active: Boolean,
        }
    }
</script>

<template>
    <Link class="nav-link link-dark" :class="{'active': active}">
        <slot></slot>
    </Link>
</template>