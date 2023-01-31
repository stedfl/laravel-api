<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();
        $success = true;
        $validator = Validator::make($data,
            [
                'name' => 'required|min:3|max:40',
                'email' => 'required|email|min:5|max:255',
                'object' => 'required|min:3|max:100',
                'message' => 'required|min:3|max:4000'
            ],
            [
                'name.required' => 'Il campo nome è obbligatorio',
                'name.min' => 'Il campo nome richiede almeno :min caratteri',
                'name.max' => 'Il campo nome consente al massimo :max caratteri',
                'email.required' => 'Il campo e-mail è obbligatorio',
                'email.email' => 'Il campo mail non è formattato correttamente',
                'email.min' => 'Il campo e-mail richiede almeno :min caratteri',
                'email.max' => 'Il campo e-mail consente al massimo :max caratteri',
                'object.required' => 'Il campo oggetto è obbligatorio',
                'object.min' => 'Il campo oggetto richiede almeno :min caratteri',
                'object.max' => 'Il campo oggetto consente al massimo :max caratteri',
                'message.required' => 'Il campo messaggio è obbligatorio',
                'message.min' => 'Il campo messaggio richiede almeno :min caratteri',
                'message.max' => 'Il campo messaggio consente al massimo :max caratteri',
            ]
        );

        if($validator->fails()) {
            $success = false;
            $errors = $validator->errors();

            return response()->json(compact('success', 'errors'));

        } else {
            $success = true;
            $new_lead = new Lead();
            $new_lead->fill($data);
            $new_lead->save();
            Mail::to('info-portfolio@sdf.it')->send(new NewContact($new_lead));

            return response()->json(compact('success'));
        }
    }
}
