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
            font-size: 22px;
            font-weight: 500;
            display: block;
            width: var(--column-width);
            height:50px;
            line-height: 50px;
        }
        input[type=text] {
            background-color: var(--white1);
            color:var(--black);
            font-size: 22px;
            font-weight: 500;
            display: block;
            border:none;
            width: var(--column-width);
            height: 45px;
            line-height: 45px;
            text-indent: 10px;
        }
    }
</style>

<template>
    <div class="field" v-bind:class="setClassNames">
        <label v-bind:for="id">{{labelText}}</label>
        <input :required="isRequired" v-bind:id="id" type="text" v-model="value" @change="updateText" />
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
            labelText:{
                type:String,
                required:true,
            },
            isRequired:{
                type:Boolean,
                required:true
            },
            modelValue:{
                type:String,
                required:true
            },
            className:{
                type: String,
                default:''
            },
            isErrored:{}
        },
        computed:{
            setClassNames()
            {
                let tmp = {};
                if(this.className.length > 0)
                    tmp[this.className] = true;
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