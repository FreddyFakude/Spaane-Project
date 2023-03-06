<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhatsAppMessageRequest extends FormRequest
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
            'WaId' => 'required',
            'ProfileName' => 'required',
            'SmsStatus' => 'required',
            'NumMedia' => 'required',
            'MessageSid' => "required",
            'Body'=>"required"
        ];
    }
}
