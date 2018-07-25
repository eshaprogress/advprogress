<style lang="scss" scoped>
    .part-2 {
        background-color: var(--white1);

        .part-2-container {
            margin:auto;
            .part-2-grid-container {
                display: grid;
                flex-flow: column;
                .top {
                    background-image: url(/images/photo-2.png);
                    height: 400px;
                    background-size: contain;
                    -o-object-fit: contain;
                    background-repeat: no-repeat;
                    background-position: center;
                }
                .bottom {
                    padding: 20px 20px 60px;
                    position: relative;
                }
                h2 {
                    padding:0;
                    color:var(--black);
                    font-size: 32px;
                    font-weight: bold;
                    font-style: normal;
                    font-stretch: normal;
                    line-height: normal;
                    letter-spacing: normal;
                    position: relative;
                    margin: 0 0 40px;
                    .line {
                        height: 2px;
                        background-color: var(--blue);
                        position: absolute;
                        bottom: -6px;
                        left: 0;
                        display: block;
                        right: 0;
                    }
                }
                p {
                    font-size: 16px;
                    font-weight: normal;
                    font-style: normal;
                    font-stretch: normal;
                    line-height: normal;
                    letter-spacing: normal;
                    color:var(--black);
                    margin-left: 32px;
                }
                a {
                    &.btn {
                        position: absolute;
                        bottom: 20px;
                        margin-left: 32px;
                        font-weight: normal;
                    }
                }
            }
        }
    }
</style>

<template>
    <section class="section part-2">
        <div class="part-2-container">
            <div class="part-2-grid-container">
                <div class="top"></div>
                <div class="bottom">
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
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'SectionPart2MobileComponent'
    }
</script>
