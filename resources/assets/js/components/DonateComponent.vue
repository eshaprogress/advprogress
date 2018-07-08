<style lang="scss" scoped>
    .donate {
        margin-top: 50px;
        padding-bottom: 160px;
    }

    h1 {
        color: var(--blue);
        font-size: 40px;
        font-weight: 900;
        padding: 0;
        text-align: center;
        margin: 0 0 24px;
    }

    p {
        font-size: 24px;
        font-weight: 300;
        max-width: 950px;
        margin: 10px auto;
        text-align: justify;
        margin-bottom: 20px;
    }

    .header {
        color: var(--blue);
        font-size: 40px;
        font-weight: 900;
        padding: 0;
        text-align: center;
        background-color: var(--white);
        display: grid;
        grid-auto-columns: 250px 450px 250px;

        grid-auto-rows: 1fr;
        grid-template-areas: "hline1 hcontent hline2";
        width: 950px;
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
            width: 950px;
            margin: auto;
        }

        .submit {
            grid-area: submit;
            margin-top: 72px;
            text-align: center;
            .btn {
                margin: auto;
                padding: 20px 46px;
            }
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
                grid-template-areas:
                        "left right"
                        "totals totals"
                        "submit submit";
                .field-group {
                    cursor: pointer;
                    font-size: 20px;
                    font-weight: 900;
                    margin: 5px 5px 20px;
                    padding: 10px 5px;

                    &.active {
                        background-color: var(--white1);
                    }
                }
                .totals {
                    grid-area: totals;
                    display: grid;
                    grid-template-columns: repeat(5, 1fr);
                    font-size: 30px;
                    margin-top: 20px;
                    border-top: solid 3px var(--green);
                    border-bottom: solid 3px var(--green);
                    .total_label {
                        grid-column: 4;
                        text-align: right;
                    }
                    .total_amount {
                        grid-column: 5;
                        text-align: right;
                    }
                }
                .left {
                    grid-area: left;
                }
                .right {
                    grid-area: right;
                    .right-container {
                        display: grid;
                        grid-template-columns: auto 10px auto;
                        grid-template-rows: repeat(2, auto);
                        grid-template-areas: "ccnum ccnum ccnum" "ccexpirmonth . ccexpiryear";
                        grid-column-gap: 10px;
                        .ccnum {
                            grid-area: ccnum;
                        }
                        .ccexpirmonth {
                            grid-area: ccexpirmonth;
                        }
                        .ccexpiryear {
                            grid-area: ccexpiryear;
                        }
                    }
                }
            }

            .field-container {
                &.left {
                    .amount-container {
                        display: grid;
                        grid-template-columns: repeat(3, auto);
                        grid-template-rows: repeat(2, auto);
                        grid-column-gap: 32px;
                        grid-row-gap: 24px;
                        button {
                            width: 100%;
                            height: 50px;
                            line-height: 50px;
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
                    font-size: 22px;
                    font-weight: 500;
                    display: block;
                    width: var(--column-width);
                    height: 50px;
                    line-height: 50px;
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
                    <div v-bind:class="isPaymentTypeActive('subscription')" class="field-group" style="text-align: left;">
                        <input id="non-subscription" v-model="payment_info.payment_type" name="payment_type"
                               value="subscription" type="radio"/>
                        <label for="non-subscription">I'd like to donate this as a subscription.</label>
                    </div>

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
                    <div v-bind:class="isPaymentTypeActive('simple-donation')" class="field-group" style="text-align: right;">
                        <label for="subscription">One Time Donation.</label>
                        <input id="subscription" v-model="payment_info.payment_type" name="payment_type"
                               value="simple-donation" type="radio"/>
                    </div>
                    <div class="right-container">
                        <form-field
                                class-name="ccnum"
                                id="ccnum"
                                :is-required="true"
                                placeholder-text="XXXX-XXXX-XXXX-XXXX"
                                label-text="Card Number"
                                :is-errored="errors.card_number"
                                :model-value="payment_info.card_number"
                                @onUpdate="onCCNumber"/>
                        <form-field
                                class-name="ccexpirmonth"
                                id="ccexpirmonth"
                                :is-required="true"
                                label-text="Expiration"
                                :is-errored="errors.expiration_month"
                                :model-value="payment_info.expiration_month"
                                placeholder-text="MM"
                                @onUpdate="onCCMonth"/>
                        <form-field
                                class-name="ccexpiryear"
                                id="ccexpiryear"
                                :is-required="true"
                                label-text=""
                                placeholder-text="YYYY"
                                :is-errored="errors.expiration_year"
                                :model-value="payment_info.expiration_year"
                                @onUpdate="onCCYear"/>
                    </div>
                </div>
                <div class="totals">
                    <div class="total_label">amounts:</div>
                    <div class="total_amount">${{getFormattedAmount}}</div>

                </div>
                <div class="submit">
                    <button class="btn green" type="submit">DONATE</button>
                </div>
            </div>
        </form>
    </section>
</template>

<script>
    import FormField from "./FormField";
    import axios from 'axios';

    export default {
        name: 'donateComponent',
        components: {
            FormField
        },
        data() {
            return {
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
                payment_info: {
                    payment_type: 'subscription',
                    card_number: '',
                    expiration_month: '',
                    expiration_year: ''
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
                    card_number: false,
                    expiration_month: false,
                    expiration_year: false,
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
            onCCNumber(value) {
                this.payment_info.card_number = value;
            },
            onCCMonth(value) {
                this.payment_info.expiration_month = value;
            },
            onCCYear(value) {
                this.payment_info.expiration_year = value;
            },
            onSubmit() {
                console.log(this.form);
            }
        }
    }
</script>
