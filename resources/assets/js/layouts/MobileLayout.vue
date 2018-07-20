<style lang="scss" scoped>

</style>
<template>
    <section class="container mobile">
        <menu-mobile-component />
        <section class="container">
            <router-view name="mobile" />
        </section>
        <footer-mobile-component />
    </section>

</template>

<script>
    import MenuMobileComponent from '../components/mobile/MenuMobileComponent';
    import FooterMobileComponent from '../components/mobile/FooterMobileComponent';

    export default {
        components:{
            MenuMobileComponent,
            FooterMobileComponent
        }
    };
</script>
