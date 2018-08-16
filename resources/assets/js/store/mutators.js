export default {
    categoriesLoading(state, status)
    {
        state.isCategoriesLoading = status;
    },

    projectsLoading(state, status)
    {
        state.isProjectsLoading = status;
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
        state.projects = projects;
    },

    updateProject(state, project)
    {
        state.project = project;
    }
}