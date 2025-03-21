<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlaceCategoryResource;
use App\Models\PlaceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceCategoryController extends Controller
{
    
    public function store(Request $request){
        $category = PlaceCategory::where('place_id', $request->place_id)
                            ->where('category_id', $request->category_id)
                            ->first();
        if(isset($category)){
            return response()->json([
                'status' => 0,
                'message' => 'Category has been added already, please add a different one.'
            ]);
        }
        $user_id = Auth::user()->id;
        $data = new PlaceCategory();
        $data->user_id = $user_id;
        $data->category_id = $request->category_id;
        $data->place_id = $request->place_id;
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Saved successfully.',
            'data' => new PlaceCategoryResource($data),
        ]);

    }

    public function categoriesByPlaceId($id){
        $data = PlaceCategory::with(['place', 'category'])->where('place_id', $id)->get();
        return PlaceCategoryResource::collection($data);
    }


    public function delete($id){
        $data = PlaceCategory::find($id);
        $data->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Deleted Successfully.',
        ]);
    }
}
