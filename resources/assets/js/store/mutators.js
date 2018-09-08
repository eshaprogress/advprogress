export default {
    categoriesLoading(state, status)
    {
        state.isCategoriesLoading = status;
    },

    projectCategoryLoading(state, status)
    {
        state.isProjectsLoading = status;
    },

    setCategoryId(state, categoryId)
    {
        state.currentCategoryId = categoryId;
    },

    setProjectId(state, projectId)
    {
        state.currentProjectId = projectId;
    },

    projectLoading(state, status)
    {
        state.isProjectLoading = status;
    },

    updateCategories(state, categories)
    {
        state.categories = categories;
    },

    updateProjectCategory(state, projects)
    {
        if(state.projectCategories === null)
            state.projectCategories = {};

        state.projectCategories = {
            ...state.projectCategories,
            [state.currentCategoryId]:projects
        };
    },

    updateProject(state, project)
    {
        if(state.projects === null)
            state.projects = {};

        state.projects = {
            ...state.projects,
            [state.currentProjectId]:project
        };
    },

    setModelLegislation(state, {modelLegislationId})
    {
        state.currentModelLegislationId = modelLegislationId;
    }
}