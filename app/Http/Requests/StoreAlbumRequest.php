<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlbumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $requiredRule = request()->isMethod('put') ? 'nullable' : 'required';
        return [
            'album_title' => [$requiredRule,'string','min:3','max:256'],
            'images' => [$requiredRule,'array'],
            'images.*' => ['image','mimes:jpg,jpeg,png,gif','max:2048'],
            'images_names' => ['nullable','array'],
            'images_names.*' => ['nullable','string','min:3','max:256']
        ];
    }
}
