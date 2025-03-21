<?php

namespace App\Http\Controllers;

use App\Http\Resources\GuideResource;
use App\Models\Guide;
use App\Models\Place;
use App\Models\PlaceGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuideController extends Controller
{
    
    public $upload_location = 'assets/img/guide/';

    public function indexAll(){
        $data = Guide::orderBy('name', 'asc')->get();
        return GuideResource::collection($data);
    }

    public function viewBySlug(Request $request){
        $data = Guide::where('slug', $request->slug)->first();
        return new GuideResource($data);
    }

    public function indexByUser(Request $request) {
        $user_id = Auth::user()->id;
        if(!empty($request->search)){
            $data = Guide::with(['user'])
                    ->where('user_id', $user_id)
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(12);
            return GuideResource::collection($data);
        }
        $data = Guide::with(['user'])
                ->where('user_id', $user_id)
                ->orderBy('updated_at', 'desc')
                ->orderBy('name', 'asc')
                ->paginate(12);
        return GuideResource::collection($data);
    }

    public function index(Request $request) {
        if(!empty($request->search)){
            $data = Guide::with(['user'])
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(12);
            return GuideResource::collection($data);
        }
        $data = Guide::with(['user'])
                ->orderBy('updated_at', 'desc')
                ->orderBy('name', 'asc')
                ->paginate(12);
        return GuideResource::collection($data);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new Guide();
        $data->user_id = $user_id;
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->priority = $request->priority;
        $data->description = $request->description;
        $data->created_at = now();
        $data->updated_at = now();
        if( $request->hasFile('landscape') ) {
            $image = $request->file('landscape');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'landscape_' . date("Ym") . rand(0, 10000) . '.' . $image_extension;
            $image->move($this->upload_location, $image_name);
            $data->landscape = $this->upload_location . $image_name;                        
        }
        if( $request->hasFile('portrait') ) {
            $image = $request->file('portrait');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'portrait_' . date("Ym") . rand(0, 10000) . '.' . $image_extension;
            $image->move($this->upload_location, $image_name);
            $data->portrait = $this->upload_location . $image_name;                        
        }
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Data saved successfully.',
            'data' => new GuideResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = Guide::find($id);
        $data->user_id = $user_id;
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->priority = $request->priority;
        $data->description = $request->description;
        $data->created_at = now();
        $data->updated_at = now();
        if( $request->hasFile('landscape') ){
            $image = $request->file('landscape');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'landscape_' . date("Ym") . rand(0, 10000) . '.' . $image_extension;
            if(!empty($data->landscape)){
                if(file_exists( public_path($data->landscape) )){
                    unlink($data->landscape);
                }
                $image->move($this->upload_location, $image_name);
                $data->landscape = $this->upload_location . $image_name;                    
            }else{
                $image->move($this->upload_location, $image_name);
                $data->landscape = $this->upload_location . $image_name;
            } 
        }
        if( $request->hasFile('portrait') ){
            $image = $request->file('portrait');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'portrait_' . date("Ym") . rand(0, 10000) . '.' . $image_extension;
            if(!empty($data->portrait)){
                if(file_exists( public_path($data->portrait) )){
                    unlink($data->portrait);
                }
                $image->move($this->upload_location, $image_name);
                $data->portrait = $this->upload_location . $image_name;                    
            }else{
                $image->move($this->upload_location, $image_name);
                $data->portrait = $this->upload_location . $image_name;
            } 
        }
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Data saved successfully.',
            'data' => new GuideResource($data),
        ]);
    }

    public function view($id){
        $data = Guide::with(['user', 'places'])->find($id);
        return new GuideResource($data);
    }

    public function delete($id){
        PlaceGuide::where('guide_id', $id)->delete();
        $data = Guide::find($id);
        if(isset($data->portrait)){
            if(file_exists( public_path($data->portrait) )){
                unlink($data->portrait);
            }
        }
        if(isset($data->landscape)){
            if(file_exists( public_path($data->landscape) )){
                unlink($data->landscape);
            }
        }
        $data->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Data deleted successfully.',
        ]);
    }
}
