<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\PlaceResource;
use App\Models\Category;
use App\Models\Place;
use App\Models\PlaceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class CategoryController extends Controller
{

    public $upload_location = 'assets/img/category/';
    
    public function indexOne(){
        $data = Category::orderBy('priority', 'asc')
                ->paginate(8);
        return CategoryResource::collection($data);
    }

    public function categoryBySlug(Request $request){
        $data = Category::where('slug', $request->slug)->first();
        return new CategoryResource($data);
    }
    public function categoryPlaces(Request $request){
        $category = Category::where('slug', $request->slug)->first();
        $placeIds = PlaceCategory::where('category_id', $category->id)->pluck('place_id');
        $data = Place::with(['place_images', 'city'])->whereIn('id', $placeIds)->orderBy('priority', 'asc')->paginate(8);
        return PlaceResource::collection($data);
    }

    public function categoryPlacesSearchByNameCitySlug(Request $request){
        $category = Category::where('slug', $request->slug)->first(); // Category Slug
        $placeIds = PlaceCategory::where('category_id', $category->id)->pluck('place_id');
        if(!isset($request->city_id)){
            $data = Place::with(['place_images', 'city'])
                //->where('city_id', $request->city_id) // City Id
                ->whereIn('id', $placeIds)
                ->where('name', 'LIKE', '%' . $request->name . '%') // Place Nmae
                ->orderBy('name', 'asc')->paginate(12);
            return PlaceResource::collection($data);
        }
        if(!isset($request->name)){
            $data = Place::with(['place_images', 'city'])
                ->where('city_id', $request->city_id) // City Id
                ->whereIn('id', $placeIds)
                //->where('name', 'LIKE', '%' . $request->name . '%') // Place Nmae
                ->orderBy('name', 'asc')->paginate(12);
            return PlaceResource::collection($data);
        }
        if(isset($request->name) && isset($request->city_id)){
            $data = Place::with(['place_images', 'city'])
                    ->where('city_id', $request->city_id) // City Id
                    ->whereIn('id', $placeIds)
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

    public function indexAll(){
        $data = Category::orderBy('name', 'asc')->get();
        return CategoryResource::collection($data);
    }

    public function index(Request $request){
        if(!empty($request->search)){
            $data = Category::with(['user'])
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(12);
            return CategoryResource::collection($data);
        }
        $data = Category::with(['user'])
                ->orderBy('updated_at', 'desc')
                ->paginate(12);
        return CategoryResource::collection($data);
    }
    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new Category();
        $data->priority = $request->priority;
        $data->user_id = $user_id;
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->description = $request->description;
        if( $request->hasFile('image') ) {
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'category_' . date('Ymd') . rand(0, 1000) . '.' . $image_extension;
            $image->move($this->upload_location, $image_name);
            $data->image = $this->upload_location . $image_name;                        
        }
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        return response()->json([
            'message' => 'Saved successfully.',
            'data' => new CategoryResource($data),
        ]);
    }
    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = Category::find($id);
        $data->priority = $request->priority;
        $data->user_id = $user_id;
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->description = $request->description;
        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'category_' . date('Ymd') . rand(0, 1000) . '.' . $image_extension;
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
            'message' => 'Saved successfully.',
            'data' => new CategoryResource($data),
        ]);
    }
    public function view($id){
        $data = Category::with(['user'])->find($id);
        return new CategoryResource($data);
    }
    public function delete($id){
        $data = Category::find($id);
        $data->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Deleted successfully.',
        ]);
    }

    
    
}
