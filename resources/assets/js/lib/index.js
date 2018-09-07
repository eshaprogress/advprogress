export const parseProjectFields = (project) => {
    return {
        id:project.id,
        resource:project.r || {},
        title:project.t,
        short_directory_blurb:project.s_d_b || '',
        project_short_summary:project.p_s_s || '',
        project_long_description:project.p_l_d || '',
        model_legislative_title:project.m_l_t || '',
        model_legislative_summary_text:project.m_l_s_t || '',
        model_legislative_text_body:project.m_l_t_b || '',
        is_featured:project.is_f || false,
        img_card:project.img_c || '',
        img_banner:project.img_bn || '',
        category:project.category || {},
        matrix:project.matrix || []
    }
};