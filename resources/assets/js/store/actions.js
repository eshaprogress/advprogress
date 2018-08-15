import axios from "axios";

export default {

    fetchCategories:async ({commit, state}) => {
        commit('categoriesLoading', true);
        let fetch = await axios.get('/api/categories');
        let {categories} = fetch.data;
        commit('updateCategories', categories);
        commit('categoriesLoading', false);
    },

    fetchProjects: async ({commit, state}, {categoryId}) => {
        commit('projectsLoading', true);

        categoryId = categoryId || false;
        let fetch = null;
        if(categoryId === false)
        {
            fetch = await axios.get('/api/project/featured');
        }
        else
        {
            fetch = await axios.get(`/api/category/${categoryId}/projects`);
        }
        let {projects} = fetch.data;
        commit('updateProjects', projects);
        commit('projectsLoading', false);
    }
}