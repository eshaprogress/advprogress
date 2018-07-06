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
        <form @submit.prevent="onSubmit" class="subscribe-form">
            <div class="fields">
                <form-field
                        id="first_name"
                        :is-required="true"
                        label-text="First Name"
                        field-name="embedded_form_subscription[field_1]"
                        :model-value="first_name"
                        @onUpdate="onFirstNameChange" />
                <form-field
                        id="last_name"
                        :is-required="true"
                        label-text="Last Name"
                        field-name="embedded_form_subscription[field_2]"
                        :model-value="last_name"
                        @onUpdate="onLastNameChange" />
                <form-field
                        id="zip_code"
                        :is-required="true"
                        label-text="Zip Code"
                        field-name="embedded_form_subscription[field_3]"
                        :model-value="zip_code"
                        @onUpdate="onZipChange" />
                <form-field
                        id="email"
                        :is-required="true"
                        label-text="Email"
                        field-name="embedded_form_subscription[field_0]"
                        :model-value="email"
                        @onUpdate="onEmailChange" />
                <div class="submit">
                    <button class="btn green" type="submit">SIGN ME UP</button>
                </div>
            </div>

        </form>
    </section>
</template>

<script>
    import FormField from "./FormField";
    import axios from 'axios';

    export default {
        name:'SubscribeComponent',
        components:{
            FormField
        },
        data(){
            return {
                first_name:'',
                last_name:'',
                email:'',
                zip_code:''
            }
        },
        methods:{
            onFirstNameChange(value)
            {
                this.first_name = value;
            },
            onLastNameChange(value){
                this.last_name = value;
            },
            onEmailChange(value){
                this.email = value;
            },
            onZipChange(value){
                this.zip_code = value;
            },
            onSubmit()
            {
                let formData = new FormData();
                formData.append('embedded_form_subscription[field_0]', this.email);
                formData.append('embedded_form_subscription[field_1]', this.first_name);
                formData.append('embedded_form_subscription[field_2]', this.last_name);
                formData.append('embedded_form_subscription[field_3]', this.zip_code);

                let subscribe_list_url = 'https://emailoctopus.com/lists/49d3b78f-7cee-11e8-a3c9-06b79b628af2/members/embedded/1.1/add';
                axios({
                    method: 'post',
                    url: subscribe_list_url,
                    data: formData,
                    config: { headers: {'Content-Type': 'multipart/form-data' }}
                }).then((data)=>{
                    console.log(data);
                }).catch((error)=>{
                    console.error(error);
                })
            }
        }
    }
</script>
