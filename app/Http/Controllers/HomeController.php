<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{


    public function index()
    {
        return view('home');
    }

    public function clearCache()
    {
        \Artisan::call('cache:clear');
        return view('clear-cache');
    }
    function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required | string ',
            'email'    => 'required | email',
            'mobile'   => 'required'
        ]);
        // check validation for password match
        if(isset($request->password)){
            $validator = Validator::make($request->all(), [
                'password' => 'required | confirmed'
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->messages()->first());
        }

        try{
            $user = User::findorFail($request->id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'address' => $request->address,
            ]);

            if(isset($request->password))
            {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }
            return redirect()->back()->with('success', 'User Profile updated succesfully!');
        }
        catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);

        }
    }
}
