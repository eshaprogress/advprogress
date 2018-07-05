<style lang="scss" scoped>
</style>

<template>
    <section class="section home">
        <home-page-carousel-component />
        <section-part1-component />
        <section-part2-component />
        <section-part3-component />
        <section-part4-component />
        <subscribe-component />
    </section>
</template>

<script>
    import HomePageCarouselComponent from './HomePageCarouselComponent'
    import SectionPart1Component from './SectionPart1Component'
    import SectionPart2Component from './SectionPart2Component'
    import SectionPart3Component from './SectionPart3Component'
    import SectionPart4Component from './SectionPart4Component'
    import SubscribeComponent from './SubscribeComponent'
    export default {
        name:'HomeComponent',
        components:{
            HomePageCarouselComponent,
            SectionPart1Component,
            SectionPart2Component,
            SectionPart3Component,
            SectionPart4Component,
            SubscribeComponent
        }
    }
</script>