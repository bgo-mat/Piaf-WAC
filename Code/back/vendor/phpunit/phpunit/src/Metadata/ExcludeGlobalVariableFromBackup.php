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
namespace PHPUnit\Metadata;

/**
 * @psalm-immutable
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class ExcludeGlobalVariableFromBackup extends Metadata
{
    /**
     * @psalm-var non-empty-string
     */
    private readonly string $globalVariableName;

    /**
     * @psalm-param 0|1 $level
     * @psalm-param non-empty-string $globalVariableName
     */
    protected function __construct(int $level, string $globalVariableName)
    {
        parent::__construct($level);

        $this->globalVariableName = $globalVariableName;
    }

    /**
     * @psalm-assert-if-true ExcludeGlobalVariableFromBackup $this
     */
    public function isExcludeGlobalVariableFromBackup(): bool
    {
        return true;
    }

    /**
     * @psalm-return non-empty-string
     */
    public function globalVariableName(): string
    {
        return $this->globalVariableName;
    }
}
