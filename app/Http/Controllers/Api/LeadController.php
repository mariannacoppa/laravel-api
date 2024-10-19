<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Lead;

class LeadController extends Controller
{
    public function store(Request $request){
        // importo i dati dalla form
        $form_data = $request->all();
        // implemento la validazione
        $validator = Validator::make($form_data, [
            'name' => ['required', 'max:50'],
            'surname' => ['required', 'max:100'],
            'email' => ['required', 'max:150'],
            'phone' => ['required', 'max:20'],
            'content' => ['required'],
        ],
        $errors = [
            'name.required' => 'Il nome è obbligatorio',
            'name.max' => 'Il nome non può superare i :max caratteri',
            'surname.required' => 'Il cognome è obbligatorio',
            'surname.max' => 'Il cognome non può superare i :max caratteri',
            'email.required' => 'L\'indirizzo email è obbligatorio',
            'email.max' => 'L\'indirizzo email non può superare i :max caratteri',
            'phone.required' => 'Il numero di telefono è obbligatorio',
            'phone.max' => 'Il numero di telefono non può superare i :max caratteri',
            'content.required' => 'Il contenuto della mail è obbligatorio',
        ]);
    }
}
