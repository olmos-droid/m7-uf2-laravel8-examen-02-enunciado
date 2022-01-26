<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class CompraRequest extends FormRequest
{
    //protected $redirectRoute = 'post.create' //ruta definida en alguno de los archivos de la carpeta routes
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            'photo' => 'required',
            

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Falta el campo :attribute".',
            'email.required' => 'Falta el campo :attribute".',
            'password.required' => 'Falta el campo :attribute".',
            'password_confirmation.required' => 'Falta el campo :attribute".',
            'photo.required' => 'Falta el campo :attribute".',
        ];
    }
    public function attributes()
    {
        return [
          
        ];
    }
    /**
     *  AJAX Response 
     */
    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }
        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }
}
