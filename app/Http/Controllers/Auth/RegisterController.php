<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegisterEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('auth.register');
    }


    public function register(RegisterRequest $request)
    {
//        $data = [
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' => Hash::make($request->password),
//        ];

        $data = $request->only('name','email', 'password');
        $user = User::create($data);

//        $remember = $request->has('remember');
//        Auth::login($user, $remember);


        alert()->info('Bilgilendirme','Lütfen mailinize gelen onay mailini onaylayın.');
        return redirect()->back();


//        return redirect()->route('admin.index');

//        event(new UserRegisterEvent($user));

//        dd("event çalıştı");

//        return redirect()->back();
    }

    public function verify(Request $request)
    {
        $userID = Cache::get('verify_token_' . $request->token);

        if(!$userID){
            alert()->warning('Uyarı','Token geçerlilik süresi doldu.');
            return redirect()->route('register');
        }

        $user = User::findOrFail($userID);
        $user->email_verified_at = now();
        $user->save();

        Cache::forget('verify_token_' . $request->token);

        Auth::login($user);
        alert()->success('Başarılı','Hesabınız onaylandı');

        return redirect()->route('admin.index');
    }


}
