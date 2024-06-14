<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Http\Resources\PlaceResource;
use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use App\Models\PlaceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    
    public $upload_location = 'assets/img/city/';

    public function cityPlacesSearchByName(Request $request){
        if(!isset($request->city_id)){
            $data = Place::with(['place_images', 'city'])
                ->where('name', 'LIKE', '%' . $request->name . '%') // Place Nmae
                ->orderBy('name', 'asc')->paginate(12);
            return PlaceResource::collection($data);
        }
        if(!isset($request->name)){
            $data = Place::with(['place_images', 'city'])
                ->where('city_id', $request->city_id) // City Id
                ->orderBy('name', 'asc')->paginate(12);
            return PlaceResource::collection($data);
        }
        if(isset($request->name) && isset($request->city_id)){
            $data = Place::with(['place_images', 'city'])
                    ->where('city_id', $request->city_id) // City Id
                    ->where('name', 'LIKE', '%' . $request->name . '%') // Place Nmae
                    ->orderBy('name', 'asc')->paginate(12);
            return PlaceResource::collection($data);
        }
        if(!isset($data)){
            return response()->json([
                'status' => 0,
                'data' => [],
            ]);
        }
    }

    public function cityCategoryPlaces(Request $request){
        $category = Category::where('slug', $request->category_slug)->first();
        $city = City::where('slug', $request->city_slug)->first();
        $placeIds = PlaceCategory::where('category_id', $category->id)->pluck('place_id');
        if(!empty($request->search)){
            $data = Place::with(['place_images', 'city'])
                    ->where('city_id', $city->id)
                    ->whereIn('id', $placeIds)
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('name', 'asc')
                    ->paginate(12);
            return PlaceResource::collection($data);
        }
        $data = Place::with(['place_images', 'city'])
            ->where('city_id', $city->id)
            ->whereIn('id', $placeIds)
            ->orderBy('name', 'asc')
            ->paginate(12);
        return PlaceResource::collection($data);
    }


    public function cityBySlug(Request $request){
        $data = City::where('slug', $request->slug)->first();
        return new CityResource($data);
    }

    public function cityPlaces(Request $request){
        $city = City::where('slug', $request->slug)->first();
        if(!empty($request->search)){
            $data = Place::with(['place_images', 'city'])->where('city_id', $city->id)
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(12);
            return PlaceResource::collection($data);
        }
        $data = Place::with(['place_images', 'city'])->where('city_id', $city->id)->paginate(12);
        return PlaceResource::collection($data);
    }

    public function indexOne(){
        $data = City::with(['user'])
                ->orderBy('priority', 'asc')
                ->paginate(8);
        return CityResource::collection($data);
    }
    public function indexAll(){
        $data = City::orderBy('name', 'asc')->get();
        return CityResource::collection($data);
    }
    public function index(Request $request){
        if(!empty($request->search)){
            $data = City::with(['user', 'province'])
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(12);
            return CityResource::collection($data);
        }
        $data = City::with(['user', 'province'])
                ->orderBy('name', 'asc')
                ->paginate(12);
        return CityResource::collection($data);
    }
    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new City();
        $data->priority = $request->priority;
        $data->user_id = $user_id;
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->province_id = $request->province_id;
        if( $request->hasFile('image') ) {
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'city_' . date('Ymd') . rand(0, 1000) . '.' . $image_extension;
            $image->move($this->upload_location, $image_name);
            $data->image = $this->upload_location . $image_name;                        
        }
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Saved successfully.',
            'data' => new CityResource($data),
        ]);
    }
    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = City::find($id);
        $data->priority = $request->priority;
        $data->user_id = $user_id;
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->province_id = $request->province_id;
        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'city_' . date('Ymd') . rand(0, 1000) . '.' . $image_extension;
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
            'data' => new CityResource($data),
        ]);
    }
    public function view($id){
        $data = City::with(['user', 'province'])->find($id);
        return new CityResource($data);
    }
    public function delete($id){
        $data = City::find($id);
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
