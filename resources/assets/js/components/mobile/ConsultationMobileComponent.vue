<style lang="scss" scoped>
    .consultation {
        margin-top: 50px;
        padding-bottom: 50px;
    }

    .consultation-container {
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

    .line {
        background-color: var(--blue);
        height: 2px;
        margin: 40px 0;
    }

    form {
        --column-count: 6;
        --column-width: 100%;
        --column-gap: 20px;

        &.consultation-form {
            margin: auto;
        }

        .fields {
            &.organization-info-fields {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                grid-template-areas: "left right";
                margin-bottom: 20px;
                .left {
                    h3 {
                        text-align: center;
                        font-size: 19px;
                        font-weight: normal;
                        font-style: normal;
                        font-stretch: normal;
                        line-height: normal;
                        letter-spacing: normal;
                    }
                    .organization-choice-container {
                        label {
                            display: block;
                            font-size: 18px;
                            font-weight: normal;
                            font-style: normal;
                            font-stretch: normal;
                            line-height: normal;
                            letter-spacing: normal;
                        }
                        width:50%;
                        margin:auto;
                    }
                }
                .right {}
            }

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

            &.comment-field {
                textarea {
                    height:400px;
                }
            }
        }

        .submit {
            margin: 50px auto auto;
            width:50%;
            text-align: center;
        }


    }

</style>

<template>
    <section class="section consultation">
        <div class="consultation-container">
            <h1>REQUEST A CONSULTATION</h1>
            <div class="line"></div>
            <template v-if="isSuccessful">
                <div class="success">
                    <h2>You're consultation request has been submitted. An email has been sent to you detailing your information submitted.</h2>
                </div>
            </template>
            <template v-else>
                <form @submit.prevent="onSubmit" class="consultation-form">
                    <div class="fields organization-info-fields">
                        <div class="left">
                            <h3>ARE YOU:</h3>
                            <div class="organization-choice-container">
                                <label for="is-organization">
                                    <input id="is-organization" v-model="form.isOrganization" name="is-organization"
                                           :value="true" type="radio"/>
                                    <span class="text">An Organization</span>
                                </label>
                                <label for="is-not-organization">
                                    <input id="is-not-organization" v-model="form.isOrganization" name="is-organization"
                                           :value="false" type="radio"/>
                                    <span class="text">An Individual</span>
                                </label>
                            </div>
                        </div>
                        <div class="right">
                            <form-field
                                    class-name="organization_name"
                                    auto-complete="organization"
                                    id="organization_name"
                                    label-text="Organization Name"
                                    placeholder-text="Acme Corporation"
                                    :model-value="form.organization_name"
                                    :is-disabled="!isAnOrganization"
                                    :is-required="true"
                                    :is-errored="errors.organization_name"
                                    :error-message="errors.organization_name_msg"
                                    @onUpdate="onOrganizationNameChange"/>
                        </div>
                    </div>
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
                    <div class="line"></div>
                    <div class="fields comment-field">
                        <form-field
                                class-name="comment"
                                id="comment"
                                label-text="Comment"
                                style-vars="--min-height: 200px;"
                                :model-value="form.comment"
                                :is-text-area="true"
                                :is-required="true"
                                :is-errored="errors.comment"
                                :error-message="errors.comment_msg"
                                @onUpdate="onCommentChange"/>
                    </div>
                    <div class="submit">
                        <button class="btn blue" type="submit">
                                <span v-if="isSubmitting" class="is-loading">
                                    <i class="fa fa-spinner fa-spin"></i>
                                </span>
                            <span v-else>SEND</span>
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

    const mapToFormErrors = ({responseErrors, formErrorObj})=>{
        let validation_map = {
            'first_name':{field:'first_name'},
            'comment':{field:'comment'},
            'organization_name':{field:'organization_name'},
            'last_name':{field:'last_name'},
            'address':{field:'address'},
            'city':{field:'city'},
            'state':{field:'state'},
            'zip_code':{field:'zip_code'},
            'phone':{field:'phone'},
            'email':{field:'email'},
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
        name: 'ConsultationMobileComponent',
        components: {
            FormField
        },
        data() {
            return {
                isSubmitting:false,
                isSuccessful: false,
                form: {
                    first_name: '',
                    last_name: '',
                    organization_name: '',
                    address: '',
                    city: '',
                    state: '',
                    zip_code: '',
                    phone: '',
                    email: '',
                    comment: '',
                    isOrganization: false
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
                    'comment',
                    'organization_name'
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

                    organization_name: false,
                    organization_name_msg: '',
                    comment: false,
                    comment_msg: '',

                    general_error:true,
                    general_error_msg:[]

                }
            }
        },
        computed:{
            isAnOrganization()
            {
                return (this.form.isOrganization === true);
            }
        },
        methods: {
            onFirstNameChange(value) {
                this.form.first_name = value;
            },
            onLastNameChange(value) {
                this.form.last_name = value;
            },
            onOrganizationNameChange(value) {
                this.form.organization_name = value;
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
            onCommentChange(value)
            {
                this.form.comment = value;
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
            onSubmit()
            {
                let errors = 0;
                let validate_values = ['first_name','last_name','address','city','state','zip_code','comment'];

                this.resetFields();

                validate_values.forEach((val)=>{
                    this.errors[val] = (!this.form[val].length);
                    if(this.errors[val]) errors++;
                });

                if(errors > 0)
                    return;

                this.isSubmitting = true;

                axios.post('/api/consultation', this.form).then(json=>{
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
            }
        },
        mounted()
        {

        }
    }
</script>
