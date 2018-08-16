import filter from 'lodash/filter';

export default {
    getProjects(state)
    {
        return state.projects;
    },

    getProject(state)
    {
        return state.project || false;
    },

    isProjectsLoading(state)
    {
        return state.isProjectsLoading;
    },

    isProjectLoading(state)
    {
        return state.isProjectLoading;
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