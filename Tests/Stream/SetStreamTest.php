<?php
declare(strict_types=1);

namespace Fi\Tests\Stream;

use Fi\Collection\Set;
use Fi\Functions\MonoFunction;
use Fi\Stream\Collectors\Collectors;
use Fi\Tests\Objects\User;
use PHPUnit\Framework\TestCase;

/**
 * Class SetStreamTest
 * @package Fi\Tests\Stream
 * @coversDefaultClass \Fi\Stream\SetStream
 */
class SetStreamTest extends TestCase
{
    private Set $set;

    private array $dataset;

    protected function setUp(): void
    {
        $user1 = new User(1, 'Joost');
        $user2 = new User(2, 'Daan');
        $this->dataset = [$user1, $user2];
        $this->set = new Set($this->dataset);
    }

    /**
     * @covers ::toArray
     */
    public function testToArray()
    {
        $array = $this->set
            ->stream()
            ->toArray();

        static::assertSame($this->dataset, $array);
    }

    /**
     * @covers ::map
     */
    public function testMap()
    {
        /** @var User[] $array */
        $array = $this->set
            ->stream()
            ->map(
                new class implements MonoFunction {
                    /**
                     * @param User $value
                     * @return User
                     */
                    public function apply($value): User
                    {
                        $value->setId(0);
                        $value->setName('Hans');
                        return $value;
                    }
                }
            )
            ->toArray();
        foreach ($array as $item) {
            static::assertSame(0, $item->getId());
            static::assertSame('Hans', $item->getName());
        }
    }

    /**
     * @covers ::collect
     */
    public function testCollectShouldReturnMap()
    {
        $mapFromSet = $this->set
            ->stream()
            ->map(
                new class implements MonoFunction {
                    /**
                     * @param User $value
                     * @return User
                     */
                    public function apply($value): User
                    {
                        $value->setId(0);
                        $value->setName('Hans');
                        return $value;
                    }
                }
            )
            ->collect(Collectors::toMap('getName', 'getId'));

        foreach ($mapFromSet->get() as $key => $value) {
            static::assertSame('Hans', $key);
            static::assertSame(0, $value);
        }
    }

    /**
     * @covers ::collect
     */
    public function testCollectShouldReturnSet()
    {
        $newSetFromSet = $this->set
            ->stream()
            ->map(
                new class implements MonoFunction {
                    /**
                     * @param User $value
                     * @return User
                     */
                    public function apply($value): User
                    {
                        $value->setId(0);
                        $value->setName('Hans');
                        return $value;
                    }
                }
            )
            ->collect(Collectors::toSet());

        /** @var User $item */
        foreach ($newSetFromSet->get() as $item) {
            static::assertSame(0, $item->getId());
            static::assertSame('Hans', $item->getName());
        }
    }

    /**
     * @covers ::filter
     */
    public function testFilter()
    {
        $this->markTestSkipped();
    }

    /**
     * @covers ::findFirst
     */
    public function testFindFirst()
    {
        $this->markTestSkipped();
    }

    /**
     * @covers ::forEach
     */
    public function testForEach()
    {
        $this->markTestSkipped();
    }

    /**
     * @covers ::mapToFloat
     */
    public function testMapToFloat()
    {
        $this->markTestSkipped();
    }

    /**
     * @covers ::mapToInt
     */
    public function testMapToInt()
    {
        $this->markTestSkipped();
    }

    /**
     * @covers ::sort
     */
    public function testSort()
    {
        $this->markTestSkipped();
    }
}
