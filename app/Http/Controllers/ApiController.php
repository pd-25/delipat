<?php

namespace App\Http\Controllers;

use App\Models\ServiceContent;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getServices($slug = null, ServiceContent $serviceContent, Services $services)
    {
        if ($slug != null) {
           $data =  $serviceContent->getServiceContentBySlug($slug);
           if($data != null) {
            return response()->json([
                'data' => $data
               ], 200);
           }
           return response()->json([
            'data' => 'No Content FOund'
           ], 404);
           
        }
        $data = $services->getAllServicesApi();
        return response()->json([
            'data' => $data
        ],200);
    }

    public function siteInfo() {
        $data = DB::table('site_infos')->where('slug', 'delipat-site')->first();
        if($data){
            return response()->json([
                'siteInfo' => $data
            ],200);
        }else{
            return response()->json([
                'siteInfo' => null
            ],404);
        }
    }
}
