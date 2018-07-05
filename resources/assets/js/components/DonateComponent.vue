<style lang="scss" scoped>
    .donate {
        margin-top: 50px;
        height:800px;
    }
    h1 {
        color:var(--blue);
        font-size: 40px;
        font-weight: 900;
        padding:0;
        text-align: center;
        margin: 0 0 24px;
    }

    .header {
        color: var(--blue);
        font-size: 40px;
        font-weight: 900;
        padding: 0;
        text-align: center;
        margin: auto;
        background-color: var(--white);
        display: grid;
        grid-auto-columns: 200px 400px 200px;
        grid-auto-rows: 1fr;
        grid-template-areas: "hline1 hcontent hline2";
        width: 800px;

        .hline1,
        .hline2 {
            display: flex;
            align-items: center;
        }

        .hline1 {grid-area: hline1;}
        .hline2 {grid-area: hline2;}

        .hcontent {
            grid-area: hcontent;
        }

        .line {
            height:3px;
            background-color: var(--green);
            width:100%;
        }
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
        --column-count: 6;
        --column-width: 1fr;
        --column-gap: 20px;

        &.donate-form {
            width: 800px;
            margin:auto;
        }

        .fields {
            display: grid;
            grid-template-columns: repeat(var(--column-count), var(--column-width));
            grid-template-rows: repeat(3, 100px);
            grid-template-areas:
                    "first_name first_name first_name last_name last_name last_name"
                    "address address address address address address"
                    "city city state state zip_code zip_code"
                    "email email email phone phone phone"
                    ". . submit submit . .";
            grid-column-gap: var(--column-gap);

            .field {
                label {
                    color: var(--black);
                    font-size: 22px;
                    font-weight: 500;
                    display: block;
                    width: 100%;
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
                    width: 100%;
                    height: 45px;
                    line-height: 45px;
                }
                &.first_name{ grid-area: first_name;}
                &.last_name{ grid-area: last_name;}
                &.address{ grid-area: address;}
                &.city{ grid-area: city;}
                &.state{ grid-area: state;}
                &.zip_code {grid-area: zip_code;}
                &.email {grid-area: email;}
                &.phone {grid-area: phone;}
            }

            .submit {
                grid-area: submit;
                text-align: center;
                padding: 40px;
                .btn {
                    margin:auto;
                }
            }
        }
    }

</style>

<template>
    <section class="section donate">
        <h1>CONTRIBUTE TO OUR EFFORTS</h1>
        <div class="icon">
            <p>DESCRIPTION HERE</p>
        </div>
        <div class="header">
            <div class="hline1">
                <div class="line"></div>
            </div>
            <div class="hcontent">Contact information</div>
            <div class="hline2">
                <div class="line"></div>
            </div>
        </div>
        <form class="donate-form">
            <div class="fields">
                <div class="field first_name">
                    <label for="first_name">First Name</label>
                    <input id="first_name" name="first_name" type="text">
                </div>
                <div class="field last_name">
                    <label for="last_name">Last Name</label>
                    <input id="last_name" name="last_name" type="text">
                </div>
                <div class="field address">
                    <label for="address">Address</label>
                    <input id="address" name="address" type="text">
                </div>
                <div class="field city">
                    <label for="city">City</label>
                    <input id="city" name="city" type="text">
                </div>
                <div class="field state">
                    <label for="state">State</label>
                    <input id="state" name="state" type="text">
                </div>
                <div class="field zip_code">
                    <label for="zip_code">Zip Code</label>
                    <input id="zip_code" name="zip_code" type="text">
                </div>
                <div class="field email">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text">
                </div>
                <div class="field phone">
                    <label for="phone">Phone</label>
                    <input id="phone" name="phone" type="text">
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
        name:'donateComponent'
    }
</script>
