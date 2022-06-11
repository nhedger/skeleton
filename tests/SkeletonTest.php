<?php declare(strict_types=1);

namespace Hedger\Skeleton\Test;

use Hedger\Skeleton\Skeleton;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Hedger\Skeleton\Skeleton
 */
class SkeletonTest extends TestCase
{
    public function test_it_works(): void
    {
        $this->assertInstanceOf(Skeleton::class, new Skeleton());
    }
}
