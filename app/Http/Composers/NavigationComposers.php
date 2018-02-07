<?php

namespace Genusshaus\Http\Composers;


class NavigationComposers
{

    public function compose($view)
    {
        $view->with([
           'count' => 3
        ]);
    }
}
