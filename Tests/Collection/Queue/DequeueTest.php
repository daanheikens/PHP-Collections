<?php
declare(strict_types=1);

namespace Collection\Queue;

use Fi\Collection\Queue\Dequeue;
use Fi\Stream\SetStream;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Fi\Collection\Queue\Dequeue
 */
class DequeueTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers \Fi\Collection\Collection::__construct
     */
    public function testCreateDequeue(): void
    {
        $dequeue = new Dequeue();
        $dequeue2 = new Dequeue([], 2);
        $dequeue3 = new Dequeue([1, 2, 3, 4], 16);
        static::assertCount(0, $dequeue->get());
        static::assertCount(0, $dequeue2->get());
        static::assertCount(4, $dequeue3->get());
        static::assertSame(8, $dequeue->get()->capacity());
        // Min capacity === 8
        static::assertSame(8, $dequeue2->get()->capacity());
        static::assertSame(16, $dequeue3->get()->capacity());
    }

    /**
     * @covers ::get
     */
    public function testDequeueValues(): void
    {
        $expected = [1, 2, 3, 4, 5, 6, 7, 8];
        $dequeue = new Dequeue($expected);
        $dequeue2 = new Dequeue($expected);

        foreach ($expected as $value) {
            $item = $dequeue->get()->first();
            static::assertSame($value, $item);
            $dequeue->get()->remove($dequeue->get()->find($item));
        }

        foreach (array_reverse($expected) as $value) {
            $item = $dequeue2->get()->last();
            static::assertSame($value, $item);
            $dequeue2->get()->remove($dequeue2->get()->find($item));
        }
    }
}
