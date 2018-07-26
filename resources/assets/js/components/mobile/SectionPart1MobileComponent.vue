<style lang="scss" scoped>
    .part-1 {
        padding: 20px;

        h2 {
            font-size: 32px;
            font-weight: bold;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
            color:var(--blue);
            padding:0;
            margin:0;
            text-align: center;
        }
    }

    .part-1-container {
        max-width: 1150px;
        margin: auto;
        display:flex;
        justify-items: center;
    }

    .part-1-grid-container {
        display: grid;
        grid-template-columns: auto;
        grid-template-rows: repeat(3, min-content);
        margin:auto;

        .items {
            display: flex;
            justify-content: center;
            .item-container {
                padding: 20px;
                text-align: center;
                width:275px;
                .img-container {
                    height: 180px;
                    width: 120px;
                    background: no-repeat center bottom;
                    background-size: 120px auto;
                    &.img-draft {
                        background-size: 140px auto;
                        width: 140px;
                    }
                    &.img-government {
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
    <section class="section part-1">
        <h2>What We Do?</h2>
        <div class="part-1-container">
            <div class="part-1-grid-container">
                <div class="items">
                    <div class="item-container">
                        <div class="img-container img-draft" style="background-image: url(/images/draft.svg)"></div>
                        <p>Drafting and creating model legislation implementing our progressive principles</p>
                    </div>
                </div>
                <div class="items">
                    <div class="item-container">
                        <div class="img-container img-analysis" style="background-image: url(/images/analysis.svg)"></div>
                        <p>Policy analysis and research for various progressive policy ideas.</p>
                    </div>
                </div>
                <div class="items">
                    <div class="item-container">
                        <div class="img-container img-government" style="background-image: url(/images/government.svg)"></div>
                        <p>Education about legislative processes, local government and civics.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name:'SectionPart1MobileComponent'
    }
</script>
