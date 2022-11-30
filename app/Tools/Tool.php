<?php

namespace App\Tools;

class Tool
{
    public function __construct(
        private HandlerContract $handler,
        private InertiaContract $inertia,
        private ValidationContract $validation,
    ) {}

    public function handler(): HandlerContract
    {
        return $this->handler;
    }

    public function inertia(): InertiaContract
    {
        return $this->inertia;
    }

    public function validation(): ValidationContract
    {
        return $this->validation;
    }
}
