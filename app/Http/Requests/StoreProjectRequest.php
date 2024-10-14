<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:200', //['required', 'max:200']
            'image' => 'nullable|image|max:9000',
            'summary' => 'nullable',
            'type_id' => 'nullable'
        ];
    }
    public function messages(){
        return [
            "name.required" => "Il nome del progetto è obbligatorio",
            "name.max" => "Il nome del progetto dev'essere lungo al massimo :max caratteri",
            "image.image" => "Il file dev\'essere un\'immagine valida",
            "image.max" => "La dimensione del file non deve superare i :max Kb"
        ];
    }
}
