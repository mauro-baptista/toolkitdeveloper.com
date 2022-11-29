<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SlugifyController
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'text' => ['required', 'min:3', 'max:512'],
        ]);

        $slug = str($request->text)->slug()->toString();

        return Inertia::render('Tools/Slugify', [
            'slug' => $slug,
        ]);
    }
}
