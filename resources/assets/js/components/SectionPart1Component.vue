<style lang="scss" scoped>
    h2 {
        font-size: 40px;
        font-weight: 900;
        color:var(--blue);
        padding:0;
        margin:0;
        text-align: center;
    }
    .part-1 {
        margin-top:52px;
    }
    .parse-1-container {
        display: grid;
        grid-template-columns: repeat(3, 400px);
        width: 1200px;
        margin: auto;

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
                    font-size: 22px;
                    color:var(--black);
                }
            }
        }
    }
</style>

<template>
    <section class="section part-1">
        <h2>What We Do?</h2>
        <div class="parse-1-container">
            <div class="items">
                <div class="item-container">
                    <div class="img-container" style="background-image: url(/images/draft.png)"></div>
                    <p>Drafting and creating model legislation implementing our progressive principles</p>
                </div>
            </div>
            <div class="items">
                <div class="item-container">
                    <div class="img-container" style="background-image: url(/images/analysis.png)"></div>
                    <p>Policy analysis and research for various progressive policy ideas.</p>
                </div>
            </div>
            <div class="items">
                <div class="item-container">
                    <div class="img-container" style="background-image: url(/images/goverment.png)"></div>
                    <p>Education about legislative processes, local government and civics.</p>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name:'SectionPart1Component'
    }
</script>
