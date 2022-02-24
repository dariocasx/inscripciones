<?php

namespace App\Http\Requests;

use App\Teacher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTeacherRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('teacher_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'unique:teachers',
            ],
        ];
    }
}
