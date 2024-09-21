<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlaceGuideResource;
use App\Http\Resources\PlaceResource;
use App\Models\Guide;
use App\Models\Place;
use App\Models\PlaceGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceGuideController extends Controller
{
    
    public function placesByGuideSlug(Request $request){
        if(!empty($request->search)){
            $guide = Guide::where('slug', $request->slug)->first();
            $place_ids = PlaceGuide::where('guide_id', $guide->id)->pluck('place_id');
            $data = Place::with(['city', 'place_images', 'rating'])
                    ->whereIn('id', $place_ids)
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('priority', 'asc')
                    ->paginate(12);
            return PlaceResource::collection($data);
        }
        $guide = Guide::where('slug', $request->slug)->first();
        $place_ids = PlaceGuide::where('guide_id', $guide->id)->pluck('place_id');
        $data = Place::with(['city', 'place_images', 'rating'])
                ->whereIn('id', $place_ids)
                ->orderBy('priority', 'asc')
                ->paginate(12);
        return PlaceResource::collection($data);
    }

    public function guidesByPlaceId($id){
        $data = PlaceGuide::with(['place', 'guide'])->where('place_id', $id)->get();
        return PlaceGuideResource::collection($data);
    }


    public function store(Request $request){
        $user_id = Auth::user()->id;
        $guide = PlaceGuide::where('place_id', $request->place_id)
                            ->where('guide_id', $request->guide_id)
                            ->first();
        if(isset($guide)){
            return response()->json([
                'status' => 0,
                'message' => 'Guide has been added already, please add a different one.'
            ]);
        }
        $data = new PlaceGuide();
        $data->user_id = $user_id;
        $data->guide_id = $request->guide_id;
        $data->place_id = $request->place_id;
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Saved successfully.',
            'data' => new PlaceGuideResource($data),
        ]);
    }

   

    public function delete($id){
        $data = PlaceGuide::find($id);
        $data->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Deleted Successfully.',
        ]);
    }
}
