<?php

namespace App\Http\Controllers\Api\Auth;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
         $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            "profilePic" => ["required"],
            "group_id" => ["required"], 
            'email' => [ 'required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'password' => ['required','min:8'],
            "alamat" => ["min:3", "max:200"], 
        ]);

        $user = User::create([
            "noHp" => "",
            "alamat" => "",
            "role" => "user",
            'name' => $request->name,
            'email' => $request->email,
            "group_id" => $request->group_id,
            'password' => bcrypt($request->password),
            "profilePic" => "default.jpg"
        ]);

        $token = $user->createToken('myAppToken');

        return (new UserResource($user))->additional([
            'token' => $token->plainTextToken,
        ]);
    }
}
