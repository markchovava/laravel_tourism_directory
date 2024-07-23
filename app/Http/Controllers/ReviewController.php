<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ReviewController extends Controller
{
    
    public function indexByPlaceId($id){
        $data = Review::with(['place'])
                ->where('place_id', $id)
                ->orderBy('updated_at', 'desc')
                ->paginate(6);
        return ReviewResource::collection($data);
    }

    public function index(Request $request){
        if(!empty($request->search)){
            $data = Review::with(['place', 'user'])
                    ->where('email', $request->search)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(8);
            return ReviewResource::collection($data);
        }
        $data = Review::with(['place', 'user'])
                ->orderBy('updated_at', 'desc')
                ->paginate(8);
        return ReviewResource::collection($data);

    }

    public function store(Request $request){
        $data = new Review();
        $data->email = $request->email;
        $data->message = $request->message;
        $data->rating = $request->rating;
        $data->place_id = $request->place_id;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Saved successfully.',
            'data' => new ReviewResource($data),
        ]);

    }
    
    public function update(Request $request, $id){
        $data = Review::find($id);
        $data->email = $request->email;
        $data->message = $request->message;
        $data->rating = $request->rating;
        $data->place_id = $request->place_id;
        $data->updated_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Saved successfully.',
            'data' => new ReviewResource($data),
        ]);

    }

    public function view($id){
        $data = Review::with(['place'])->first();
        return new ReviewResource($data);
    }

    public function delete($id){
        Review::find($id)->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Deleted successfully.'
        ]);
    }
}
