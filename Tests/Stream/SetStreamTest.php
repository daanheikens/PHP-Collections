<?php
declare(strict_types=1);

namespace Fi\Tests\Stream;

use Fi\Collection\Set;
use Fi\Functions\BiFunction;
use Fi\Functions\Consumer\Consumer;
use Fi\Functions\MonoFunction;
use Fi\Functions\Predicate\Predicate;
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
                    /** @param User $value */
                    public function apply($value): User
                    {
                        $value->setId(0);
                        $value->setName('Hans');
                        return $value;
                    }
                }
            )
            ->collect(
                Collectors::toMap(
                    new class implements MonoFunction {
                        /** @param User $value */
                        public function apply($value): string
                        {
                            return $value->getName();
                        }
                    },
                    new class implements MonoFunction {
                        /** @param User $value */
                        public function apply($value): int
                        {
                            return $value->getId();
                        }
                    }
                )
            );

        foreach ($mapFromSet->getData() as $key => $value) {
            static::assertSame('Hans', $key);
            static::assertSame(0, $value);
        }
    }

    /**
     * @covers ::collect
     */
    public function testCollectShouldReturnMapWithMergeFunction()
    {
        $mapFromSet = $this->set
            ->stream()
            ->map(
                new class implements MonoFunction {
                    /** @param User $value */
                    public function apply($value): User
                    {
                        $value->setId(0);
                        $value->setName('Hans');
                        return $value;
                    }
                }
            )
            ->collect(
                Collectors::toMap(
                    new class implements MonoFunction {
                        /** @param User $value */
                        public function apply($value): string
                        {
                            return $value->getName();
                        }
                    },
                    new class implements MonoFunction {
                        /** @param User $value */
                        public function apply($value): int
                        {
                            return $value->getId();
                        }
                    },
                    new class implements BiFunction {
                        /**
                         * @param int $valueA
                         * @param int $valueB
                         * @return mixed
                         */
                        public function apply($valueA, $valueB)
                        {
                            return $valueA . $valueB;
                        }
                    }
                )
            );

        foreach ($mapFromSet->getData() as $key => $value) {
            static::assertSame('Hans', $key);
            static::assertSame($key === 0 ? 0 : '00', $value);
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
        foreach ($newSetFromSet->getData() as $item) {
            static::assertSame(0, $item->getId());
            static::assertSame('Hans', $item->getName());
        }
    }

    /**
     * @covers ::filter
     */
    public function testFilter()
    {
        $newSetFromSet = $this->set
            ->stream()
            ->filter(new class implements Predicate {
                /** @param User $value */
                public function test($value): bool
                {
                    return $value->getId() === 1;
                }
            })
            ->collect(Collectors::toSet());

        /** @var User $item */
        foreach ($newSetFromSet->getData() as $item) {
            static::assertSame(1, $item->getId());
            static::assertSame('Joost', $item->getName());
        }
    }

    /**
     * @covers ::findFirst
     */
    public function testFindFirst()
    {
        /** @var User $user */
        $user = $this->set
            ->stream()
            ->findFirst();

        /** @var User $item */
        static::assertSame(1, $user->getId());
        static::assertSame('Joost', $user->getName());
    }

    /**
     * @covers ::forEach
     */
    public function testForEach()
    {
        $user = new User(3, 'Foo');
        $this->set
            ->stream()
            ->forEach(new class($user) implements Consumer {
                private User $testValue;

                public function __construct(User $testValue)
                {
                    $this->testValue = $testValue;
                }

                /** @param User $value */
                public function consume($value): void
                {
                    $this->testValue->setId($this->testValue->getId() + ($value->getId() * 2));
                }
            });

        static::assertSame(9, $user->getId());
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
