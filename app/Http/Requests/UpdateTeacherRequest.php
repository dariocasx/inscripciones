<?php

namespace App\Http\Requests;

use App\Teacher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTeacherRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('teacher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'unique:teachers,name,' . request()->route('teacher')->id,
            ],
        ];
    }
}
