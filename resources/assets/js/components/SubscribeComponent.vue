<style lang="scss" scoped>
    .subscribe {
        margin-top: 50px;
        height:800px;
    }
    h2 {
        color:var(--blue);
        font-size: 40px;
        font-weight: 900;
        padding:0;
        text-align: center;
        margin: 0 0 24px;
    }
    .icon {
        text-align: center;
        margin-bottom:40px;
        img {
            width: 141px;
            height: 153px;
        }
        p {
            text-align: center;
            font-size: 24px;
            font-weight: 300;
            width:650px;
            margin:auto;
        }
    }

    form {
        --column-width: 430px;
        --column-gap: 40px;
        &.subscribe-form {
            width: calc(var(--column-width) * 2 + var(--column-gap));
            margin:auto;
        }

        .fields {
            display: grid;
            grid-template-columns: repeat(2, var(--column-width));
            grid-template-rows: repeat(3, 100px);
            grid-column-gap: var(--column-gap);

            .field {
                label {
                    color: var(--black);
                    font-size: 22px;
                    font-weight: 500;
                    display: block;
                    width: var(--column-width);
                    height:50px;
                    line-height: 50px;
                }
                input[type=text] {
                    background-color: var(--white1);
                    color:var(--black);
                    font-size: 22px;
                    font-weight: 500;
                    display: block;
                    border:none;
                    width: var(--column-width);
                    height: 45px;
                    line-height: 45px;
                }
            }
            .submit {
                grid-column: 1 / span 2;
                text-align: center;
                padding: 40px;
            }
        }
    }

</style>

<template>
    <section class="section subscribe">
        <h2>Subscribe</h2>
        <div class="icon">
            <img src="/images/newsletter-icon.png" alt="">
            <p>Stay up to date with all of our progress and join the community!</p>
        </div>
        <form class="subscribe-form">
            <div class="fields">
                <div class="field">
                    <label for="first_name">First Name</label>
                    <input id="first_name" name="first_name" type="text">
                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text">
                </div>
                <div class="field">
                    <label for="last_name">Last Name</label>
                    <input id="last_name" name="last_name" type="text">
                </div>
                <div class="field">
                    <label for="zip_code">Zip Code</label>
                    <input id="zip_code" name="zip_code" type="text">
                </div>
                <div class="submit">
                    <button class="btn green" type="submit">SIGN ME UP</button>
                </div>
            </div>

        </form>
    </section>
</template>

<script>
    export default {
        name:'SubscribeComponent'
    }
</script>
