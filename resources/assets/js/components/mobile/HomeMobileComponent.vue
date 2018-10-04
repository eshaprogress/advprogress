<style lang="scss" scoped>
</style>

<template>
    <section class="section home mobile">
        <home-page-carousel-mobile-component />
        <section-part1-mobile-component />

        <section-part3-mobile-component />

        <subscribe-mobile-component />
    </section>
</template>

<script>
    import HomePageCarouselMobileComponent from './HomePageCarouselMobileComponent'
    import SectionPart1MobileComponent from './SectionPart1MobileComponent'
    import SectionPart2MobileComponent from './SectionPart2MobileComponent'
    import SectionPart3MobileComponent from './SectionPart3MobileComponent'
    import SectionPart4MobileComponent from './SectionPart4MobileComponent'
    import SubscribeMobileComponent from './SubscribeMobileComponent'
    export default {
        name:'HomeMobileComponent',
        components:{
            HomePageCarouselMobileComponent,
            SectionPart1MobileComponent,

            SectionPart3MobileComponent,
            
            SubscribeMobileComponent
        }
    }
</script>
