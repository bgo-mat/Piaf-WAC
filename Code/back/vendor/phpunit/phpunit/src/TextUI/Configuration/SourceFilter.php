<?php

declare(strict_types=1);

/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\TextUI\Configuration;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class SourceFilter
{
    public function includes(Source $source, string $path): bool
    {
        $files = (new SourceMapper())->map($source);

        return isset($files[$path]);
    }
}
