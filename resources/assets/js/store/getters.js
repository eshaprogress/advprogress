export default {

    getProjectCategory(state)
    {
        let {projectCategories, currentCategoryId} = state;
        if(projectCategories === null) return [];

        return projectCategories[currentCategoryId] || [];
    },

    getProject(state)
    {
        let {projects, currentProjectId} = state;
        if(
            projects === null ||
            !projects[currentProjectId]
        ) return {
            resource:{},
            matrix:[],
            category:{}
        };

        let project = projects[currentProjectId];
        return {
            resource:project.r || {},
            title:project.t,
            model_legislative_summary_text:project.m_l_s_t || '',
            model_legislative_text_body:project.m_l_t_b || '',
            is_featured:project.is_f || false,
            img_card:project.img_c || '',
            img_banner:project.img_bn || '',
            category:project.category || {},
            matrix:project.matrix || []
        }
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