<?php
declare(strict_types=1);

namespace Fi\Tests\Collection;

use Fi\Collection\Set;
use Fi\Stream\SetStream;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Fi\Collection\Set
 */
class SetTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testCreateSet(): void
    {
        $expected = [1, 2];
        $set = new Set();
        $set2 = new Set($expected);

        static::assertCount(0, $set->get());
        static::assertCount(2, $set2->get());
    }

    /**
     * @covers ::get
     */
    public function testSetValues(): void
    {
        $expected = [[1, 2, 3]];
        $set = new Set($expected);

        $actual = [];
        foreach ($set->get() as $idx => $value) {
            $actual[$idx] = $value;
        }

        static::assertSame($expected, $actual);
    }

    /**
     * @covers ::stream
     */
    public function testSetStream()
    {
        $set = new Set([1, 2, 3]);
        $stream = new SetStream($set->get());

        static::assertEquals($stream, $set->stream());
    }
}
