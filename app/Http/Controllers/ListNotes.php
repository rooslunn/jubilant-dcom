<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 23.08.17
 * Time: 14:40
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\{
    User, Note
};
use App\Http\Response\{
    Success as SuccessResponse,
    Fail as FailResponse
};

class ListNotes extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::where('token', $request->input('token'))->first();
        return SuccessResponse::create([$user->notes()->get()]);
    }
}