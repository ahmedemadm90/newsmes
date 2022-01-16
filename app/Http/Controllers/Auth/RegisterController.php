<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::Login;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    protected function userForm()
    {
        return view('auth.registerUser');
    }
    protected function vendorForm()
    {
        return view('auth.registerVendor');
    }
    protected function createVendor(Request $request)
    {
        $role = Role::where('name', 'vendor')->first();
        if (!$role) {
            return redirect(route('register.vendor.form'))->with(['error' => 'something went wrong please contact site admin']);
        } else {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'active' => '0',
            ]);
            $user->assignRole('Vendor');
            return $user;
        }

        /* try {
        } catch (\Throwable $th) {
        } */
    }
    protected function createUser(Request $request)
    {
        $role = Role::where('name', 'user')->first();
        /* if (!$role) {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'active' => '0',
            ]);
            $user->assignRole('User');
            return $user;
        } else {
            return redirect(route('register.user.form'))->with(['error' => 'something went wrong please contact site admin']);
        } */
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'active' => '0',
        ]);
        $user->assignRole('User');
        return redirect(route('login'));
    }
}
