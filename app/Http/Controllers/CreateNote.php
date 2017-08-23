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

class CreateNote extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'token' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        $note = new Note([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        $user = User::where('token', $request->input('token'))->first();
        if (!$user) {
            return FailResponse::create(['User not found']);
        }

        try {
            $note= $user->notes()->save($note);
            return SuccessResponse::create(['note_id' => $note->id]);
        } catch (\Exception $e) {
            return FailResponse::create([$e->getMessage()]);
        }
    }
}