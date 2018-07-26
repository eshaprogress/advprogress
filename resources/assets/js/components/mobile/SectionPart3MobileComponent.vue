<style lang="scss" scoped>
    .part-3 {
        padding: 20px;

        h2 {
            font-size: 32px;
            font-weight: bold;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
            color:var(--green);
            padding:0;
            margin:0;
            text-align: center;
        }
    }

    .part-3-container {
        max-width: 1150px;
        margin: auto;
        display:flex;
        justify-items: center;
    }

    .part-3-grid-container {

        display: flex;
        flex-flow: column;
        margin:auto;

        .items {
            display: flex;
            justify-content: center;
            .item-container {
                width:275px;
                padding: 0;
                text-align: center;
                .img-container {
                    height: 180px;
                    width: 120px;
                    background: no-repeat center bottom;
                    background-size: 120px auto;
                    &.img-puzzle ,
                    &.img-search {
                        background-size: 140px auto;
                        width: 140px;
                    }
                    &.img-money {
                        background-size: 150px auto;
                        width: 160px;
                    }
                    margin: auto auto 60px;
                }
                p{
                    padding:0;
                    margin:0;
                    font-size: 16px;
                    font-weight: normal;
                    font-style: normal;
                    font-stretch: normal;
                    line-height: normal;
                    letter-spacing: normal;
                    color:var(--black);
                }
            }
        }
    }

</style>

<template>
    <section class="section part-3">
        <h2>Why We Do It?</h2>
        <div class="part-3-container">
            <div class="part-3-grid-container">
                <div class="items">
                    <div class="item-container">
                        <div class="img-container img-puzzle" style="background-image: url(/images/puzzle.svg)"></div>
                        <p>Solving Problems Activists know the issues, but sometimes need help solving it.</p>
                    </div>
                </div>
                <div class="items">
                    <div class="item-container">
                        <div class="img-container img-search" style="background-image: url(/images/search.svg)"></div>
                        <p>Holding the Powerful Accountable Legislatures don't work how they are supposed to work.</p>
                    </div>
                </div>
                <div class="items">
                    <div class="item-container">
                        <div class="img-container img-money" style="background-image: url(/images/money.svg)"></div>
                        <p>Evening the field Corporations spend billions, hiring people to draft legislation that works for them.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name:'SectionPart3MobileComponent'
    }
</script>
