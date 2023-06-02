<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddNewUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["page_name"] = "Users";
        $data["breadcrumb"] = '<li class="breadcrumb-item active">Users</li>';
        return View::make("pages.users.users-listing",$data);
    }

    public function listing(){
        $users = User::where("type","admin")->where("id","!=",1)->get();
        $listing = [];
        foreach ($users as $key => $user) {
            $statusButton = "btn-danger";
            if($user->status == "enabled"){
                $statusButton = "btn-primary";
            }
            $editUserUrl = route("users.edit",$user->id);
            $listing[] = [
                $user->id,
                $user->name,
                $user->email,
                '<button class="btn btn-sm '.$statusButton.'" onclick="updateUserStatus('.$user->id.','."'".$user->status."'".')">'.ucwords($user->status).'</button>',
                '<div class="btn-group"><a href="'.$editUserUrl.'" class="btn btn-sm btn-secondary">Edit</a><a onclick="deleteUser('.$user->id.')" class="btn btn-sm btn-danger">Delete</a></div>'
            ];
        }
        return response()->json([
            "data" => $listing
        ]);
    }

    public function updateStatus(Request $request){
        if($request->id == 1){
            return false;
        }
        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["page_name"] = "Add User";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("users").'">Users</a></li><li class="breadcrumb-item active">Add User</li>';
        return View::make("pages.users.add-user",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNewUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type = "admin";
        $user->status = $request->status??"disabled";
        $user->save();
        return Redirect::to("users")->with("success","User has been added successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if($user->id == 1){
            return Redirect::to("users");
        }
        $data["page_name"] = "Edit User";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("users").'">Users</a></li><li class="breadcrumb-item active">Edit User</li>';
        $data["user"] = $user;
        return View::make("pages.users.edit-user",$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if($user->id == 1){
            return Redirect::to("users");
        }
        $data["page_name"] = "Edit User";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("users").'">Users</a></li><li class="breadcrumb-item active">Edit User</li>';
        $data["user"] = $user;
        return View::make("pages.users.edit-user",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, (new UpdateUserRequest($id))->rules());
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = bcrypt($request->password);
        }
        $user->status = $request->status??"disabled";
        $user->save();
        return Redirect::to("users")->with("success","User information has been updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if($id == 1){
            return false;
        }
        User::where("id",$id)->delete();
    }
}
