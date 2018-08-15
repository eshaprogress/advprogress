import each from 'lodash/each'
import Vue from 'vue';

export default {
    updateCategories(state, categories)
    {
        state.categories = categories;
    },

    categoriesLoading(state, status)
    {
        state.isCategoriesLoading = status;
    },

    projectsLoading(state, status)
    {
        state.isProjectsLoading = status;
    },

    updateProjects(state, projects)
    {
        state.projects = projects;
    },
}