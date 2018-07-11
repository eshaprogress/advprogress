<style lang="scss" scoped>
    .donate {
        margin-top: 50px;
        padding-bottom: 50px;
    }

    .donate-container {
        max-width:800px;
        margin:auto;
    }

    h1 {
        color: var(--blue);
        font-size: 32px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        padding: 0;
        text-align: center;
        margin: 0 0 24px;
    }

    p {
        font-size: 16px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        margin: 10px auto;
        text-align: justify;
        margin-bottom: 20px;
    }

    .header {
        color: var(--black);
        padding: 0;
        text-align: center;
        background-color: var(--white);
        display: grid;
        grid-auto-columns: auto 280px auto;

        grid-auto-rows: 1fr;
        grid-template-areas: "hline1 hcontent hline2";
        margin: auto auto 20px;

        .hline1,
        .hline2 {
            display: flex;
            align-items: center;
        }

        .hline1 {
            grid-area: hline1;
        }
        .hline2 {
            grid-area: hline2;
        }

        .hcontent {
            grid-area: hcontent;
            font-size: 24px;
            font-weight: 600;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
        }

        .line {
            height: 3px;
            background-color: var(--green);
            width: 100%;
        }
    }

    .icon {
        text-align: center;
        margin-bottom: 40px;
        img {
            width: 141px;
            height: 153px;
        }
        p {
            text-align: center;
            font-size: 24px;
            font-weight: 300;
            width: 650px;
            margin: auto;
        }
    }

    form {
        --column-count: 6;
        --column-width: 100%;
        --column-gap: 20px;

        &.donate-form {
            margin: auto;
        }

        .fields {
            &.contact-info-fields {
                display: grid;
                grid-template-columns: repeat(var(--column-count), auto);
                grid-template-rows: repeat(4, 100px);
                grid-template-areas:
                    "first_name first_name first_name last_name last_name last_name"
                    "address address address address address address"
                    "city city state state zip_code zip_code"
                    "email email email phone phone phone";
                grid-column-gap: var(--column-gap);

                .field {
                    &.first_name {
                        grid-area: first_name;
                    }
                    &.last_name {
                        grid-area: last_name;
                    }
                    &.address {
                        grid-area: address;
                    }
                    &.city {
                        grid-area: city;
                    }
                    &.state {
                        grid-area: state;
                    }
                    &.zip_code {
                        grid-area: zip_code;
                    }
                    &.email {
                        grid-area: email;
                    }
                    &.phone {
                        grid-area: phone;
                    }
                }
            }
            &.payment-info-fields {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                grid-template-rows: repeat(2, auto);
                grid-column-gap: 40px;
                grid-template-areas: "left right";

                .left {
                    grid-area: left;
                }
                .right {
                    grid-area: right;
                    .right-container {
                        display: flex;
                        flex-flow: row wrap;
                        .break {
                            flex-basis: 100%;
                            width: 0;
                            height: 10px;
                            overflow: hidden;
                        }
                        .ccnum,
                        .cc-cvc,
                        .ccexpirmonth,
                        .ccexpiryear {
                            padding:0;
                            margin: 0 2% 0 0;
                        }
                        .ccnum {width:75%;}
                        .cc-cvc {width:20%;}
                        .ccexpirmonth {width:20%;}
                        .ccexpiryear {width:20%;}
                    }
                }
            }
            &.payment-confirmation {
                padding-top:20px;
                .submit {
                    text-align: center;
                    padding:20px;
                    .btn {
                        margin: auto;
                        padding: 20px 46px;
                    }
                }

                .payment-choice {
                    margin-top:10px;
                    h3 {
                        text-transform: uppercase;
                        color:var(--red);
                        font-size: 19px;
                        font-weight: normal;
                        font-style: normal;
                        font-stretch: normal;
                        line-height: normal;
                        letter-spacing: normal;
                        text-align: center;
                        margin:0;
                        padding:12px;
                    }
                    background-color: var(--white1);
                    .payment-choice-container {
                        margin:auto;
                        width: 500px;
                        padding:20px;
                        label {
                            cursor: pointer;
                            font-size: 18px;
                            font-weight: normal;
                            font-style: normal;
                            font-stretch: normal;
                            line-height: normal;
                            letter-spacing: normal;
                            margin: 0;
                            padding: 0px;
                            display: inline-block;
                            padding-right: 10px;

                            &.active {
                                background-color: var(--white1);
                            }
                        }
                    }
                }

                .totals {
                    font-size: 24px;
                    font-weight: 600;
                    font-style: normal;
                    font-stretch: normal;
                    line-height: normal;
                    letter-spacing: normal;
                    margin-top: 20px;
                    text-align: center;
                    .total_label {
                        text-transform: uppercase;
                        margin:11px;
                    }
                    .line {
                        height: 2px;
                        background-color: var(--green);
                        width: 220px;
                        margin:auto;
                    }
                    .total_amount {
                        margin:11px;
                    }
                }
            }

            .field-container {
                &.left {
                    .amount-container {
                        display: grid;
                        grid-template-columns: repeat(3, 100px);
                        grid-template-rows: repeat(2, auto);
                        grid-column-gap: 32px;
                        grid-row-gap: 24px;
                        label {
                            font-size: 18px;
                            font-weight: normal;
                            font-style: normal;
                            font-stretch: normal;
                            line-height: normal;
                            letter-spacing: normal;
                        }
                        button {
                            width: 100%;
                        }
                    }
                    .amount-container-custom {
                        margin: 5px;
                    }
                }

                .custom-amount {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    grid-template-rows: repeat(1, auto);
                }

                label {
                    color: var(--black);
                    font-size: 18px;
                    font-weight: normal;
                    font-style: normal;
                    font-stretch: normal;
                    letter-spacing: normal;
                    display: block;
                    width: var(--column-width);
                    height:34px;
                    line-height: 34px;
                }
                button {
                    background-color: var(--white1);
                    color: var(--black);
                    font-size: 22px;
                    font-weight: 500;
                    display: block;
                    border: none;
                    width: var(--column-width);
                    height: 45px;
                    line-height: 45px;

                    &.active {
                        background-color: var(--green);
                        color: var(--white);
                    }
                }

            }
        }


    }

