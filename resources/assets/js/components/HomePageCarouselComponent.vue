<style lang="scss" scoped>

    .carousel {
        padding:0;
        height:561px;

        h2 {
            padding: 0;
            font-size: 32px;
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
        p, a {
            margin-left: 25px;
        }
        a {
            &.btn {
                position: absolute;
                bottom: 40px;
            }
        }
        .carousel-container {
            max-width: 1150px;
            position: relative;
            overflow: hidden;
            margin:auto;
        }
        .carousel-item {
            .content {
                color: white;
                position: absolute;
                left: 100px;
                bottom: 0;
                width: 550px;
                height: 240px;
            }
            img {
                width:1150px;
                height:561px;
                object-fit: contain;
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

        .heart-icon {
            display: block;
            height: 35px;
            width: 35px;
            background-image: url(/images/CircleHeartBig.svg);
            background-size: 35px;
            background-repeat: no-repeat;
            margin: 5px 6px;
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
                <img src="/images/prisoners.png">
            </div>
            <router-link to="/donate" class="donate-btn">
                <span class="heart-icon"></span>
                <span class="text">DONATE NOW</span>
            </router-link>
        </div>
    </section>
</template>

<script>
    export default {
        name:'HomePageCarouselComponent'
    }
</script>

