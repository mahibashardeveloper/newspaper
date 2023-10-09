<?php

namespace App\Services;

use App\Models\Blogs;
use App\Models\Companies;
use App\Models\Categories;
use Illuminate\Routing\Controller as BaseController;

class FrontService extends BaseController
{

    public static function category_list($request)
    {
        try {
            $limit = $request->limit ?? 10000;
            $results = Categories::orderBy('id', 'asc');
            $paginatedData = $results->paginate($limit);
            return ['status' => 200, 'data' => $paginatedData];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function blog_list($request)
    {
        try {
            $limit = $request->limit ?? 20;
            $results = Blogs::with('category_info')->orderBy('id', 'asc');
            if(isset($request->category_id) && !empty($request->category_id)){
                $results->where('category_id', $request->category_id);
            }
            $paginatedData = $results->paginate($limit);
            return ['status' => 200, 'data' => $paginatedData];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function company_details($request)
    {
        try {
            $user = Companies::orderBy('id','desc')->first();
            return ['status' => 200, 'data' => $user];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

}