</style>

<template>
    <section class="section donate">
        <div class="donate-container">
            <h1>CONTRIBUTE TO OUR EFFORTS</h1>
            <p>Legislation to Advance Progress (“LEAP”) is a newly formed nonprofit organization dedicated to serving
                the needs of activists, citizens and elected officials by helping to create model state and local
                progressive legislation. The bold and consistent laws we put forth will place the needs of the many
                above the narrow financial interests of the few. LEAP will also evaluate and develop regulations and
                executive orders that will further our mission. Our participants include lawyers, scientists, professors
                and activists from across the country.
            </p>
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
                <div class="fields contact-info-fields">
                    <form-field
                            class-name="first_name"
                            id="first_name"
                            :is-required="true"
                            label-text="First Name"
                            :is-errored="errors.first_name"
                            :model-value="form.first_name"
                            @onUpdate="onFirstNameChange"/>
                    <form-field
                            class-name="last_name"
                            id="last_name"
                            :is-required="true"
                            label-text="Last Name"
                            :is-errored="errors.last_name"
                            :model-value="form.last_name"
                            @onUpdate="onLastNameChange"/>
                    <form-field
                            class-name="address"
                            id="address"
                            :is-required="true"
                            label-text="Address"
                            :is-errored="errors.address"
                            :model-value="form.address"
                            @onUpdate="onAddressChange"/>
                    <form-field
                            class-name="city"
                            id="city"
                            :is-required="true"
                            label-text="City"
                            :is-errored="errors.city"
                            :model-value="form.city"
                            @onUpdate="onCityChange"/>
                    <form-field
                            class-name="state"
                            id="state"
                            :is-required="true"
                            label-text="State"
                            :is-errored="errors.state"
                            :model-value="form.state"
                            @onUpdate="onStateChange"/>
                    <form-field
                            class-name="zip_code"
                            id="zip_code"
                            :is-required="true"
                            label-text="Zip Code"
                            :is-errored="errors.zip_code"
                            :model-value="form.zip_code"
                            @onUpdate="onZipChange"/>
                    <form-field
                            class-name="email"
                            id="email"
                            :is-required="true"
                            label-text="Email"
                            :is-errored="errors.email"
                            :model-value="form.email"
                            @onUpdate="onEmailChange"/>
                    <form-field
                            class-name="phone"
                            id="phone"
                            :is-required="true"
                            label-text="Phone"
                            :is-errored="errors.phone"
                            :model-value="form.phone"
                            @onUpdate="onPhoneChange"/>
                </div>
                <div class="header" style="margin-top:50px;">
                    <div class="hline1">
                        <div class="line"></div>
                    </div>
                    <div class="hcontent">Payment information</div>
                    <div class="hline2">
                        <div class="line"></div>
                    </div>
                </div>
                <div class="fields payment-info-fields">
                    <div class="left">
                        <div class="field-container left">
                            <label>Amount</label>
                            <div class="amount-container">
                                <template v-for="amount in getAmounts">
                                    <button :key="amount"
                                            v-bind:class="isActiveAmount(amount)"
                                            v-on:click="donateAmount(amount)"
                                            type="button"> ${{(amount !== 'custom'?amount:'_____')}} </button>
                                </template>
                            </div>
                            <div class="amount-container-custom">
                                <form-field
                                        v-show="isCustomEnabled"
                                        class-name="amount"
                                        id="amount"
                                        :is-required="true"
                                        label-text="Custom Amount"
                                        :is-errored="errors.amount"
                                        :model-value="form.amount"
                                        @onUpdate="onCustomAmount" />
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="right-container">
                            <form-field
                                    class-name="ccnum"
                                    id="ccnum"
                                    :is-required="true"
                                    placeholder-text="XXXX-XXXX-XXXX-XXXX"
                                    label-text="Card Number"
                                    :model-value="card.number"
                                    :is-errored="errors.card_number"
                                    @onUpdate="onCC_Number" />
                            <form-field
                                    class-name="cc-cvc"
                                    id="cccvc"
                                    :is-required="true"
                                    label-text=""
                                    placeholder-text="CVC"
                                    :model-value="card.cvc"
                                    :is-errored="errors.card_cvc"
                                    @onUpdate="onCC_CVC" />
                            <div class="break"></div>
                            <form-field
                                    class-name="ccexpirmonth"
                                    id="ccexpirmonth"
                                    :is-required="true"
                                    label-text="Expiration"
                                    :model-value="card.exp_month"
                                    :is-errored="errors.card_exp_month"
                                    placeholder-text="MM"
                                    @onUpdate="onCC_Month" />
                            <form-field
                                    class-name="ccexpiryear"
                                    id="ccexpiryear"
                                    :is-required="true"
                                    label-text=""
                                    placeholder-text="YYYY"
                                    :model-value="card.exp_year"
                                    :is-errored="errors.card_exp_year"
                                    @onUpdate="onCC_Year" />
                        </div>
                    </div>
                </div>
                <div class="fields payment-confirmation">
                    <div class="payment-choice">
                        <h3>Please Select A Donation Option</h3>
                        <div class="payment-choice-container">
                            <label v-bind:class="isPaymentTypeActive('simple-donation')" for="simple-donation">
                                <input id="simple-donation" v-model="payment_info.payment_type" name="payment_type"
                                       value="simple-donation" type="radio"/>
                                <span class="text">One Time Donation</span>
                            </label>
                            <label v-bind:class="isPaymentTypeActive('subscription')" for="subscription">
                                <input id="subscription" v-model="payment_info.payment_type" name="payment_type"
                                                                 value="subscription" type="radio"/>
                                <span class="text">Reoccurring Monthly Donation</span>
                            </label>
                        </div>
                    </div>
                    <div class="totals">
                        <div class="total_label">Your Total Contribution</div>
                        <div class="line"></div>
                        <div class="total_amount">${{getFormattedAmount}}</div>
                    </div>
                    <div class="submit">
                        <button class="btn green" type="submit">DONATE</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</template>

