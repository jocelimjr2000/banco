<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => ['required'],
            'ref' => ['required', 'max_digits:30'],
            'depInicial' => ['required', 'numeric'],
            'tipo' => ['required', 'numeric', 'exists:tipos,id']
        ];
    }
}
