import filter from 'lodash/filter';

export default {
    getProjects(state)
    {
        return state.projects;
    },

    getProject(state)
    {
        let {project} = state;
        if(!project) return {
            resource:{},
            matrix:[],
            category:{}
        };

        return {
            resource:project.r || {},
            title:project.t,
            model_legislative_summary_text:project.m_l_s_t,
            model_legislative_text_body:project.m_l_t_b,
            is_featured:project.is_f,
            img_card:project.img_c,
            img_banner:project.img_bn,
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