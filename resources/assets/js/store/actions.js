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

    fetchProjects: async ({commit, state}, {categoryId}) => {
        categoryId = categoryId || '--featured--';

        if(state.projects !== null && state.projects[categoryId] !== undefined)
        {
            commit('setCategoryId', categoryId);
            return;
        }

        commit('projectsLoading', true);

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
        commit('updateProjects', projects);
        commit('projectsLoading', false);
    },

    fetchProject: async ({commit, state}, {projectId}) => {
        commit('projectLoading', true);

        projectId = projectId || false;
        let fetch = null;
        if(projectId === false)
        {
            throw new Error("Failed to obtain a projectId");
        }
        else
        {
            fetch = await axios.get(`/api/project/${projectId}`);
        }
        let {project} = fetch.data;
        commit('updateProject', project);
        commit('projectLoading', false);
    }
}