<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Teacher;
use App\Profesor;

class SidebarComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menuTeachers', Teacher::withCount('courses')->whereHas('courses')->pluck('name', 'id'));
    }
}