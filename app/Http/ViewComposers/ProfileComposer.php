<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ProfileComposer {
    public function compose(View $view) {
        $user = Auth::user();
        $moo = 'Moo from composer';
        $view->with('user', $user)
            ->with('moo', $moo)
            ->with('test', 'testiranje grdno'); //direktno deklarisanje variabe u with
    }
}