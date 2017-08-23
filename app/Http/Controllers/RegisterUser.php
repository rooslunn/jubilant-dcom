<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 23.08.17
 * Time: 14:40
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Response\{
    Success as SuccessResponse,
    Fail as FailResponse
};

class RegisterUser extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        $token = bin2hex(random_bytes(16));

        $user = new User([
            'email' => $request->input('email'),
            'password' => password_hash($request->input('password'), PASSWORD_BCRYPT),
            'token' => $token
        ]);

        try {
            $user->save();
            return SuccessResponse::create(['token' => $token]);
        } catch (\Exception $e) {
            return FailResponse::create([$e->getMessage()]);
        }
    }
}