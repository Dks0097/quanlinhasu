<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    //    $employee= User::create($request->all());
    //      if($employee){
    //         $salary = new Salary($request->all());
    //         $employee->salary()->save($salary);
    //      }
        User::create($request->all());
        $email=$request->email;
        $password=$request->password;
        //validate

        // kiểm tra có user có email như vậy không
        
        // dd($user);
      
            // gửi mật khẩu reset tới email
           
            $sentData = [
                'title' => 'chào mừng đến với công ty',
                'body' => 'tài khoản của bạn là:'.$email.'<br>'.'mặt khẩu của bạn là:'.$password,
            ];
          
            Mail::to($request->user())->cc($email)->bcc($email)->send(new SendMail($sentData));
            Session::flash('message', 'Send email successfully!');

          
       
        return back()->with('success', 'Tạo người dùng thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(User $user)
    public function edit($id)
    {
        //
        // dd($user);
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.user.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        // $employee = User::findorFail($id);
        // $employee->update($request->all());
        // $salary = $employee->salary?: new Salary();
        // $salary->fill($request->all());
        // $employee->salary()->save($salary);
        // return back()->with('success', 'user updated successfully');
        $user->update($request->all());
        return back()->with('success', 'Sửa nhân viên thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return back()->with('success', 'user deleted successfully');
    }
}
