<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        //
        $email = $request->post('email');
        $password = $request->post('password');

        $result = Admin::where(['email'=>$email])->first();
        if($result)
        {
            if(Hash::check($password, $result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/dashboard');
            }
            else{
                $request->session()->flash('status', 'Password is incorrect');
                return redirect('admin');

            }

        }
        else{

        }

    }

    public function dashboard()
    {
        //
        $total_active_customer=DB::table('customers')->where(['status'=>1])->count();
        return view('admin.dashboard',['total_active_customer'=>$total_active_customer]);

    }


}
