<style lang="scss" scoped>
    .cancel-subscription-confirmation {
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
    .successful-cancellation{
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
    <section class="section cancel-subscription-confirmation">
        <h2>Cancel Subscription Confirmation</h2>
        <div class="icon">
            <p>You still have an opportunity to not cancel, this is your last chance.</p>
            <p>Once submitted, this will cancel your subscription with us.</p>
        </div>
        <form v-if="!isSuccessful" @submit.prevent="onSubmit" action="" class="cancel-subscribe-form">
            <div class="fields">
                <form-field
                        id="code"
                        label-text="Cancellation Code"
                        :model-value="form.code"
                        :is-required="true"
                        :is-errored="errors.code"
                        @onUpdate="onCodeChange" />
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
        <div class="successful-cancellation" v-else>Bye..</div>
    </section>
</template>

<script>
    import FormField from "./FormField";
    import axios from 'axios';

    export default {
        name:'CancelSubscriptionConfirmedComponent',
        components:{
            FormField
        },
        data()
        {
            return {
                isSubmitting:false,
                isSuccessful:false,
                errors:{
                    code:false
                },
                form:{
                    code:''
                }
            }
        },
        methods:{
            onCodeChange(value)
            {
                this.form.code = value;
            },
            onSubmit()
            {
                let errors = 0;
                if(!this.form.code.length)
                {
                    errors++;
                    this.errors.code = true;
                }

                if(errors>0)
                {
                    return false;
                }

                this.isSubmitting = true;

                axios.post('/api/cancel-subscription-confirmed', this.form).then(json=>{
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
