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

class UpdateNote extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'token' => 'required|string',
            'note_id' => 'required|integer',
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        $user = User::where('token', $request->input('token'))->first();

        $note = $user->notes()->find($request->input('note_id'));
        if (!$note) {
            return FailResponse::create(['Note not found']);
        }

        $note->title = $request->input('title');
        $note->description = $request->input('description');
        $note->save();

        return SuccessResponse::create(['note_id' => $note->id]);
    }
}