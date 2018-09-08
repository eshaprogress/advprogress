<style lang="scss" scoped>
    article {
        padding:0;
        max-width: 1150px;
        margin: 10px auto;

        h2 {
            font-size: 30px;
            line-height: 30px;
            text-align: center;
            margin: 0;
            border-bottom: solid 2px var(--green);
            padding: 20px 0 20px;
            color: var(--blue);
        }

        h3 {
            font-size: 25px;
            line-height: 30px;
            text-align: center;
            margin: 0;
            border-bottom: solid 2px var(--green);
            padding: 20px 0 20px;
            color: var(--blue);
        }
    }

</style>

<template>
    <article class="card">
        <template v-if="isProjectLoading">
            <loader>
                Loading ....
            </loader>
        </template>
        <template v-else>
            <h2 title="title">{{getModelLegislation.title}}</h2>
            <h3>Preamble</h3>
            <div title="preamble" v-html="getModelLegislation.preamble"></div>
            <h3>Summary</h3>
            <div title="Summary" v-html="getModelLegislation.summary_text"></div>
            <h3>Body</h3>
            <div title="Body" v-html="getModelLegislation.text_body"></div>
        </template>
    </article>
</template>

<script>
    import {mapGetters, mapMutations} from 'vuex';
    export default {
        name:'ProjectsModelLegislationSection',
        computed:{
            ...mapGetters([
                'getProject',
                'getModelLegislation',
                'isProjectLoading',
            ])
        },
        methods:{
            ...mapMutations([
                'setModelLegislation'
            ])
        },
        mounted()
        {
            console.log(this.$route);
            let{modelLegislationId} = this.$route.params;
            this.setModelLegislation({
                modelLegislationId
            });
        }
    }
</script>
