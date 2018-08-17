<style lang="scss" scoped>
    .categories {
        --project-height:52px;
        min-height: var(--project-height);
        background-color: var(--blue);
        padding:9px;
        ul {
            margin: 0 auto;
            padding: 0;
            list-style: none;
            display: flex;
            max-width: 800px;
            align-items: center;
            align-content: center;
            height:var(--project-height);
            li{
                margin:0;
                padding:9px 0;
                list-style: none;
                flex:auto;
                display: inline-block;
                text-align: center;
                height:var(--project-height);
                a {
                    border-left: solid 2px var(--white);
                    color:var(--white);
                    height:var(--project-height);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 16px;
                    text-decoration: none;
                    span {}
                    &.router-link-active {
                        color:var(--blue);
                        background-color: white;
                    }
                }
                &:last-child {
                    a {
                        border-right: solid 2px var(--white);
                    }
                }
            }
        }
    }
</style>

<template>
    <nav class="categories">
        <template v-if="isCategoriesLoading">
            <ul><!-- empty --></ul>
        </template>
        <template v-else>
            <ul>
                <template v-for="cat in getCategories">
                    <li><router-link :to="makeCategoryRoute(cat)"><span>{{cat.category}}</span></router-link></li>
                </template>
            </ul>
        </template>
    </nav>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    export default {
        name:'ProjectCategoryListComponent',
        methods:{
            ...mapActions([
                'fetchCategories'
            ]),
            makeCategoryRoute:(cat) => {
                return {
                    name:'directory-category-id',
                    params:{
                        categoryId:cat.id
                    }
                };
            }
        },
        computed:{
            ...mapGetters([
                'getCategories',
                'isCategoriesLoading',
            ])
        },
        mounted()
        {
            this.fetchCategories();
        }
    }
</script>
