<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make($data,
            [
                'name' => 'required|min:3|max:50',
                'email' => 'required|email',
                'message' => 'required|min:3',
            ],
            [
                'name.required' => 'Il nome è un campo obbligatorio.',
                'name.min' => 'Il nome deve avere almeno :min caratteri.',
                'name.max' => 'Il nome può avere un massimo di :max caratteri.',
                'email.required' => 'L\'email è un campo obbligatorio.',
                'email.email' => 'L\'email inserita non è valida.',
                'message.required' => 'Il messaggio è un campo obbligatorio.',
                'message.midn' => 'Il messaggio deve avere almeno :min caratteri.',
            ]
        );

        if($validator->fails()){
            $success = false;
            $errors = $validator->errors();

            return response()->json(compact('success', 'error'));
        }

        // salvo l'email nel db
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();


        // Invio l'email
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NewContact($new_lead));

        $success = true;

        return response()->json(compact('success'));

    }
}
