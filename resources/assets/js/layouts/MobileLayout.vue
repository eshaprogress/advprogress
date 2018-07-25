<style lang="scss" scoped>
    .mobile-layout,
    .container {
        width:100%;
        display: block;
        margin:0;
        padding:0;
    }
</style>

<template>
    <div class="mobile-layout">
        <menu-mobile-component />
        <section class="container">
            <router-view name="mobile" />
        </section>
        <footer-mobile-component />
    </div>

</template>

<script>
    import MenuMobileComponent from '../components/mobile/MenuMobileComponent';
    import FooterMobileComponent from '../components/mobile/FooterMobileComponent';

    export default {
        name:'MobileLayout',
        components:{
            MenuMobileComponent,
            FooterMobileComponent
        }
    };
</script>
