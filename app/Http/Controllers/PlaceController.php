<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlaceResource;
use App\Models\City;
use App\Models\Guide;
use App\Models\Place;
use App\Models\PlaceGuide;
use App\Models\PlaceImage;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{
    
    public $upload_location = 'assets/img/place/';

    public function indexCityGuide(Request $request){
        $city = City::where('slug', $request->city_slug)->first();
        $guide = Guide::where('slug', $request->guide_slug)->first();
        $placeIds = PlaceGuide::where('guide_id', $guide->id)->pluck('place_id');
        if(!empty($request->search)) {
            $data = Place::with(['province', 'city', 'place_images', 'rating'])
                    ->where('city_id', $city->id)
                    ->WhereIn('id', $placeIds)
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(12);
            return PlaceResource::collection($data);
        }
        $data = Place::with(['province', 'city', 'place_images', 'rating'])
                ->where('city_id', $city->id)
                ->WhereIn('id', $placeIds)
                ->paginate(12);
        return PlaceResource::collection($data);
    }

    
    public function indexProvinceGuide(Request $request){
        $province = Province::where('slug', $request->province_slug)->first();
        $guide = Guide::where('slug', $request->guide_slug)->first();
        $placeIds = PlaceGuide::where('guide_id', $guide->id)->pluck('place_id');
        if(!empty($request->search)) {
            $data = Place::with(['province', 'city', 'place_images', 'rating'])
                    ->where('province_id', $province->id)
                    ->WhereIn('id', $placeIds)
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(12);
            return PlaceResource::collection($data);
        }
        $data = Place::with(['province', 'city', 'place_images', 'rating'])
                ->where('province_id', $province->id)
                ->WhereIn('id', $placeIds)
                ->paginate(12);
        return PlaceResource::collection($data);
    }

    public function indexOne(){
        $data = Place::with(['place_images', 'city', 'rating'])
                ->orderBy('priority', 'asc')
                ->paginate(8);
        return PlaceResource::collection($data);
    }


    public function index(Request $request){
        if(!empty($request->search)){
            $data = Place::with(['place_images', 'province', 'city', 'reviews', 'rating', 'user'])
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(12);
            return PlaceResource::collection($data);
        }
        $data = Place::with(['place_images', 'province', 'city', 'reviews', 'rating', 'user'])
                ->orderBy('updated_at', 'desc')
                ->paginate(12);
        return PlaceResource::collection($data);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new Place();
        $data->priority = $request->priority;
        $data->user_id = $user_id;
        $data->province_id = $request->province_id;
        $data->city_id = $request->city_id;
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->description = $request->description;
        $data->email = $request->email;
        $data->website = $request->website;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        /*  */
        if(!empty($request->file('place_images'))){
            $place_images = $request->file('place_images');
            for($i = 0; $i < count($place_images); $i++){
                $item = new PlaceImage();
                $item->place_id = $data->id;
                $item->user_id = $user_id;
                if( isset($place_images[$i]) ) {
                    $image = $place_images[$i];
                    $image_extension = strtolower($image->getClientOriginalExtension());
                    $image_name = 'place_' . date('Ymd') . rand(0, 10000) . '.' . $image_extension;
                    $image->move($this->upload_location, $image_name);
                    $item->image = $this->upload_location . $image_name;                        
                }
                $item->save();
            }
        }  
        return response()->json([
            'status' => 1,
            'message' => 'Saved successfully.',
            'data' => new PlaceResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = Place::find($id);
        $data->priority = $request->priority;
        $data->user_id = $user_id;
        $data->province_id = $request->province_id;
        $data->city_id = $request->city_id;
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->description = $request->description;
        $data->email = $request->email;
        $data->website = $request->website;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->updated_at = now();
        $data->save();
        /*  */
        if(!empty($request->file('place_images'))){
            $place_images = $request->file('place_images');
            for($i = 0; $i < count($place_images); $i++){
                $item = new PlaceImage();
                $item->place_id = $data->id;
                $item->user_id = $user_id;
                if( isset($place_images[$i]) ) {
                    $image = $place_images[$i];
                    $image_extension = strtolower($image->getClientOriginalExtension());
                    $image_name = 'place_' . date('Ymd') . rand(0, 10000) . '.' . $image_extension;
                    $image->move($this->upload_location, $image_name);
                    $item->image = $this->upload_location . $image_name;                        
                }
                $item->save();
            }
        }
        return response()->json([
            'status' => 1,
            'message' => 'Saved successfully.',
            'data' => new PlaceResource($data),
        ]);
    }

    public function view($id){
        $data = Place::with(['user', 'categories', 'guides', 'province', 'city', 'place_images', 'rating'])->find($id);
        return new PlaceResource($data);
    }

    public function delete($id){
        $data = Place::find($id);
        $image = PlaceImage::where('place_id', $data->id)->get();
        if(isset($image)){
            for($i = 0; count($image) > $i; $i++){
                if(file_exists( public_path($image[$i]->image) )){
                    unlink($image[$i]->image);
                }
            }
        }
        PlaceImage::where('place_id', $data->id)->delete();
        $data->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Deleted successfully.',
        ]);
    }

}
