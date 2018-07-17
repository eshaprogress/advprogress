<style lang="scss" scoped>
    .subscribe {
        margin-top: 50px;
        margin-bottom: 50px;
    }
    h2 {
        color:var(--blue);
        font-size: 32px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        padding:0;
        text-align: center;
        margin: 0;
    }
    .icon {
        text-align: center;
        margin-bottom:40px;
        img {
            width: 108px;
            margin:24px;
        }
        p {
            text-align: center;
            font-size: 18px;
            font-weight: normal;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
            max-width:600px;
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

            .submit {
                grid-column: 1 / span 2;
                text-align: center;
                padding: 40px;
            }
        }
    }
    .successful-subscription{
        text-align: center;
        font-size: 30px;
        color: var(--green);
    }

    .is-loading{
        text-align: center;
        font-size: 30px;
        color: var(--white);
    }

</style>

<template>
    <section class="section subscribe">
        <h2>Subscribe</h2>
        <div class="icon">
            <img src="/images/newsletter-icon.png" alt="">
            <p>Stay up to date with all of our progress and join the community!</p>
        </div>
        <form v-if="!isSuccessful" @submit.prevent="onSubmit" action="" class="subscribe-form">
            <div class="fields">
                <input :name="emailOctopusId" type="hidden" value="">
                <form-field
                        id="first_name"
                        label-text="First Name"
                        field-name="embedded_form_subscription[field_1]"
                        auto-complete="given-name"
                        :is-required="true"
                        :is-errored="errors.first_name"
                        :model-value="form.first_name"
                        @onUpdate="onFirstNameChange" />
                <form-field
                        id="last_name"
                        label-text="Last Name"
                        field-name="embedded_form_subscription[field_2]"
                        auto-complete="family-name"
                        :model-value="form.last_name"
                        :is-required="true"
                        :is-errored="errors.last_name"
                        @onUpdate="onLastNameChange" />
                <form-field
                        id="zip_code"
                        label-text="Zip Code"
                        field-name="embedded_form_subscription[field_3]"
                        auto-complete="postal-code"
                        :model-value="form.zip_code"
                        :is-required="true"
                        :is-errored="errors.zip_code"
                        @onUpdate="onZipChange" />
                <form-field
                        id="email"
                        label-text="Email"
                        field-name="embedded_form_subscription[field_0]"
                        field-type="email"
                        auto-complete="email"
                        :model-value="form.email"
                        :is-required="true"
                        :is-errored="errors.email"
                        @onUpdate="onEmailChange" />
                <div class="submit">
                    <button class="btn green" type="submit">
                        <span v-if="isLoading" class="is-loading">
                            <div class="fa fa-spinner fa-spin"></div>
                        </span>
                        <span v-else>SIGN ME UP</span>
                    </button>
                </div>
            </div>
        </form>
        <div class="successful-subscription" v-else>Thank you for subscribing to our news letter!</div>

    </section>
</template>

<script>
    import FormField from "./FormField";
    import $ from 'jquery';
    import {emailOctopusId} from '../environment.json';

    export default {
        name:'SubscribeComponent',
        components:{
            FormField
        },
        data()
        {
            return {
                isLoading:false,
                emailOctopusId:emailOctopusId,
                isSuccessful:false,
                errors:{
                    first_name:false,
                    last_name:false,
                    email:false,
                    zip_code:false
                },
                form:{
                    first_name:'',
                    last_name:'',
                    email:'',
                    zip_code:''
                }
            }
        },
        methods:{
            onFirstNameChange(value)
            {
                this.form.first_name = value;
            },
            onLastNameChange(value){
                this.form.last_name = value;
            },
            onEmailChange(value){
                this.form.email = value;
            },
            onZipChange(value){
                this.form.zip_code = value;
            },
            onSubmit()
            {
                let emailRegex = /\S+@\S+\.\S+/;
                let zipCode = /^(\d{5})+(?:[-\s]\d{4})?$/;
                let subscribe_list_url = `https://emailoctopus.com/lists/${this.emailOctopusId}/members/embedded/1.1/add`;

                let errors = 0;
                if(!emailRegex.test(this.form.email))
                {
                    errors++;
                    this.errors.email = true;
                }

                if(!zipCode.test(this.form.zip_code))
                {
                    errors++;
                    this.errors.zip_code = true;
                }

                if(errors>0)
                {
                    return false;
                }

                this.isLoading = true;
                // Had to use jQuery ajax call because the API provided by emailoctopus doesn't work at all with axios due to the CORS requirement.
                $.ajax({
                    method: "POST",
                    url: subscribe_list_url,
                    data: $('form.subscribe-form').serialize(),
                }).done(( json ) => {
                    this.isLoading = false;

                    console.log(json);
                    if(json.success === true)
                    {
                        this.isSuccessful = true;
                    }
                }).fail((text)=>{
                    console.log(text);
                });
            }
        }
    }
</script>
