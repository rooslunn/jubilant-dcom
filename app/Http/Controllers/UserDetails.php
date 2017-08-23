<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 23.08.17
 * Time: 14:06
 */

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Response\{
    Success,
    Fail
};
use Illuminate\Http\Request;

class UserDetails extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'token' => 'required|string',
        ]);

        $user = User::where('token', $request->input('token'))->first();

        if (!$user) {
            return Fail::create(['User not found']);
        }

        return Success::create(['email' => $user->email]);
    }
}