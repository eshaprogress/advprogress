import filter from 'lodash/filter';

export default {
    getProjects(state)
    {
        return state.projects;
    },

    isProjectLoading(state)
    {
        return state.isProjectsLoading;
    },

    getCategories(state)
    {
        return state.categories;
    },

    isCategoriesLoading(state)
    {
        return state.isCategoriesLoading;
    }
}