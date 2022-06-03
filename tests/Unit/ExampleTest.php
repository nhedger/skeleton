<?php

declare(strict_types=1);

namespace Hedger\Skeleton\Test\Unit;

use Hedger\Skeleton\Example;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Hedger\Skeleton\Example
 *
 * @internal
 */
final class ExampleTest extends TestCase
{
    public function test_it_works(): void
    {
        $this->assertTrue((new Example())->it_works());
    }
}
