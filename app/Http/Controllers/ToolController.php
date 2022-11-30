<?php

namespace App\Http\Controllers;

use App\Tools\Tools;
use Illuminate\Http\Request;

class ToolController
{
    public function __construct(private Tools $tools) {}

    public function __invoke(string $tool, Request $request)
    {
        $tool = $this->tools->build($tool);

        $validated = $tool->validation()->validate($request->all());

        $generated = $tool->handler()->generate($validated);

        return $tool->inertia()->render($generated);
    }
}
