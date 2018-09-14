export const parseLegislativeMatrixFields = (matrix) => {
    return {
        id:matrix.id,
        because_constitutional_amendment:matrix.b_c_a || false,
        because_statute:matrix.b_s  || false,
        because_case_law:matrix.b_c_l  || false,
        because_executive_order:matrix.b_e_o  || false,
        source_of_law:matrix.s_o_l  || false,
        citation_source:matrix.c_s  || '',
        state_abbr:matrix.s_a  || '',
        state:matrix.s  || '',
    }
};

export const parseModelLegislationFields = (model_legislation) => {
    return {
        id:model_legislation.id,
        title:model_legislation.t,
        short_project_blurb:model_legislation.s_p_b || '',
        summary_text:model_legislation.s_t || '',
        text_body:model_legislation.t_b || '',
        preamble:model_legislation.pre || '',
    }
};

export const parseProjectFields = (project) => {

    project.model_legislation = project.model_legislation || [];
    project.matrix = project.matrix || [];

    return {
        id:project.id,
        resource:project.r || {},
        title:project.t,
        short_directory_blurb:project.s_d_b || '',
        short_summary:project.s_s || '',
        long_description:project.l_d || '',
        current_status_description:project.c_s_d || '',
        is_featured:project.is_f || false,
        img_card:project.img_c || '',
        img_banner:project.img_bn || '',
        category:project.category || {},
        matrix:project.matrix.map(parseLegislativeMatrixFields),
        model_legislation:project.model_legislation.map(parseModelLegislationFields),
    }
};

