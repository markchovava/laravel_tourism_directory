<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    
    public $upload_location = 'assets/img/event/';

    public function indexByNumber(Request $request){
        $number = (int)$request->number;
        $data = Event::orderBy('priority', 'asc')->paginate($number);
        return EventResource::collection($data);
    }

    public function indexByUser(Request $request) {
        $user_id = Auth::user()->id;
        if(!empty($request->search)){
            $data = Event::with(['user'])
                    ->where('user_id', $user_id)
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(12);
            return EventResource::collection($data);
        }
        $data = Event::with(['user'])
                ->where('user_id', $user_id)
                ->orderBy('updated_at', 'desc')
                ->orderBy('name', 'asc')
                ->paginate(12);
        return EventResource::collection($data);
    }

    public function index(Request $request) {
        if(!empty($request->search)){
            $data = Event::with(['user', 'city'])
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(12);
            return EventResource::collection($data);
        }
        $data = Event::with(['user', 'city'])
                ->orderBy('updated_at', 'desc')
                ->orderBy('name', 'asc')
                ->paginate(12);
        return EventResource::collection($data);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new Event();
        $data->user_id = $user_id;
        $data->city_id = $request->city_id;
        $data->name = $request->name;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->email = $request->email;
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
            'data' => new EventResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = Event::find($id);
        $data->user_id = $user_id;
        $data->city_id = $request->city_id;
        $data->name = $request->name;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->email = $request->email;
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
            'data' => new EventResource($data),
        ]);
    }

    public function view($id){
        $data = Event::with(['user', 'city'])->find($id);
        return new EventResource($data);
    }

    public function delete($id){
        $data = Event::find($id);
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
