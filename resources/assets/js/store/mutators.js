export default {
    categoriesLoading(state, status)
    {
        state.isCategoriesLoading = status;
    },

    projectsLoading(state, status)
    {
        state.isProjectsLoading = status;
    },

    setCategoryId(state, categoryId)
    {
        state.currentCategoryId = categoryId;
    },

    projectLoading(state, status)
    {
        state.isProjectLoading = status;
    },

    updateCategories(state, categories)
    {
        state.categories = categories;
    },

    updateProjects(state, projects)
    {
        if(state.projects === null)
            state.projects = {};

        state.projects = {
            ...state.projects,
            [state.currentCategoryId]:projects
        };
    },

    updateProject(state, project)
    {
        state.project = project;
    }
}