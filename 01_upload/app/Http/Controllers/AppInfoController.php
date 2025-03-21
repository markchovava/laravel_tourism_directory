<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppInfoResource;
use App\Models\AppInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppInfoController extends Controller
{

    public $upload_location = 'assets/img/logo/';

    public function view(){
        $data = AppInfo::with(['user'])->first();
        if(!isset($data)){
            return response()->json([
                'status' => 0,
                'data' => [],
                'message' => 'Data not added yet.'
            ]);
        }

        return response()->json([
            'status' => 1,
            'data' => new AppInfoResource($data),
        ]);
    }

    public function update(Request $request){
        $user_id = Auth::user()->id;
        $data = AppInfo::with(['user'])->first();
        if(isset($data)){
            $data->name = $request->name;
            $data->user_id = $user_id;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->website = $request->website;
            $data->address = $request->address;
            $data->whatsapp = $request->whatsapp;
            $data->facebook = $request->facebook;
            $data->instagram = $request->instagram;
            $data->updated_at = now();
            if( $request->hasFile('image') ){
                $image = $request->file('image');
                $image_extension = strtolower($image->getClientOriginalExtension());
                $image_name = 'logo_' . rand(0, 100) . '.' . $image_extension;
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
            $data->save();
        } else {
            $data = new AppInfo();
            $data->name = $request->name;
            $data->user_id = $user_id;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->website = $request->website;
            $data->address = $request->address;
            $data->whatsapp = $request->whatsapp;
            $data->facebook = $request->facebook;
            $data->instagram = $request->instagram;
            $data->created_at = now();
            $data->updated_at = now();
            if( $request->hasFile('image') ) {
                $image = $request->file('image');
                $image_extension = strtolower($image->getClientOriginalExtension());
                $image_name = 'logo_' . rand(0, 100) . '.' . $image_extension;
                $image->move($this->upload_location, $image_name);
                $data->image = $this->upload_location . $image_name;                        
            }
            $data->save();
        }

        return response()->json([
            'status' => 1,
            'message' => 'Saved successfully.',
        ]);
    }
}
