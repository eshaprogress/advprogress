<style lang="scss" scoped>

</style>

<template>
    <div class="standard-layout">
        <menu-component />
        <section class="container">
            <router-view name="standard" />
        </section>
        <footer-component />
    </div>
</template>

<script>
    import MenuComponent from '../components/MenuComponent';
    import FooterComponent from '../components/FooterComponent';

    export default {
        name:'StandardLayout',
        components:{
            MenuComponent,
            FooterComponent,
        }
    }
</script>