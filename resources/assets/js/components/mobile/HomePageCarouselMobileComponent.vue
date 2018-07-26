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
        }
        .carousel-item {
            &.img-1 {
                height: 324px;
                background: url(/images/mobile/prisoners.png) no-repeat center center fixed;
                background-size: cover;
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
    .donate-btn {
        width: 250px;
        height: 44px;
        border-radius: 100px;
        background-color: #009de1;
        line-height: 44px;
        right: -25px;
        top: 47px;
        position: absolute;
        display: flex;
        text-decoration: none;
        .circle {
            width: 33px;
            height: 33px;
            background-color: white;
            display: inline-block;
            border-radius: 21px;
            margin: 6px;
            text-align: center;
            position: relative;
            .heart {
                color: var(--red);
                font-size: 26px;
                position: absolute;
                left: 3px;
                top: 5px;
                z-index: 100;
            }
            .money {
                font-size: 8px;
                color: var(--white);
                background-color: var(--green);
                display: block;
                position: absolute;
                z-index: 120;
                width: 10px;
                height: 10px;
                border-radius: 8px;
                top: 14px;
                left: 18px;
                border: solid 2px var(--white);
                line-height: 10px;
            }
        }
        .text {
            width: 150px;
            height: 44px;
            font-size: 18px;
            font-weight: 600;
            font-style: normal;
            font-stretch: normal;
            line-height: 44px;
            color: #ffffff;
            display: inline-block;
            padding-left: 17px;
        }
    }
</style>

<template>
    <section class="section carousel">
        <div class="carousel-container">
            <div class="carousel-item img-1">
                <div class="content">
                    <h2>THE STATELESS</h2>
                    <p>American Prisoner's disenfranchisement is a problem. Let's fix it.</p>
                    <router-link to="/" class="btn green">LEARN MORE</router-link>
                </div>
            </div>
            <router-link to="/donate" class="donate-btn">
                <span class="circle">
                    <i class="heart fas fa-heart"></i>
                    <i class="money fas fa-dollar-sign"></i>
                </span>
                <span class="text">DONATE NOW</span>
            </router-link>
        </div>
    </section>
</template>

<script>
    export default {
        name:'HomePageCarouselMobileComponent'
    }
</script>

