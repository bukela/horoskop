<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class HoroscopeAdd extends FormRequest
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
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'horoscopegroup_id' => 'required',
            'schedules' => 'required',
            'types' => 'required',
            'sign_id' => 'required',
            'title' => 'required|max:255|unique:horoscopes,title,'.$request->id,
            'short_description' => 'required'
        ];
    }

    public function messages() {
        return [
            'types.required' => 'Tip horoskopa je obavezan',
            'sign_id.required' => 'Znak je obavezan',
            'title.required' => 'Naslov je obavezan',
            'schedules.required' => 'Schedule je obavezan',
            'short_description.required' => 'Tekst horoskopa je obavezan'
        ];
    }
}
