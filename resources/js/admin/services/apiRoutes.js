const apiVersion = '/api/admin';

const apiRoutes = {

    // Authentication

    login: apiVersion + '/auth/login',

    forgot: apiVersion + '/auth/forgot',

    reset: apiVersion + '/auth/reset',

    // Profile

    profile_details: apiVersion + '/profile/details',

    profile_update: apiVersion + '/profile/update',

    profile_password: apiVersion + '/profile/password',

    logout: apiVersion + '/profile/logout',

    // settings

    settings_details: apiVersion + '/settings/details',

    settings_update: apiVersion + '/settings/update',

    // company_info

    companyInfo: apiVersion + '/company_info/details',

    companyUpdate: apiVersion + '/company_info/update',

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

    // Media

    mediaUpload: apiVersion + '/media/upload',

    mediaUpdate: apiVersion + '/media/update',

}

export default apiRoutes;
