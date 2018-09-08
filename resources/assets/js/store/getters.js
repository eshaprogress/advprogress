import {parseProjectFields, parseModelLegislationFields} from '../lib';

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

    getModelLegislation: function (state) {
        let {projects, currentProjectId, currentModelLegislationId} = state;

        if(!projects) return {};
        if(!currentProjectId) return {};
        if(!currentModelLegislationId) return {};

        let project = projects[currentProjectId];
        if (!project) return {};

        return parseModelLegislationFields(project.model_legislation.find(function(obj) {
            return obj.id === currentModelLegislationId;
        }));
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