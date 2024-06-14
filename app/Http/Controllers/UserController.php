<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function generateRandomText($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shuffled = str_shuffle($characters);
        return substr($shuffled, 0, $length);
    }
    
    public function index(Request $request){
        $user_id = Auth::user()->id;
        if(!empty($request->search)) {
            $data = User::where('id', '!=', $user_id)
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(12);
            return  UserResource::collection($data);
        } else{
            $data = User::where('id', '!=', $user_id)
                    ->orderBy('name', 'asc')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(12);
            return UserResource::collection($data);
        }
    }

    public function store(Request $request){
        $user = User::where('email', $request->email)->first();
        if(isset($user)){
            return response()->json([
                'status' => 0,
                'message' => 'Email is already taken, please write another one.'
            ]);
        }
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->role_level = $request->role_level;
        $data->code = $this->generateRandomText();
        $data->password = Hash::make($data->code);
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Saved successfully.',
            'data' => new UserResource($data),
        ]);
    }

    public function view($id){
        $data = User::with('role')->find($id);
        return  new UserResource($data);
    }

    public function update(Request $request, $id){
        $user = User::where('id', '!=', $id)->where('email', $request->email)->first();
        if(isset($user)){
            return response()->json([
                'status' => 0,
                'message' => 'Email is already taken, please write another one.'
            ]);
        }
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->role_level = $request->role_level;
        $data->updated_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Saved successfully.',
            'data' => new UserResource($data),
        ]);
    }

    public function delete($id){
        $data = User::find($id);
        $data->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Deleted Successfully.',
        ]);
    }
}
