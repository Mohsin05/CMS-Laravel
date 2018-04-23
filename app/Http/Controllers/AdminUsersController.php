<?php

namespace App\Http\Controllers;



use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();



        return view('admin.users.index',compact('users'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //it is used for the select option for the form where 3 role are shown like
        //admin,subs,auth then user will select admin or whatever.
        //so we will get the roles from the data base with the exaclty same formate of name,id this formate
        //will help to display the value and the role in the drop down.
        $roles = Role::lists('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {

        if (trim($request->password) == ''){

            $input = $request->except('password');

        }else{

            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }


        $file = $request->file('photo_id');

        if($file){

            $name = time() . $file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

        }

        $input['password'] = bcrypt($request->password);

        User::create($input);

        return redirect('admin/users');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('admin.user.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = Role::lists('name','id')->all();

        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);
        if (trim($request->password) == ''){

            $input = $request->except('password');

        }else{

            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }



        $input = $request->all();
        if($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $user->update($input);

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $user =  User::findOrFail($id);

        //to also remove the images from the image folder on delete of the user delete3

        unlink(public_path() . $user->photo->file);

            $user->delete();

        Session::flash('deleted_user','The user has been deleted');

       return redirect ('/admin/users');



    }
}
