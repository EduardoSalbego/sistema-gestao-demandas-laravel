<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class SidebarComposer
{
    public function compose(View $view): void
    {
        $user = Auth::user();

        $emailHash = md5(strtolower(trim($user->email ?? '')));
        $avatar = "https://www.gravatar.com/avatar/$emailHash?s=200&d=mp";

        $view->with('user', $user);
        $view->with('avatar', $avatar);
    }
}