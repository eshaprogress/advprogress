<style lang="scss" scoped>
    .layout-calculator,
    .computed-mobile,
    .computed-standard{
        width:100%;
        display: block;
        margin:0;
        padding:0;
    }
    .computed-mobile {
        padding-top: 72px;
        .container {
            max-width: 1440px;
            margin: auto;
            position: fixed;
            top: 72px;
            bottom: 0;
            left: 0;
            right: 0;
            overflow-y: auto;
        }
    }
</style>

<template>
    <div class="layout-calculator">
        <mq-layout class="computed-mobile" mq="mobile">
            <menu-mobile-component />
            <section class="container">
                <router-view name="mobile" />
                <footer-mobile-component />
            </section>
        </mq-layout>
        <mq-layout class="computed-standard" mq="standard">
            <menu-component />
            <router-view name="standard" />
            <footer-component />
        </mq-layout>
    </div>
</template>

<script>
    import MenuComponent from './components/MenuComponent';
    import FooterComponent from './components/FooterComponent';
    import MenuMobileComponent from './components/mobile/MenuMobileComponent';
    import FooterMobileComponent from './components/mobile/FooterMobileComponent';

    export default {
        name:'LayoutCalculator',
        components:{
            FooterComponent,
            MenuComponent,
            MenuMobileComponent,
            FooterMobileComponent
        }
    }
</script>