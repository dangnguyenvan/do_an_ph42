<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ActiveStatus;
use App\Enums\UserRole as EnumsUserRole;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function listUser()
    {
        $data = [];
        $users = User::paginate(5);
        $active_status= ActiveStatus::getValues();
        
        //dd($role);
        $data['users'] = $users;
        $data['active_status'] = $active_status;
        
        return view('dashboards.admin.list_user',$data);
    }
    public function updateStatusUser(Request $request,$id)
    {
        $user=User::find($id);
        $user->status=$request->status;
        DB::beginTransaction();
        try{
            $user->save();
            DB::commit();
            return redirect()->back();
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function editUser($id)
    {
        $data = [];
        $user = User::find($id);
        //dd($user);
        // foreach ($user->roles as $key => $role) {
        //    $role_name[] = $role->role_name;
           
        // }
        //dd($role_name);
        $roles = Role::get();
        foreach ($roles as $key => $role) {
            $role_name[] = $role->role_name;
            $role_id[] = $role->id;
        }
        //dd($role_id);
        $data['user'] = $user;
        //$data['roles'] = $roles;
        $data['role_name'] = $role_name;
        $data['role_id'] = $role_id;
        return view('dashboards.admin.edit_user',$data);
    }
    public function updateRole(Request $request,$id)
    {
        
       $user = User::where('id',$id)->first();
       $user->roles()->detach();
       if ($request->role_user) {
           $user->roles()->attach($request->role_user);
       }
       if ($request->role_seller) {
        $user->roles()->attach($request->role_seller);
       }
       if ($request->role_admin) {
            $user->roles()->attach($request->role_admin);
       }
       return redirect()->back();
    }
}
