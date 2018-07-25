<style lang="scss" scoped>
    .root-body {
        width:100%;
        display: block;
        margin:0;
        padding:0;
    }
</style>
<template>
    <div class="root-body">
        <router-view />
    </div>
</template>

<script>
    export default {
        name:'BootStrapApp'
    };
</script>
