<style lang="scss" scoped>
    .part-4 {
        height: 739px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        .left {
            background-color: var(--white1);
            padding: 60px 40px 40px;
            position: relative;
        }
        .right {
            background-image: url(/images/photo-3.png);
        }
        h2 {
            padding:0;
            color:var(--black);
            font-size: 40px;
            font-weight: 900;
            position: relative;
            margin: 0 0 40px;
            .line {
                height: 3px;
                background-color: var(--blue);
                position: absolute;
                bottom: -6px;
                left: 39px;
                display: block;
                width: 450px;
            }
        }
        p {
            font-size: 22px;
            font-weight: 300;
            color:var(--black);
            width:500px;
            margin-left: 40px;
        }
        a {
            &.btn {
                position: absolute;
                bottom: 73px;
                margin-left: 40px;
            }
        }
    }
</style>

<template>
    <section class="section part-4">
        <div class="left">
            <h2>THE STATELESS
                <span class="line"></span>
            </h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                pariatur. </p>
            <router-link to="/" class="btn blue">LEARN MORE</router-link>
        </div>
        <div class="right"></div>
    </section>
</template>

<script>
    export default {
        name: 'SectionPart4Component'
    }
</script>
