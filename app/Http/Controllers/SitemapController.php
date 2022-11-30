<?php

namespace App\Http\Controllers;

class SitemapController
{
    public function __invoke()
    {
        return response()->view('sitemap', [
            'tools' => config('tools'),
        ])->header('Content-Type', 'text/xml');
    }
}
