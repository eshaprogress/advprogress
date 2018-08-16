<style lang="scss" scoped>
    .project {
        margin: auto;
        padding: 30px;
        min-height: 420px;
        max-width: 1150px;

        header {
            margin:0;
            padding:0;
        }

        article {
            margin:0;
            padding:0;
        }
    }

</style>

<template>
    <main class="project">
        <template v-if="isProjectLoading">
            Loading Projects ....
        </template>
        <template v-else>
            <header>
                {{getProject.title}}
            </header>
            <article class="card">

            </article>
        </template>
    </main>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name:'ProjectsByCategoryComponent',
        methods:{
            ...mapActions([
                'fetchProject'
            ]),
            makeProjectLink(project)
            {
                return {
                    name:'project-id',
                    params:{
                        projectId:project.id
                    }
                };
            }
        },
        computed:{
            ...mapGetters([
                'getProject',
                'isProjectLoading',
            ])
        },
        mounted()
        {
            console.log(this.$route);
            this.fetchProject({projectId:this.$route.params.projectId});
        }
    }
</script>
