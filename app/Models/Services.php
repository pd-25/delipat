<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = ['service_slug', 'service_name', 'status', 'taken', 'type'];


    public function serviceContents() {
        return $this->hasMany(ServiceContent::class, 'service_id', 'id');
    }
    public function createService($data) {
        try {
            return $this->create($data);
        } catch (\Throwable $th) {
           return back()->with('msg', $th->getMessage());
        }
    }

    public function getAllServices() {
        return $this->where('type', 'service')->get();
    }

    public function getAllSalseforceServices() {
        return $this->where('type', 'salseforce')->get();
    }

    public function getAllServicesApi() {
        return $this->where('status', 1)->get();
    }

    

    public function getServicesByTaken() {
        return $this->where('taken', 0)->where('type', 'service')->get();
    }

    public function getSalseServicesByTaken() {
        return $this->where('taken', 0)->where('type', 'salseforce')->get();
    }
    

    public function getServiceBySlug($slug) {
        return $this->where('service_slug', $slug)->first();
    }

    public function updateService($data, $slug) {
        try {
            if($this->getServiceBySlug($slug)){
                return $this->where('service_slug', $slug)->update($data);
            }else{
                return response()->json([
                    'msg' => 'Not Found'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'msg' => $th->getMessage()
            ]);
        }
       

    }


    public function deleteService($slug){
        $service =  $this->where("service_slug", $slug)->firstOrFail();
        foreach($service->serviceContents as $content) {
            $content->delete();
        }
        return $service->delete();
    }

    public function updateStatus($slug) {
        $service = $this->getServiceBySlug($slug);
        if($service){
            $status = $service->status == 1 ? 0 : 1;
            return $service->update(['status' => $status]);
        }else{
            return 0;
        }
    }

   
}
