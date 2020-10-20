<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class NotesController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->user = auth()->user();   
    }

    public function createNote(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title'     => 'string',
                'description'=> 'string',
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'errors' => $validator->errors(),
                ],
                400
            );
        }

        $note            = new Notes();
        $note->title     = $request->title;
        $note->description      = $request->description;
        

        if ($this->user->notes()->save($note)) {
            return response()->json(
                [
                    'status' => true,
                    'data'   => $note,
                ]
            );
        } else {
            return response()->json(
                [
                    'status'  => false,
                    'message' => 'Oops, the todo could not be saved.',
                ]
            );
        }
    }

    public function update(Request $request){
       $note = Notes::find($request->id);
       if($note != null){
            $note->title = $request['title'];
            $note->description = $request['description'];
            $note->save();
            return response()->json(['message'=>'Note Update sucessfully'],200);
       }
       else {
        return response()->json(['message' => 'Unauthorized note ID'], 404);
    }
    }

}
