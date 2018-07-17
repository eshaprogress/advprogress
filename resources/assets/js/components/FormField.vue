<style lang="scss" scoped>
    .field {
        &.error {
            label {
                color:var(--red);
            }
            input[type=text] {
                color:var(--red);
                border: solid 2px var(--red);
            }
        }

        &.disabled {
            opacity: .5;
        }

        label {
            color: var(--black);
            font-size: 18px;
            font-weight: normal;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
            display: block;
            width: var(--column-width);
            height:34px;
            line-height: 34px;
        }
        input {
            background-color: var(--white1);
            color: var(--black);
            font-size: 20px;
            font-weight: 500;
            display: block;
            border: none;
            width: var(--column-width);
            height: 40px;
            line-height: 40px;
            text-indent: 10px;
        }

        label, input {
            .disabled {
                background-color: var(--gray);
                color:var(--gray);
            }
        }

        textarea {
            background-color: var(--white1);
            color: var(--black);
            font-size: 20px;
            font-weight: 500;
            display: block;
            border: none;
            width: var(--column-width);
            max-width: var(--column-width);
            min-width: var(--column-width);
            min-height: var(--min-height);
            line-height: 40px;
            text-indent: 10px;
        }
    }
</style>

<template>
    <div class="field" v-bind:class="setClassNames">
        <label :for="id" :class="{disabled:isDisabled}">{{labelText}}</label>
        <template v-if="isTextArea">
            <textarea v-model="value"
                      :placeholder="placeholderText"
                      :required="isRequired"
                      :name="fieldName"
                      :type="fieldType"
                      :id="id"
                      :autocomplete="autoComplete"
                      :style="styleVars"
                      @keyup="updateText"></textarea>
        </template>
        <template v-else>
            <input v-model="value"
                   :class="{disabled:isDisabled}"
                   :disabled="isDisabled"
                   :placeholder="placeholderText"
                   :required="isRequired"
                   :name="fieldName"
                   :type="fieldType"
                   :id="id"
                   :autocomplete="autoComplete"
                   @keyup="updateText" />
        </template>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                value:this.modelValue
            }
        },
        props:{
            id:{
                type:String,
                required:true
            },
            fieldName:{
                type:String,
                default:''
            },
            labelText:{
                type:String,
                default:'',
            },
            isRequired:{
                type:Boolean,
                required:true
            },
            modelValue:{
                required:true
            },
            className:{
                type: String,
                default:''
            },
            isErrored:{
                type:Boolean,
                default:false
            },
            placeholderText:{
                type:String,
                default:''
            },
            fieldType:{
                type:String,
                default:'text'
            },
            autoComplete:{
                type:String,
                default:''
            },
            isTextArea:{
                type:Boolean,
                default:false
            },
            styleVars:{
                type:String,
                default:''
            },
            isDisabled:{
                type:Boolean,
                default:false
            }
        },
        computed:{
            setClassNames()
            {
                let tmp = {};
                if(this.className.length > 0)
                    tmp[this.className] = true;

                if(this.isDisabled)
                    tmp['disabled'] = true;

                if(this.isErrored)
                    tmp['error'] = true;

                return tmp;
            }
        },
        methods:{
            updateText()
            {
                this.$emit('onUpdate', this.value);
            }
        }
    }
</script>