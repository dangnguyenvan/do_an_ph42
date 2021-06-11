<?php

namespace App\Http\Controllers;

use App\Enums\ActiveStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewAccount()
    {
        
        return view('dashboards.manage_account.my_account');
    }
    
    public function editAccount(){
        return view('dashboards.manage_account.edit_account');
    }
    public function changePassword(){
        return view('dashboards.manage_account.change_password');
    }
    public function updateAccount(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'birthday' =>'required|date_format:"Y-m-d"',
            'address'=>'required|string|max:255',
            'phone' => 'required|digits:10',
        ]);
           
            $user=User::find($id);
            $user->name=$request->name;
            $user->email=$request->email;
            $user->address=$request->address;
            $user->birthday=$request->birthday;
            $user->phone=$request->phone;
            
        DB::beginTransaction();
        try{
            $user->save();
           
            DB::commit();
            return redirect()->route('view_account')->with('mess','Update account success');
        }catch(\Exception $ex){
            
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function updatePassword(Request $request,$id){
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);
        $user=User::find($id);
        $user->password=Hash::make($request->password);
        DB::beginTransaction();
        try{
            $user->save();
            DB::commit();
            return redirect()->route('view_account');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
}
