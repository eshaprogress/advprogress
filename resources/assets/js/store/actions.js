import axios from "axios";

export default {

    fetchCategories:async ({commit, state}) => {
        if(state.categories.length)
            return;

        commit('categoriesLoading', true);
        let fetch = await axios.get('/api/categories');
        let {categories} = fetch.data;
        commit('updateCategories', categories);
        commit('categoriesLoading', false);
    },

    fetchProjectCategory: async ({commit, state}, {categoryId}) => {
        categoryId = categoryId || '--featured--';

        if(
            state.projectCategories !== null &&
            state.projectCategories[categoryId] !== undefined
        ) {
            commit('setCategoryId', categoryId);
            return;
        }

        commit('projectCategoryLoading', true);

        let fetch = null;
        if(categoryId === '--featured--')
        {
            fetch = await axios.get('/api/project/featured');
        }
        else
        {
            fetch = await axios.get(`/api/category/${categoryId}/projects`);
        }
        commit('setCategoryId', categoryId);
        let {projects} = fetch.data;
        commit('updateProjectCategory', projects);
        commit('projectCategoryLoading', false);
    },

    fetchProject: async ({commit, state}, {projectId}) => {
        projectId = projectId || false;
        if(projectId === false)
        {
            throw new Error("Failed to obtain a projectId");
        }

        if(state.projects !== null && state.projects[projectId] !== undefined)
        {
            commit('setProjectId', projectId);
            return;
        }

        commit('projectLoading', true);

        let fetch = await axios.get(`/api/project/${projectId}`);
        let {project} = fetch.data;
        commit('setProjectId', projectId);
        commit('updateProject', project);
        commit('projectLoading', false);
    }
}