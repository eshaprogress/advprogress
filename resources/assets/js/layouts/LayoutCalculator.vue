<template>
    <div class="container layout">
        <mq-layout :mq="['m_tiny','m_small','m_bigger', 'tablet']">
            <mobile-layout />
        </mq-layout>
        <mq-layout mq="standard">
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