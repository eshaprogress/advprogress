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
        --column-width: 100%;
        --column-gap: 20px;

        &.donate-form {
            width: 800px;
            margin:auto;
        }

        .fields {
            display: grid;
            grid-template-columns: repeat(var(--column-count), auto);
            grid-template-rows: repeat(3, 100px);
            grid-template-areas:
                    "first_name first_name first_name last_name last_name last_name"
                    "address address address address address address"
                    "city city state state zip_code zip_code"
                    "email email email phone phone phone"
                    ". . submit submit . .";
            grid-column-gap: var(--column-gap);

            .field {
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
        <form @submit.prevent="onSubmit" class="donate-form">
            <div class="fields">
                <form-field
                        class-name="first_name"
                        id="first_name"
                        :is-required="true"
                        label-text="First Name"
                        :model-value="first_name"
                        @onUpdate="onFirstNameChange" />
                <form-field
                        class-name="last_name"
                        id="last_name"
                        :is-required="true"
                        label-text="Last Name"
                        :model-value="last_name"
                        @onUpdate="onLastNameChange" />
                <form-field
                        class-name="address"
                        id="address"
                        :is-required="true"
                        label-text="Address"
                        :model-value="address"
                        @onUpdate="onAddressChange" />
                <form-field
                        class-name="city"
                        id="city"
                        :is-required="true"
                        label-text="City"
                        :model-value="city"
                        @onUpdate="onCityChange" />
                <form-field
                        class-name="state"
                        id="state"
                        :is-required="true"
                        label-text="State"
                        :model-value="state"
                        @onUpdate="onStateChange" />
                <form-field
                        class-name="zip_code"
                        id="zip_code"
                        :is-required="true"
                        label-text="Zip Code"
                        :model-value="zip_code"
                        @onUpdate="onZipChange" />
                <form-field
                        class-name="email"
                        id="email"
                        :is-required="true"
                        label-text="Email"
                        :model-value="email"
                        @onUpdate="onEmailChange" />
                <form-field
                        class-name="phone"
                        id="phone"
                        :is-required="true"
                        label-text="Phone"
                        :model-value="phone"
                        @onUpdate="onPhoneChange" />
                <div class="submit">
                    <button class="btn green" type="submit">SIGN ME UP</button>
                </div>
            </div>
            <div class="header">
                <div class="hline1">
                    <div class="line"></div>
                </div>
                <div class="hcontent">Payment information</div>
                <div class="hline2">
                    <div class="line"></div>
                </div>
            </div>
        </form>
    </section>
</template>

<script>
    import FormField from "./FormField";
    import axios from 'axios';

    export default {
        name:'donateComponent',
        components:{
            FormField
        },
        data(){
            return {
                first_name:'',
                last_name:'',
                address:'',
                city:'',
                state:'',
                zip_code:'',
                phone:'',
                email:''
            }
        },
        methods:{
            onFirstNameChange(value)
            {
                this.first_name = value;
            },
            onLastNameChange(value)
            {
                this.last_name = value;
            },
            onPhoneChange(value)
            {
                this.phone = value;
            },
            onEmailChange(value)
            {
                this.email = value;
            },
            onAddressChange(value)
            {
                this.address = value;
            },
            onCityChange(value)
            {
                this.city = value;
            },
            onStateChange(value)
            {
                this.state = value;
            },
            onZipChange(value)
            {
                this.zip_code = value;
            },
            onSubmit()
            {
                let data = {
                    first_name:this.first_name,
                    last_name:this.last_name,
                    address:this.address,
                    city:this.city,
                    state:this.state,
                    zip_code:this.zip_code,
                    phone:this.phone,
                    email:this.email
                };

                console.log(data);
            }
        }
    }
</script>
