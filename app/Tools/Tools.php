<?php

namespace App\Tools;

class Tools
{
    /**
     * @param array<Tool> $tools
     */
    public function __construct(private array $tools) {}

    public function build(string $toolName): Tool
    {
        $tool = $this->tools[$toolName] ?? null;

        abort_unless($toolName, 404, 'Tool not found');

        return $tool;
    }
}
