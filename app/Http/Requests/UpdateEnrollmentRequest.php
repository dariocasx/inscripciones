<?php

namespace App\Http\Requests;

use App\Enrollment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateEnrollmentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('enrollment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'course_id' => [
                'required',
                'integer',
            ],
            'status'    => [
                'required',
            ],
        ];
    }
}
