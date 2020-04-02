<?php
declare(strict_types=1);

namespace Fi\Stream;

use Ds\Collection;
use Fi\Functions\Scalar\ToFloatFunction;

final class Stream
{
    private Collection $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function mapToInt()
    {

    }

    /**
     * TODO figure out if this is the right approach
     * @param ToFloatFunction<T>|callable<T> $floatFunction
     */
    public function mapToFloat($floatFunction)
    {
//        $callable[] = $floatFunction;
//        if ($floatFunction instanceof ToFloatFunction) {
//            $callable[] = ToFloatFunction::TO_FLOAT;
//        }
//
//        call_user_func_array($callable, [$this->collection]);
    }

    public function filter()
    {

    }

    public function map()
    {

    }

    public function collect()
    {

    }

    public function sort()
    {

    }

    public function forEach()
    {

    }

    public function findFirst()
    {

    }

    public function findAny()
    {

    }
}