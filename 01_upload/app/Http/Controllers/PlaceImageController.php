<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\PlaceImage;
use Illuminate\Http\Request;

class PlaceImageController extends Controller
{
    
    public function delete($id){
        $data = PlaceImage::find($id);
        if(file_exists( public_path($data->image) )){
            unlink($data->image);
        }
        $data->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Previous image Deleted successfully.',
        ]);
    }

}
