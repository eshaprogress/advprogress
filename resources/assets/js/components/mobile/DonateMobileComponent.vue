<style lang="scss" scoped>
    .donate {
        margin-top: 0;
        padding: 20px;
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

    .success {
        margin-top: 70px;
        h2 {
            color: var(--green);
            text-align: center;
            background-color: var(--white1);
            padding: 20px;
            display: block;
            margin:0;
        }
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
        --column-count: 9;
        --column-width: 100%;
        --column-gap: 20px;

        &.donate-form {
            margin: auto;
        }

        .fields {
            &.contact-info-fields {
                display: grid;
                grid-template-columns: auto;
                grid-template-rows: repeat(var(--column-count), auto);

                grid-template-areas:
                    "first_name"
                    "last_name"
                    "address"
                    "city"
                    "state"
                    "zip_code"
                    "email"
                    "phone";
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
                grid-template-columns: auto;
                grid-template-rows: repeat(2, auto);
                grid-column-gap: 40px;
                grid-template-areas: "left" "right";

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
                .payment-choice {
                    margin-top:10px;
                    h3 {
                        text-transform: uppercase;
                        color: var(--red);
                        font-size: 16px;
                        font-weight: normal;
                        font-style: normal;
                        font-stretch: normal;
                        line-height: normal;
                        letter-spacing: normal;
                        text-align: center;
                        margin: 0;
                        padding: 10px;
                    }
                    background-color: var(--white1);
                    .payment-choice-container {
                        margin:auto;
                        padding:10px;
                        label {
                            display: block;
                            cursor: pointer;
                            font-size: 18px;
                            font-weight: normal;
                            font-style: normal;
                            font-stretch: normal;
                            line-height: normal;
                            letter-spacing: normal;
                            margin: 0;
                            padding: 10px;

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
                        margin: 20px 0 0;
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

        .submit {
            text-align: center;
            padding:20px;
            margin:auto;
            .btn {
                margin: auto;
                padding: 20px 46px;
            }
        }

        .genera-errors {
            color: var(--red);
            width: 400px;
            padding: 10px;
            margin: 10px auto;
            .error-item {
                font-size: 15px;
                border-bottom: dashed 1px var(--red);
                margin-bottom: 2px;
                line-height: 20px;
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
            <template v-if="isSuccessful">
                <div class="success">
                    <h2>Thank you for donating to our cause.</h2>
                </div>
            </template>
            <template v-else>
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
                                label-text="First Name"
                                auto-complete="given-name"
                                :model-value="form.first_name"
                                :is-required="true"
                                :is-errored="errors.first_name"
                                :error-message="errors.first_name_msg"
                                @onUpdate="onFirstNameChange"/>
                        <form-field
                                class-name="last_name"
                                id="last_name"
                                label-text="Last Name"
                                auto-complete="family-name"
                                :model-value="form.last_name"
                                :is-required="true"
                                :is-errored="errors.last_name"
                                :error-message="errors.last_name_msg"
                                @onUpdate="onLastNameChange"/>
                        <form-field
                                class-name="address"
                                id="address"
                                label-text="Address"
                                auto-complete="street-address"
                                :model-value="form.address"
                                :is-required="true"
                                :is-errored="errors.address"
                                :error-message="errors.address_msg"
                                @onUpdate="onAddressChange"/>
                        <form-field
                                class-name="city"
                                id="city"
                                label-text="City"
                                auto-complete="address-level2"
                                :model-value="form.city"
                                :is-required="true"
                                :is-errored="errors.city"
                                :error-message="errors.city_msg"
                                @onUpdate="onCityChange"/>
                        <form-field
                                class-name="state"
                                id="state"
                                label-text="State"
                                auto-complete="address-level1"
                                :model-value="form.state"
                                :is-required="true"
                                :is-errored="errors.state"
                                :error-message="errors.state_msg"
                                @onUpdate="onStateChange"/>
                        <form-field
                                class-name="zip_code"
                                id="zip_code"
                                label-text="Zip Code"
                                auto-complete="postal-code"
                                :model-value="form.zip_code"
                                :is-required="true"
                                :is-errored="errors.zip_code"
                                :error-message="errors.zip_code_msg"
                                @onUpdate="onZipChange"/>
                        <form-field
                                class-name="email"
                                id="email"
                                field-type="email'"
                                label-text="Email"
                                auto-complete="email"
                                :model-value="form.email"
                                :is-required="true"
                                :is-errored="errors.email"
                                :error-message="errors.email_msg"
                                @onUpdate="onEmailChange"/>
                        <form-field
                                class-name="phone"
                                id="phone"
                                label-text="Phone"
                                auto-complete="tel-national"
                                field-type="tel"
                                :model-value="form.phone"
                                :is-required="true"
                                :is-errored="errors.phone"
                                :error-message="errors.phone_msg"
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
                                            label-text="Custom Amount"
                                            :model-value="form.amount"
                                            :is-required="true"
                                            :is-errored="errors.amount"
                                            :error-message="errors.amount_msg"
                                            @onUpdate="onCustomAmount" />
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <div class="right-container">
                                <form-field
                                        class-name="ccnum"
                                        id="ccnum"
                                        placeholder-text="XXXX-XXXX-XXXX-XXXX"
                                        label-text="Card Number"
                                        auto-complete="cc-number"
                                        :model-value="card.number"
                                        :is-required="true"
                                        :is-errored="errors.card_number"
                                        :error-message="errors.card_number_msg"
                                        @onUpdate="onCC_Number" />
                                <form-field
                                        class-name="cc-cvc"
                                        id="cccvc"
                                        label-text=""
                                        placeholder-text="CVC"
                                        auto-complete="cc-csc"
                                        :model-value="card.cvc"
                                        :is-required="true"
                                        :is-errored="errors.card_cvc"
                                        :error-message="errors.card_cvc_msg"
                                        @onUpdate="onCC_CVC" />
                                <div class="break"></div>
                                <form-field
                                        class-name="ccexpirmonth"
                                        id="ccexpirmonth"
                                        label-text="Expiration"
                                        auto-complete="cc-exp-month"
                                        placeholder-text="MM"
                                        :model-value="card.exp_month"
                                        :is-errored="errors.card_exp_month"
                                        :error-message="errors.card_exp_month_msg"
                                        :is-required="true"
                                        @onUpdate="onCC_Month" />
                                <form-field
                                        class-name="ccexpiryear"
                                        id="ccexpiryear"
                                        label-text=""
                                        auto-complete="cc-exp-year"
                                        placeholder-text="YYYY"
                                        :model-value="card.exp_year"
                                        :is-required="true"
                                        :is-errored="errors.card_exp_year"
                                        :error-message="errors.card_exp_year_msg"
                                        @onUpdate="onCC_Year" />
                            </div>
                        </div>
                    </div>
                    <div class="fields payment-confirmation">
                        <div class="payment-choice">
                            <h3>Please Select A Donation Option</h3>
                            <div class="payment-choice-container">
                                <label for="simple-donation"
                                       v-bind:class="isPaymentTypeActive('simple-donation')" >
                                    <input id="simple-donation"
                                           v-model="payment_info.payment_type"
                                           name="payment_type"
                                           value="simple-donation" type="radio"/>
                                    <span class="text">One Time Donation</span>
                                </label>
                                <label for="subscription"
                                       v-bind:class="isPaymentTypeActive('subscription')" >
                                    <input id="subscription"
                                           v-model="payment_info.payment_type"
                                           name="payment_type"
                                           value="subscription" type="radio"/>
                                    <span class="text">Reoccurring Monthly Donation</span>
                                </label>
                            </div>
                        </div>
                        <div v-if="hasGeneralErrors" class="genera-errors">
                            <template v-for="error_msg in errors.general_error_msg">
                                <div :key="error_msg" class="error-item">{{error_msg}}</div>
                            </template>
                        </div>
                        <div class="totals">
                            <div class="total_label">Your Total Contribution</div>
                            <div class="line"></div>
                            <div class="total_amount">${{getFormattedAmount}}</div>
                        </div>
                    </div>
                    <div class="submit">
                        <button :disabled="isSubmitting" class="btn green" type="submit">
                            <span v-if="isSubmitting" class="is-loading">
                                <i class="fa fa-spinner fa-spin"></i>
                            </span>
                            <span v-else>DONATE</span>
                        </button>
                    </div>
                </form>
            </template>
        </div>
    </section>
</template>

<script>
    import FormField from "../FormField";
    import axios from 'axios';
    import {stripePublishToken} from '../../environment.json';

    import { Base64 } from 'js-base64';

    const mapToFormErrors = ({responseErrors, formErrorObj})=>{
        let validation_map = {
            'form.first_name':{field:'first_name'},
            'form.last_name':{field:'last_name'},
            'form.address':{field:'address'},
            'form.city':{field:'city'},
            'form.state':{field:'state'},
            'form.zip_code':{field:'zip_code'},
            'form.phone':{field:'phone'},
            'form.email':{field:'email'},
            'form.amount':{field:'amount'}
        };

        Object.keys(responseErrors).forEach((key)=>{
            let map = validation_map[key];
            if(map)
            {
                formErrorObj[map.field] = true;
                formErrorObj[`${map.field}_msg`] = responseErrors[key].join('');
                return;
            }

            formErrorObj['general_error'] = true;
            formErrorObj['general_error_msg'].push(`[${key}] ${responseErrors[key].join('')}`);
        });
    };

    export default {
        name: 'DonateMobileComponent',
        components: {
            FormField
        },
        data() {
            return {
                stripePublishToken:stripePublishToken,
                isSubmitting:false,
                isSuccessful: false,
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
                    amount: 0,
                    isCustom:false,
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
                    card_last_four:''
                },
                error_keys: [
                    'first_name',
                    'last_name',
                    'address',
                    'city',
                    'state',
                    'zip_code',
                    'phone',
                    'email',
                    'amount',
                    'card_number',
                    'card_cvc',
                    'card_exp_month',
                    'card_exp_year',
                ],
                errors: {
                    first_name: false,
                    first_name_msg: '',
                    last_name: false,
                    last_name_msg: '',
                    address: false,
                    address_msg: '',
                    city: false,
                    city_msg: '',
                    state: false,
                    state_msg: '',
                    zip_code: false,
                    zip_code_msg: '',
                    phone: false,
                    phone_msg: '',
                    email: false,
                    email_msg: '',
                    amount: false,
                    amount_msg: '',

                    card_number:false,
                    card_number_msg: '',
                    card_cvc:false,
                    card_cvc_msg: '',
                    card_exp_month:false,
                    card_exp_month_msg: '',
                    card_exp_year:false,
                    card_exp_year_msg: '',

                    general_error:true,
                    general_error_msg:[]
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
            },
            hasGeneralErrors()
            {
                return this.errors.general_error  && this.errors.general_error_msg.length > 0;
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
            },
            onCC_Year(value)
            {
                this.card.exp_year = value;
            },
            resetFields()
            {
                this.error_keys.forEach((key)=>{
                    this.errors[key] = false;
                    this.errors[key+'_msg'] = '';
                });

                this.errors.general_error = false;
                this.errors.general_error_msg = [];
            },
            trimValues() {
                let trim_values = ['number','exp_month','exp_year','cvc'];
                trim_values.forEach((key)=>{
                    this.card[key] = this.card[key].trim();
                });
            },
            onSubmit()
            {
                let errors = 0;
                let validate_values = [
                    'first_name',
                    'last_name',
                    'address',
                    'city',
                    'state',
                    'zip_code'
                ];

                this.resetFields();
                this.trimValues();

                let testCardNumber = Stripe.card.validateCardNumber(this.card.number);
                let testExpirationDate = Stripe.card.validateExpiry(this.card.exp_month, this.card.exp_year);
                let testCVVNumber = Stripe.card.validateCVC(this.card.cvc);

                if(!testCardNumber)
                {
                    this.errors.card_number = true;
                    errors++;
                }
                if(!testExpirationDate)
                {
                    this.errors.card_exp_month = true;
                    this.errors.card_exp_year = true;
                    errors++;
                }
                if(!testCVVNumber)
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

                this.isSubmitting = true;

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

                    let {id:stripeTokenId, card} = response;
                    let {brand, last4, name, id:cardToken} = card;
                    this.payment_info.card_brand = brand;
                    this.payment_info.card_last_four = last4;

                    if(status === 200)
                    {
                        this.form.isCustom = this.isCustomEnabled;

                        let data = {
                            form:this.form,
                            payment_info:this.payment_info,
                            name:name,
                            cardToken,
                            stripeToken:stripeTokenId
                        };
                        let json_str = JSON.stringify(data);
                        let encodedResponse = {data:Base64.encode(json_str)};
                        axios.post('/api/donate', encodedResponse).then(json=>{
                            if(json.status)
                            {
                                this.isSubmitting = false;
                                this.isSuccessful = true;
                            }
                        }).catch(resp => {
                            let json = resp.response.data;
                            this.isSuccessful = false;
                            this.isSubmitting = false;

                            if(json.errors)
                            {
                                mapToFormErrors({
                                    responseErrors:json.errors,
                                    formErrorObj:this.errors
                                });
                            }
                        });
                        return;
                    }

                    this.isSubmitting = false;
                    this.isSuccessful = false;
                });
            }
        },
        stripe$:null,
        mounted()
        {
            Stripe.setPublishableKey(this.stripePublishToken);
        }
    }
</script>
