<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use illuminate\Support\Str;

class ServiceContent extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'service_id', 'description', 'image', 'slug', 'type'];


    public function serviceName()
    {
        return $this->belongsTo(Services::class, 'service_id', 'id');
    }

    public function getServiceContentBySlug($slug)
    {
        $service_id = Services::where('service_slug', $slug)->first();
        if($service_id){
            $data['topContent'] = $this->where('service_id', $service_id->id)->where('type', 'topContent')->first();
            $data['middleCardContent'] = $this->where('service_id', $service_id->id)->where('type', 'middleCardContent')->get();
            $data['middleContentHeader'] = $this->where('service_id', $service_id->id)->where('type', 'middleContentHeader')->first();
            $data['afterMiddleContentt'] = $this->where('service_id', $service_id->id)->where('type', 'afterMiddleContentt')->get();
            $data['faqContent'] = $this->where('service_id', $service_id->id)->where('type', 'faqContent')->get();
            $data['service_id'] = $service_id->id;
            return $data;
        }else {
            return null;
        }

        
    }

    public function createContent($data)
    {
        try {

            $topImage = '';
            if (isset($data['topContent']['image']) && !empty($data['topContent']['image'])) {
                $db_image = time() . rand(0000, 9999) . '.' . $data['topContent']['image']->getClientOriginalExtension();
                $data['topContent']['image']->storeAs("public/Content", $db_image);
                $topImage = $db_image;
            }
            $topContent =  $this->create([
                'service_id' => $data['service_id'],
                'title' => $data['topContent']['title'],
                'description' => $data['topContent']['description'],
                'image' => $topImage,
                'type' => 'topContent'
            ]);

            foreach ($data['middleContent'] as $middle_Content) {
                $middleCardConImage = '';
                if (isset($middle_Content['image']) && !empty($middle_Content['image'])) {
                    $db_image = time() . rand(0000, 9999) . '.' . $middle_Content['image']->getClientOriginalExtension();
                    $middle_Content['image']->storeAs("public/Content", $db_image);
                    $middleConImage = $db_image;
                }
                $middleContent = $this->create([
                    'service_id' => $data['service_id'],
                    'title' => $middle_Content['title'],
                    'description' => $middle_Content['description'],
                    'image' => $middleConImage,
                    'type' => 'middleCardContent'
                ]);
            }


            $middleHeader = $this->create([
                'title' => $data['middle_header']['afterMiddleContent_title'],
                'description' => $data['middle_header']['afterMiddleContent_desc'],
                'service_id' => $data['service_id'],
                'type' => 'middleContentHeader'
            ]);

            foreach ($data['afterMiddleContentt'] as $afterMiddleContentt) {

                $afterMiddle = $this->create([
                    'service_id' => $data['service_id'],
                    'title' => $afterMiddleContentt['title'],
                    'description' => $afterMiddleContentt['description'],
                    'type' => 'afterMiddleContentt'
                ]);
            }

            foreach ($data['faqContent'] as $faqContent) {

                $faq =  $this->create([
                    'service_id' => $data['service_id'],
                    'title' => $faqContent['title'],
                    'description' => $faqContent['description'],
                    'type' => 'faqContent'
                ]);
            }
            Services::where('id', $data['service_id'])->update(['taken' => 1]);
            return back()->with('msg', 'Content Created');
        } catch (\Exception $th) {

            return back()->with('msg', $th->getMessage());
        }
    }

    public function updateContent(array $data, $content_id)
    {
        $getContent = $this->where('id', $content_id)->firstOrFail();
        // $data['image'] = $getContent->image ?? '';
        if (isset($data['image']) && !empty($data['image'])) {
            File::delete(public_path("storage/Content/" . $getContent->image));
            $db_image = time() . rand(0000, 9999) . '.' . $data['image']->getClientOriginalExtension();
            $data['image']->storeAs("public/Content", $db_image);
            $data['image'] = $db_image;
        }
        // elseif(!empty($getContent->image)) {
        //     $data
        // }
        
        return $this->where('id', $content_id)->update($data);
    }
}
