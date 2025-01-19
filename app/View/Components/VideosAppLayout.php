<?php
namespace App\View\Components;

use Illuminate\View\Component;

class VideosAppLayout extends Component
{
    public function __construct()
    {
        // Aquí pots afegir dades o lògica personalitzada
    }

    public function render()
    {
        return view('layouts.videos-app-layout');
    }
}
