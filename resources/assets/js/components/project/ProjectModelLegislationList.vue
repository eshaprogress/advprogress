<style lang="scss" scoped>
    ul {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;

        flex-flow: row wrap;

        li {
            list-style: none;
            margin: 10px;
            padding: 10px;
            border: solid 1px rgba(0,0,0,.1);

            a {
                text-decoration: none;
                .title {
                    font-size: 20px;
                    color: var(--black);
                    border-bottom: solid 2px var(--blue);
                    margin-bottom: 10px;
                    padding-bottom: 5px;
                    line-height: 25px;
                }
                .blurb {
                    font-size: 12px;
                    color:var(--black);
                }
            }
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
            <ul>
                <li v-for="model in getProject.model_legislation">
                    <router-link :to="makeModelLink(model)">
                        <div class="title" title="Model Legislation title">{{model.title}}</div>
                        <div class="blurb" title="Model Legislation blurb">{{model.short_project_blurb}}</div>
                    </router-link>
                </li>
            </ul>
        </template>
    </article>
</template>

<script>
    import {mapGetters} from 'vuex';
    export default {
        name:'ProjectModelLegislationList',
        computed:{
            ...mapGetters([
                'getProject',
                'isProjectLoading',
            ])
        },
        methods:{
            makeModelLink(model)
            {
                return {
                    name:'model-legislation',
                    params:{
                        modelLegislationId:model.id
                    }
                }
            }
        }
    }
</script>
