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
    }
</style>

<template>
    <div class="layout-calculator">
        <mq-layout class="computed-mobile" :mq="['m_tiny','m_small','m_bigger', 'tablet']">
            <menu-mobile-component />
            <router-view name="mobile" />
            <footer-mobile-component />
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