<script>
    import FormField from "./FormField";
    import axios from 'axios';

    let stripeToken = window.YOUR_STRIPE_PUBLISHABLE_KEY;

    export default {
        name: 'donateComponent',
        components: {
            FormField
        },
        data() {
            return {
                stripePublishToken:stripeToken,
                complete: false,
                isSuccess: false,
                amounts: {
                    '10': false,
                    '15': false,
                    '50': false,
                    '75': false,
                    '100': false,
                    'custom': false
                },
                form: {
                    first_name: '',
                    last_name: '',
                    address: '',
                    city: '',
                    state: '',
                    zip_code: '',
                    phone: '',
                    email: '',
                    amount: 0
                },
                card:{
                    number:'',
                    cvc:'',
                    exp_month:'',
                    exp_year:''
                },
                payment_info: {
                    payment_type: 'subscription',
                    card_brand: '',
                    strip_id:'',
                    card_last_four:''
                },
                errors: {
                    first_name: false,
                    last_name: false,
                    address: false,
                    city: false,
                    state: false,
                    zip_code: false,
                    phone: false,
                    email: false,

                    card_number:false,
                    card_cvc:false,
                    card_exp_month:false,
                    card_exp_year:false
                }
            }
        },
        computed: {
            getAmounts(){
                return Object.keys(this.amounts);
            },
            isCustomEnabled() {
                return this.amounts['custom'];
            },
            getFormattedAmount(){
                return this.form.amount.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
            }
        },
        methods: {
            isPaymentTypeActive(type)
            {
                return {
                    active: this.payment_info.payment_type === type
                };
            },
            isActiveAmount(amount) {
                return {active: this.amounts[amount]};
            },
            donateAmount(amount) {
                let keys = Object.keys(this.amounts);
                keys.forEach((key) => {
                    this.amounts[key] = (amount === key);
                });

                if (amount === 'custom') {
                    this.form.amount = 0;
                }
                else {
                    this.form.amount = parseInt(amount);
                }
            },
            onFirstNameChange(value) {
                this.form.first_name = value;
            },
            onLastNameChange(value) {
                this.form.last_name = value;
            },
            onPhoneChange(value) {
                this.form.phone = value;
            },
            onEmailChange(value) {
                this.form.email = value;
            },
            onAddressChange(value) {
                this.form.address = value;
            },
            onCityChange(value) {
                this.form.city = value;
            },
            onStateChange(value) {
                this.form.state = value;
            },
            onZipChange(value) {
                this.form.zip_code = value;
            },
            onCustomAmount(value)
            {
                this.form.amount = value;
            },
            onCC_Number(value){
                this.card.number = value;
            },
            onCC_CVC(value) {
                this.card.cvc = value;
            },
            onCC_Month(value) {
                this.card.exp_month = value;
            }, onCC_Year(value)
            {
                this.card.exp_year = value;
            },
            resetFields()
            {
                Object.keys(this.errors).forEach((key)=>{
                    this.errors[key] = false;
                });
            },
            onSubmit()
            {
                let errors = 0;
                let trim_values = ['number','exp_month','exp_year','cvc'];
                let validate_values = ['first_name','last_name','address','city','state','zip_code'];

                this.resetFields();

                trim_values.forEach((key)=>{
                    this.card[key] = this.card[key].trim();
                });

                if(!Stripe.card.validateCardNumber(this.card.number))
                {
                    this.errors.card_number = true;
                    errors++;
                }
                if(!Stripe.card.validateExpiry(this.card.exp_month, this.card.exp_year))
                {
                    this.errors.card_exp_month = true;
                    this.errors.card_exp_year = true;
                    errors++;
                }
                if(!Stripe.card.validateCVC(this.card.cvc))
                {
                    this.errors.card_cvc = true;
                    errors++;
                }
                validate_values.forEach((val)=>{
                    this.errors[val] = (!this.form[val].length);
                    if(this.errors[val]) errors++;
                });

                if(errors > 0)
                    return;

                Stripe.card.createToken({
                    number: this.card.number,
                    cvc: this.card.cvc,
                    exp_month: this.card.exp_month,
                    exp_year: this.card.exp_year,
                    name:`${this.form.first_name} ${this.form.last_name}`,
                    address_line1:this.form.address,
                    address_city:this.form.city,
                    address_state:this.form.state,
                    address_zip:this.form.zip_code,
                }, (status, response)=>{
                    console.log('status',status, 'response', response);
                });
                // axios.post('/api/donate', {
                //     form:this.form,
                //     payment_info:this.payment_info
                // }).then(json=>console.log(json));
            }
        },
        stripe$:null,
        mounted(){
            Stripe.setPublishableKey(this.stripePublishToken);

        }
    }
</script>
