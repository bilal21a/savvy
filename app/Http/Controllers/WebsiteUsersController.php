<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddNewUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class WebsiteUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["page_name"] = "Website Users";
        $data["breadcrumb"] = '<li class="breadcrumb-item active">Website Users</li>';
        return View::make("pages.website-users.website-users-listing",$data);
    }

    public function listing(){
        $users = User::where("type","website")->where("id","!=",1)->get();
        $listing = [];
        foreach ($users as $key => $user) {
            $statusButton = "btn-danger";
            if($user->status == "enabled"){
                $statusButton = "btn-primary";
            }
            $editUserUrl = route("website-users.edit",$user->id);
            $emptyImage = asset('public/assets/images/empty.jpg');
            $listing[] = [
                $user->id,
                '<img onerror="this.onerror=null;this.src='."'".$emptyImage."'".';" style="width: 50px; height: 50px; border-radius: 50%; border: solid 1px lightgrey;" src="'.asset("storage/".$user->profile_image).'" alt="'.$user->name.'"/><span style="padding-left: 10px;">'.$user->name.'</span>',
                $user->email,
                ucwords($user->gender),
                $user->city??"N/A",
                $user->state??"N/A",
                $user->country??"N/A",
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
        $data["page_name"] = "Add Website User";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("website-users").'">Website Users</a></li><li class="breadcrumb-item active">Add Website User</li>';
        return View::make("pages.website-users.add-website-user",$data);
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
        $user->status = $request->status??"disabled";
        $user->save();
        return Redirect::to("website-users")->with("success","User has been added successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        if($user->id == 1){
            return Redirect::to("website-users");
        }
        $data["page_name"] = "Edit User";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("website-users").'">Website Users</a></li><li class="breadcrumb-item active">Edit Website User</li>';
        $data["user"] = $user;
        return View::make("pages.website-users.edit-website-user",$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        if($user->id == 1){
            return Redirect::to("website-users");
        }
        $data["page_name"] = "Edit Website User";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("website-users").'">Website Users</a></li><li class="breadcrumb-item active">Edit Website User</li>';
        $data["user"] = $user;
        return View::make("pages.website-users.edit-website-user",$data);
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
        return Redirect::to("website-users")->with("success","User information has been updated successfully.");
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

    public function authApis(){
        $data["page_name"] = "Auth APIs";
        $data["breadcrumb"] = '<li class="breadcrumb-item active">Auth APIs</li>';
        return View::make("pages.users.auth-apis",$data);
    }
}
