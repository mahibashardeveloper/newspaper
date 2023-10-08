const apiVersion = '/api/admin';

const apiRoutes = {

    // Authentication

    login: apiVersion + '/auth/login',

    forgot: apiVersion + '/auth/forgot',

    reset: apiVersion + '/auth/reset',

    // slider

    sliderCreate: apiVersion + '/slider/create',

    sliderList: apiVersion + '/slider/list',

    sliderSingle: apiVersion + '/slider/single',

    sliderUpdate: apiVersion + '/slider/update',

    sliderDelete: apiVersion + '/slider/delete',

    // category

    categoryCreate: apiVersion + '/category/create',

    categoryList: apiVersion + '/category/list',

    categorySingle: apiVersion + '/category/single',

    categoryUpdate: apiVersion + '/category/update',

    categoryDelete: apiVersion + '/category/delete',

    // blog

    blogCreate: apiVersion + '/blog/create',

    blogList: apiVersion + '/blog/list',

    blogSingle: apiVersion + '/blog/single',

    blogUpdate: apiVersion + '/blog/update',

    blogDelete: apiVersion + '/blog/delete',

    // customer

    customerCreate: apiVersion + '/customer/create',

    customerList: apiVersion + '/customer/list',

    customerSingle: apiVersion + '/customer/single',

    customerUpdate: apiVersion + '/customer/update',

    customerDelete: apiVersion + '/customer/delete',

    // Profile

    profile_details: apiVersion + '/profile/details',

    profile_update: apiVersion + '/profile/update',

    profile_password: apiVersion + '/profile/password',

    logout: apiVersion + '/profile/logout',

    // Media

    media: apiVersion + '/media/upload',

}

export default apiRoutes;
