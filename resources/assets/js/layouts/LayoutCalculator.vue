<style lang="scss" scoped>
    .layout-calculator,
    .computed-mobile,
    .computed-standard{
        width:100%;
        display: block;
        margin:0;
        padding:0;
    }
</style>

<template>
    <div class="layout-calculator">
        <mq-layout class="computed-mobile" :mq="['m_tiny','m_small','m_bigger', 'tablet']">
            <mobile-layout />
        </mq-layout>
        <mq-layout class="computed-standard" mq="standard">
            <standard-layout />
        </mq-layout>
    </div>
</template>

<script>
    import MobileLayout from './MobileLayout';
    import StandardLayout from './StandardLayout';
    export default {
        name:'LayoutCalculator',
        components:{
            MobileLayout,
            StandardLayout
        }
    }
</script>