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
namespace PHPUnit\TextUI\Output\Default\ProgressPrinter;

use PHPUnit\Event\Test\ErrorTriggered;
use PHPUnit\Event\Test\ErrorTriggeredSubscriber;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class TestTriggeredErrorSubscriber extends Subscriber implements ErrorTriggeredSubscriber
{
    public function notify(ErrorTriggered $event): void
    {
        $this->printer()->testTriggeredError($event);
    }
}
