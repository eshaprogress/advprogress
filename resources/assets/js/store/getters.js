import {parseProjectFields} from '../lib';

export default {

    getProjectCategory(state)
    {
        let {projectCategories, currentCategoryId} = state;
        if(projectCategories === null) return [];

        let data = projectCategories[currentCategoryId] || [];
        return data.map(parseProjectFields);
    },

    getProject: function (state) {
        let {projects, currentProjectId} = state;
        if (
            projects === null ||
            !projects[currentProjectId]
        ) return {
            resource: {},
            matrix: [],
            category: {}
        };

        return parseProjectFields(projects[currentProjectId]);
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