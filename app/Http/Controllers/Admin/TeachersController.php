<?php

namespace App\Http\Controllers\Admin;

use App\Teacher;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTeacherRequest;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\User;

class TeachersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('teacher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teachers = teacher::all();



        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        abort_if(Gate::denies('teacher_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.teachers.create', compact('users'));
    }

    public function store(StoreTeacherRequest $request)
    {
        $teacher = Teacher::create($request->all());

        return redirect()->route('admin.teachers.index');
    }

    public function edit(Teacher $teacher)
    {
        abort_if(Gate::denies('teacher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $teacher->update($request->all());

        return redirect()->route('admin.teachers.index');
    }

    public function show(Teacher $teacher)
    {
        abort_if(Gate::denies('teacher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.teachers.show', compact('teacher'));
    }

    public function destroy(Teacher $teacher)
    {
        abort_if(Gate::denies('teacher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teacher->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeacherRequest $request)
    {
        Teacher::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
