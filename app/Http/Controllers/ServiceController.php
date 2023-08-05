<?php

namespace App\Http\Controllers;

use App\Models\ServiceContent;
use App\Models\Services;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   
    public function index(Services $services)
    {
        $data['services'] = $services->getAllServices();
        return view('admin.service.index', $data);
    }

   
    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $req, Services $services)
    {
        $req->validate([
            'service_name' => 'required|string|max:250',
            'service_slug' => 'required|string|unique:services|max:100',
        ]);
        $data = $req->only('service_name', 'service_slug', 'type');
        $store = $services->createService($data);
        if($store['type'] == 'salseforce'){
            return redirect()->route('salseforces.index')->with('msg', 'Salseforce Service Created Successfully.');
        }else{
            return redirect()->route('services.index')->with('msg', 'Service Created Successfully.');
        }
    }

    
    public function serviceContent(string $service_slug, ServiceContent $serviceContent)
    {
       
        $data['services_content'] = $serviceContent->getServiceContentBySlug($service_slug);
        if($data['services_content'] != null) {
            return view('admin.service.serviceContent', $data);
        }
        return view('Notfound');

      
    }

   
    public function edit(string $slug, Services $services)
    {
        $data['service'] = $services->getServiceBySlug($slug);
        return view('admin.service.edit', $data);
    }

   
    public function update(Request $req, string $slug, Services $services)
    {
        $req->validate([
            'service_name' => 'required|string|max:250',
        ]);
        $data = $req->only('service_name');

        if ($services->updateService($data, $slug)) {
            if($req->type == 'salseforce'){
            return redirect()->route('salseforces.index')->with('msg', 'Salseforce Service Updated Successfully.');
            }
            return redirect()->route('services.index')->with('msg', 'Service Updated Successfully.');
        } else {
            return back()->with('msg', 'Please make Some changes or go back');
        }
    }

    
    public function destroy(string $slug, Services $services)
    {
        if ($services->deleteService($slug)) {
            return back()->with("msg", "Service has been deleted successfully");
        } else {
            return back()->with("msg", "Some errror occur!");
        }
    }

    public function changeStatus(Request $req, Services $services) {
        if($services->updateStatus($req->service_slug)) {
            return response()->json([
                'status' => true
            ]);
        }else {
            return response()->json([
                'status' => false
            ]);
        }
    }

    public function addContent(Services $services) {
        $data['services'] =  $services->getServicesByTaken();
        return view('admin.service.createContent', $data);
    }

    public function createContent(Request $req,  ServiceContent $serviceContent) {
        $req->validate([
            'service_id' => 'required|integer',
        ]);
        
        $data = $req->only('topContent', 'middleContent', 'afterMiddleContentt', 'faqContent');
        $data['service_id']= $req->service_id;
        $data['middle_header'] = $req->only('afterMiddleContent_title', 'afterMiddleContent_desc');

        if(!isset($data['topContent']) && !empty($data['topContent'])){
            return back()->with('msgTop', 'This Section is required');
        }

        if(!isset($data['middleContent']) && !empty($data['middleContent'])){
            return back()->with('msgMiddle', 'This Section is required');
        }

        if(!isset($data['afterMiddleContentt']) && !empty($data['afterMiddleContentt'])){
            return back()->with('msgTt', 'This Section is required');
        }

        if(!isset($data['faqContent']) && !empty($data['faqContent'])){
            return back()->with('msgFaq', 'This Section is required');
        }

        return $serviceContent->createContent($data);
    }

    public function editContent(Request $req, $content_id, ServiceContent $serviceContent) {
        $req->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'in:msgTop,msgMiddle,msgAfMiddleH,msgTt,msgFaq'
        ]);
        
        $data = $req->only('title', 'description', 'image');
        if($serviceContent->updateContent($data, $content_id)){
            return back()->with($req->type, 'This Section Updated Successfully');
        }else{
            return back()->with($req->type, 'Some error occur');
        }
    }


    
}
