<?php

declare(strict_types=1);

namespace iutnc\deefy\render;

abstract class AudioTrackRenderer implements Renderer
{
    public function render(int $selector = self::COMPACT): string
    {
        return match ($selector) {
            self::COMPACT => $this->renderCompact(),
            self::LONG => $this->renderLong(),
            default => throw new \InvalidArgumentException("invalid selector : $selector"),
        };
    }

    abstract protected function renderCompact(): string;

    abstract protected function renderLong(): string;

    protected function e(string $text): string
    {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }

    protected function audioTag(string $filename): string
    {
        if ($filename === '') {
            return '';
        }
        return '<audio controls preload="none" src="audio/' . $this->e(rawurlencode($filename)) . '"></audio>';
    }
}
