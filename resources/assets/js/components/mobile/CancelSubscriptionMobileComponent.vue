<style lang="scss" scoped>
    .cancel-subscription {
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
        &.cancel-subscribe-form {
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
    <section class="section cancel-subscription">
        <h2>Cancel Subscription</h2>
        <div class="icon">
            <p>We're sad to see you go, this form will allow you to look up your email and let us know you want to cancel your subscription. <br />
                Please check your email after you submit your information to verify that it is you.</p>
        </div>
        <form v-if="!isSuccessful" @submit.prevent="onSubmit" action="" class="cancel-subscribe-form">
            <div class="fields">
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
                        <span v-if="isSubmitting" class="is-loading">
                            <div class="fa fa-spinner fa-spin"></div>
                        </span>
                        <span v-else>Cancel My Subscription</span>
                    </button>
                </div>
            </div>
        </form>
        <div class="successful-subscription" v-else>Please reconsider cancellation of your subscription.</div>
    </section>
</template>

<script>
    import FormField from "../FormField";
    import axios from 'axios';

    export default {
        name:'CancelSubscriptionComponent',
        components:{
            FormField
        },
        data()
        {
            return {
                isSubmitting:false,
                isSuccessful:false,
                errors:{
                    first_name:false,
                    last_name:false,
                    email:false,
                    zip_code:false
                },
                form:{
                    email:'',
                    zip_code:''
                }
            }
        },
        methods:{
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

                this.isSubmitting = true;

                axios.post('/api/cancel-subscription', this.form).then(json=>{
                    if(json.status)
                    {
                        this.isSubmitting = false;
                        this.isSuccessful = true;
                    }
                }).catch((error)=>{
                    console.error(error);
                    this.isSuccessful = false;
                    this.isSubmitting = false;
                });
            }
        }
    }
</script>
