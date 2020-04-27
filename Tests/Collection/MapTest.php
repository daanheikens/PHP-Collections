<?php
declare(strict_types=1);

namespace Fi\Tests\Collection;

use Fi\Collection\Map;
use Fi\Stream\SetStream;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Fi\Collection\Map
 */
class MapTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testCreateMap(): void
    {
        $expected = ['key1' => 1, 'key2' => 2];
        $map = new Map();
        $map2 = new Map($expected);

        static::assertCount(0, $map->get());
        static::assertCount(2, $map2->get());
    }

    /**
     * @covers ::get
     */
    public function testMapValues(): void
    {
        $expected = ['key1' => 1, 'key2' => 2, 'key3' => 3];
        $map = new Map($expected);

        $actual = [];
        foreach ($map->get() as $key => $value) {
            $actual[$key] = $value;
        }

        static::assertSame($expected, $actual);
    }

    /**
     * @covers ::stream
     */
    public function testMapStream()
    {
        $map = new Map(['key1' => 1, 'key2' => 2, 'key3' => 3]);
        $stream = new SetStream($map->entrySet()->get());

        static::assertEquals($stream->toArray(), $map->entrySet()->get()->toArray());
    }
}
