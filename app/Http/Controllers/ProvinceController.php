<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Http\Resources\PlaceResource;
use App\Http\Resources\ProvinceResource;
use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use App\Models\PlaceCategory;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProvinceController extends Controller
{

    public $upload_location = 'assets/img/province/';

    public function indexAll(){
        $data = Province::orderBy('priority', 'asc')->get();
        return ProvinceResource::collection($data);
    }


    public function provinceCategoryPlaces(Request $request){
        $category = Category::where('slug', $request->category_slug)->first();
        $province = Province::where('slug', $request->province_slug)->first();
        $placeIds = PlaceCategory::where('category_id', $category->id)->pluck('place_id');
        if(!empty($request->search)){
            $data = Place::with(['place_images', 'city'])
                    ->where('province_id', $province->id)
                    ->whereIn('id', $placeIds)
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('name', 'asc')
                    ->paginate(12);
            return PlaceResource::collection($data);
        }
        $data = Place::with(['place_images', 'city'])
            ->where('province_id', $province->id)
            ->whereIn('id', $placeIds)
            ->orderBy('name', 'asc')
            ->paginate(12);
        return PlaceResource::collection($data);
    }

    public function provinceBySlug(Request $request){
        $data = Province::where('slug', $request->slug)->first();
        return new ProvinceResource($data);
    }

    public function provinceCities(Request $request){
        $province = Province::where('slug', $request->slug)->first();
        if(!empty($request->search)){
            $data = City::where('province_id', $province->id)
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('name', 'asc')->paginate(12);
            return CityResource::collection($data);
        }
        $data = City::where('province_id', $province->id)->orderBy('name', 'asc')->paginate(12);
        if(!isset($data)){
            return response()->json([
                'status' => 0,
                'data' => [],
            ]);
        }
        return CityResource::collection($data);
    }

    public function index(Request $request){
        if(!empty($request->search)){
            $data = Province::with(['user'])
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(12);
            return ProvinceResource::collection($data);
        }
        $data = Province::with(['user'])
                ->orderBy('name', 'asc')
                ->paginate(12);
        return ProvinceResource::collection($data);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new Province();
        $data->priority = $request->priority;
        $data->user_id = $user_id;
        $data->name = $request->name;
        $data->slug = $request->slug;
        if( $request->hasFile('image') ) {
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'province_' . date('Ymd') . rand(0, 1000) . '.' . $image_extension;
            $image->move($this->upload_location, $image_name);
            $data->image = $this->upload_location . $image_name;                        
        }
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Saved successfully.',
            'data' => new ProvinceResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = Province::find($id);
        $data->priority = $request->priority;
        $data->user_id = $user_id;
        $data->name = $request->name;
        $data->slug = $request->slug;
        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'province_' . date('Ymd') . rand(0, 1000) . '.' . $image_extension;
            if(!empty($data->image)){
                if(file_exists( public_path($data->image) )){
                    unlink($data->image);
                }
                $image->move($this->upload_location, $image_name);
                $data->image = $this->upload_location . $image_name;                    
            }else{
                $image->move($this->upload_location, $image_name);
                $data->image = $this->upload_location . $image_name;
            }              
        }
        $data->updated_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Saved successfully.',
            'data' => new ProvinceResource($data),
        ]);
    }

    public function view($id){
        $data = Province::with(['user'])->find($id);
        return new ProvinceResource($data);
    }

    public function delete($id){
        $data = Province::find($id);
        if(file_exists( public_path($data->image) )){
            unlink($data->image);
        }
        $data->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Deleted successfully.',
        ]);
    }

   
}
