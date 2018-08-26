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
            <h2>Legislative Body</h2>
            <p>{{getProject.model_legislative_text_body}}</p>
           <!--- add a tag where it searches to see if I have included a custom component, if I have, display it here-->
        </template>
    </article>
</template>

<script>
    import {mapGetters} from 'vuex';
    export default {
        name:'ProjectsCurrentLegislationComponent',
        computed:{
            ...mapGetters([
                'getProject',
                'isProjectLoading',
            ])
        }
    }
</script>
