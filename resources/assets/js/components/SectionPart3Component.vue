<style lang="scss" scoped>
    h2 {
        font-size: 40px;
        font-weight: 900;
        color:var(--green);
        padding:0;
        margin:0;
        text-align: center;
    }
    .part-3 {
        margin-top:52px;
    }
    .part-3-container {
        width: 1200px;
        margin: auto;
        .part-3-grid-container {
            display: grid;
            grid-template-columns: repeat(3, auto);

            .items {
                display: flex;
                justify-content: center;
                .item-container {
                    padding:20px;
                    text-align: center;
                    .img-container {
                        height: 250px;
                        background: no-repeat center bottom;
                    }
                    p{
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
    }

</style>

<template>
    <section class="section part-3">
        <div class="part-3-container">
            <h2>Why We Do It?</h2>
            <div class="part-3-grid-container">
                <div class="items">
                    <div class="item-container">
                        <div class="img-container" style="background-image: url(/images/puzzle.png)"></div>
                        <p>Solving Problems Activists know the issues, but sometimes need help solving it.</p>
                    </div>
                </div>
                <div class="items">
                    <div class="item-container">
                        <div class="img-container" style="background-image: url(/images/search.png)"></div>
                        <p>Holding the Powerful Accountable Legislatures don't work how they are supposed to work.</p>
                    </div>
                </div>
                <div class="items">
                    <div class="item-container">
                        <div class="img-container" style="background-image: url(/images/money.png)"></div>
                        <p>Evening the field Corporations spend billions, hiring people to draft legislation that works for them.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name:'SectionPart3Component'
    }
</script>
