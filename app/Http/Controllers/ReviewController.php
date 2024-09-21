<?php

namespace App\Http\Controllers;

use App\Http\Resources\RatingResource;
use App\Http\Resources\ReviewResource;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $rating = Rating::where('place_id', $data->place_id)->first();
        if(!isset($rating)) {
            Log::info('NEW');
            $rating = new Rating();
            $rating->place_id = $request->place_id;
            $rating->quantity = 1;
            $rating->total = $request->rating;
            $rating->rate = $request->rating;
            $rating->updated_at = now();
            $rating->created_at = now();
            $rating->save();
            return response()->json([
                'status' => 1,
                'message' => 'Saved successfully.',
                'data' => new ReviewResource($data),
                'rating' => new RatingResource($data),
            ]);
        }
        $rating->place_id = $request->place_id;
        $rating->quantity += 1;
        $rating->total += $request->rating;
        $quantity = $rating->quantity * 5;
        $calculate = ($rating->total / $quantity) * 5;
        $rounded = round($calculate);
        $rating->rate = $rounded;
        $rating->updated_at = now();
        $rating->save();
        /*
        Log::info('$rounded'); */
        return response()->json([
            'status' => 1,
            'message' => 'Saved successfully.',
            'data' => new ReviewResource($data),
            'rating' => new RatingResource($data),
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
        $data = Review::find($id);
        /*  */
        $rating = Rating::where('place_id', $data->place_id)->first();
        $rating->quantity -= 1;
        $rating->total -= $data->rating;
        $quantity = $rating->quantity * 5;
        $calculate = ($rating->total / $quantity) * 5;
        $rounded = round($calculate);
        $rating->rate = $rounded;
        $rating->updated_at = now();
        $rating->save();
        /*  */
        $data->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Deleted successfully.'
        ]);
    }
}
