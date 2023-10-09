const userApi = '/api/user';

const listApi = '/api/global';

const apiRoutes = {

    // Authentication

    register: userApi + '/auth/register',

    login: userApi + '/auth/login',

    forgot: userApi + '/auth/forgot',

    reset: userApi + '/auth/reset',

    // Profile

    profile_details: userApi + '/profile/details',

    profile_update: userApi + '/profile/update',

    profile_password: userApi + '/profile/password',

    logout: userApi + '/profile/logout',

    // Media

    media: userApi + '/media/upload',

    // category

    globalCategoryList: listApi + '/globalCategory/list',

    // blog

    globalBlogList: listApi + '/globalBlog/list',

}

export default apiRoutes;
