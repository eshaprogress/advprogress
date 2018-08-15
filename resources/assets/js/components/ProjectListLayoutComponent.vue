<style lang="scss" scoped>
    .projects-section {
        padding: 20px;
    }
    .container {
        margin:auto;
        max-width: none;
    }
    h2 {
        color:var(--blue);
        font-size: 32px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        text-align: center;
        margin: 0;
        padding: 32px 0;
    }

</style>

<template>
    <section class="section projects-section">
        <div class="container">
            <h2>PROJECTS</h2>
            <project-category-list-component />
            <router-view name="standard" />
        </div>
    </section>
</template>

<script>
    import ProjectCategoryListComponent from './ProjectCategoryListComponent';
    export default {
        name:'ProjectListLayoutComponent',
        data()
        {
            return {
                categories:[],
                isCategoriesLoading:false,
                projects:[],
                isProjectsLoading:false
            }
        },
        components:{
            ProjectCategoryListComponent
        }
    }
</script>
