<style lang="scss" scoped>
    h2 {
        padding: 0;
        font-size: 40px;
        font-weight: 900;
        margin: 0 0 16px;
        line-height: 40px;
    }
    p {
        margin: 0;
        padding: 0;
        font-size: 26px;
        font-weight: 500;
        line-height: 30px;
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

    .carousel {
        padding:0;
        height:702px;
        position: relative;
        overflow: hidden;
        .carousel-item {
            .content {
                color:white;
                position: absolute;
                top:400px;
                left:160px;
                bottom:0;
                width:550px;

            }
            img {
                width:1440px;
                height:702px;
                object-fit: contain;
            }
        }
    }
    .donate-btn {
        width: 305px;
        height: 55px;
        border-radius: 100px;
        background-color: #009de1;
        line-height: 55px;
        right: -25px;
        top: 59px;
        position: absolute;
        display: flex;
        text-decoration: none;
        .circle {
            width: 42px;
            height: 42px;
            background-color: white;
            display: inline-block;
            border-radius: 21px;
            margin: 6px;
            text-align: center;
            position: relative;
            .heart {
                color: var(--red);
                font-size: 34px;
                position: absolute;
                left: 4px;
                top: 5px;
                z-index: 100;
            }
            .money {
                font-size: 9px;
                color: var(--white);
                background-color: var(--green);
                display: block;
                position: absolute;
                z-index: 120;
                width: 12px;
                height: 12px;
                border-radius: 8px;
                top: 18px;
                left: 24px;
                border: solid 2px var(--white);
                line-height: 12px;
            }
        }
        .text {
            width: 163px;
            height: 55px;
            font-size: 22px;
            font-weight: 900;
            color: #ffffff;
            display: inline-block;
            padding-left: 17px;
        }
    }
</style>

<template>
    <section class="section carousel">
        <div class="carousel-item img-1">
            <div class="content">
                <h2>THE STATELESS</h2>
                <p>American Prisoner's disenfranchisement is a problem. Let's fix it.</p>
                <router-link to="/" class="btn green">LEARN MORE</router-link>
            </div>
            <img src="/images/prisoners.png">
        </div>
        <router-link to="/donate" class="donate-btn">
            <span class="circle">
                <i class="heart fas fa-heart"></i>
                <i class="money fas fa-dollar-sign"></i>
            </span>
            <span class="text">DONATE NOW</span>
        </router-link>
    </section>
</template>

<script>
    export default {
        name:'HomePageCarouselComponent'
    }
</script>

