<?php
declare(strict_types=1);

namespace Fi\Tests\Collection\Queue;

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
        static::assertCount(0, $dequeue->getData());
        static::assertCount(0, $dequeue2->getData());
        static::assertCount(4, $dequeue3->getData());
        static::assertSame(8, $dequeue->getData()->capacity());
        // Min capacity === 8
        static::assertSame(8, $dequeue2->getData()->capacity());
        static::assertSame(16, $dequeue3->getData()->capacity());
    }

    /**
     * @covers ::getData
     */
    public function testDequeueValues(): void
    {
        $expected = [1, 2, 3, 4, 5, 6, 7, 8];
        $dequeue = new Dequeue($expected);
        $dequeue2 = new Dequeue($expected);

        foreach ($expected as $value) {
            $item = $dequeue->getData()->first();
            static::assertSame($value, $item);
            $dequeue->getData()->remove($dequeue->getData()->find($item));
        }

        foreach (array_reverse($expected) as $value) {
            $item = $dequeue2->getData()->last();
            static::assertSame($value, $item);
            $dequeue2->getData()->remove($dequeue2->getData()->find($item));
        }
    }
}
