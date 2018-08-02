<style lang="scss" scoped>

    .carousel {
        padding:0;

        h2 {
            padding: 0;
            font-size: 20px;
            font-weight: bold;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
            margin: 0 0 16px;
        }
        p {
            margin: 0;
            padding: 0;
            font-size: 20px;
            font-weight: normal;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
        }
        a {
            &.btn {
                position: absolute;
                bottom: 40px;
            }
        }
        .carousel-container {
            position: relative;
            overflow: hidden;
            margin:auto;
            background-color: var(--white2);
        }
        .carousel-item {
            &.img-1 {
                height: 324px;
                background-size: cover;
                background: url(/images/mobile/prisoners.png) no-repeat center center;
            }
            .content {
                color: white;
                position: absolute;
                left: 30px;
                right:0;
                bottom: 0;
                height: 240px;
            }
        }
    }

    .donate-ribbon {
        height: 44px;
        background-color: #009de1;
        line-height: 44px;
        display: block;
        text-decoration: none;

        .donate-ribbon-container {
            background-color: var(--white);
            display: grid;
            grid-template-columns: repeat(2, auto);
            grid-column-gap: 5px;
        }

        .heart-icon {
            display: block;
            height: 30px;
            width: 30px;
            background-image: url(/images/CircleHeartBig.svg);
            background-size: 30px;
            background-repeat: no-repeat;
            margin: 5px 6px;
            position: absolute;
            top: 2px;
            right: -23px;
        }

        .text {
            &.left {
                background-color: var(--blue);
                position: relative;
            }
            &.right {
                background-color: var(--green);
            }
            font-size: 16px;
            font-weight: 600;
            font-style: normal;
            font-stretch: normal;
            line-height: 44px;
            color: #ffffff;
            display: inline-block;
            padding-left: 17px;
            text-decoration: none;
            text-align: center;
        }
    }
</style>

<template>
    <section class="section carousel">
        <div class="carousel-container">
            <div class="donate-ribbon">
                <div class="donate-ribbon-container">
                    <router-link title="Donate" to="/donate" class="text left">DONATE
                        <span class="heart-icon"></span>
                    </router-link>
                    <router-link title="Join US / Subscribe" to="/subscribe" class="text right">JOIN US</router-link>
                </div>
            </div>
            <div class="carousel-item img-1">
                <div class="content">
                    <h2>THE STATELESS</h2>
                    <p>American Prisoner's disenfranchisement is a problem. Let's fix it.</p>
                    <router-link to="/" class="btn green">LEARN MORE</router-link>
                </div>
            </div>

        </div>
    </section>
</template>

<script>
    export default {
        name:'HomePageCarouselMobileComponent'
    }
</script>

