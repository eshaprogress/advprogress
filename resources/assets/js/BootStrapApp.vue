<style lang="scss" scoped>

</style>
<template>
    <section class="container">
        <menu-component />
        <section class="container">
            <router-view />
        </section>
        <footer-component />
    </section>
</template>

<script>
    import MenuComponent from './components/MenuComponent';
    import FooterComponent from './components/FooterComponent';

    export default {
        components:{
            MenuComponent,
            FooterComponent
        }
    };
</script>
