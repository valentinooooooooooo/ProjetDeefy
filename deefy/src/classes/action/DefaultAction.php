<?php

declare(strict_types=1);

namespace iutnc\deefy\action;

class DefaultAction extends Action
{
    public function execute(): string
    {
        return '<p>Bienvenue !</p>';
    }
}
