<?php

declare(strict_types=1);

namespace Sitegeist\Kaleidoscope\ValueObjects\Migrations\Tests\Unit;

class NeosNineDetector
{
    public static function isNeosNine(): bool
    {
        return class_exists('\Neos\ContentRepository\Core\ContentRepository');
    }
}
