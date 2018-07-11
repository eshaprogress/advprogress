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

        label {
            color: var(--black);
            font-size: 18px;
            font-weight: 600;
            font-style: normal;
            font-stretch: normal;
            letter-spacing: normal;
            display: block;
            width: var(--column-width);
            height:34px;
            line-height: 34px;
        }
        input[type=text] {
            background-color: var(--white1);
            color:var(--black);
            font-size: 20px;
            font-weight: 500;
            display: block;
            border:none;
            width: var(--column-width);
            height: 40px;
            line-height: 40px;
            text-indent: 10px;
        }
    }
</style>

<template>
    <div class="field" v-bind:class="setClassNames">
        <label v-bind:for="id">{{labelText}}</label>
        <input
            v-model="value"
            :placeholder="placeholderText"
            :required="isRequired"
            :name="fieldName"
            v-bind:id="id"
            type="text"
            @keyup="updateText" />
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
            }
        },
        computed:{
            setClassNames()
            {
                let tmp = {};
                if(this.className.length > 0)
                    tmp[this.className] = true;

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