<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Teacher;

class MenuComposer
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
