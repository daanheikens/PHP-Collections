<?php
declare(strict_types=1);

namespace Tests\Collection\Set;

use PHPUnit\Framework\TestCase;
use Tests\TestObjects\Foo;
use Tests\TestObjects\User;
use Tests\TestObjects\UserSet;

/**
 * Class SetTest
 * @package Tests\Collection\Set@
 * @coversDefaultClass \Fi\Collection\Set\Set
 */
class SetTest extends TestCase
{
    /** @var User */
    private $user;

    public function setUp(): void
    {
        $this->user = new User('Test_user', 44);
    }

    /**
     * @covers ::__construct
     * @covers ::getIterator
     */
    public function testSetShouldCreate()
    {
        $set = new UserSet([new User('ut_user_2', 55), new User('ut_user_3', 66)]);
        static::assertContainsOnlyInstancesOf(User::class, $set);
        static::assertCount(2, $set);
    }

    /**
     * @covers ::__construct
     * @covers ::getIterator
     */
    public function testSetShouldNotCreateWhenMultipleTypesProvided()
    {
        $set = new UserSet(
            [
                new User('ut_user_2', 55),
                new User('ut_user_3', 66),
                new Foo()
            ]
        );
        static::assertCount(0, $set);
    }

    /**
     * @covers ::add
     */
    public function testAdd()
    {
        $set = new UserSet([new User('ut_user_2', 55), new User('ut_user_3', 66)]);
        static::assertTrue($set->add(new User('test', 67)));
        /** @noinspection PhpParamsInspection */
        static::assertFalse($set->add(new Foo()));
    }
}
