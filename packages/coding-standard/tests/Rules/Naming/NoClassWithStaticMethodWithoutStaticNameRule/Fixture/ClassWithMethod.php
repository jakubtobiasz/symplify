<?php

declare(strict_types=1);

namespace Symplify\CodingStandard\Tests\Rules\Naming\NoClassWithStaticMethodWithoutStaticNameRule\Fixture;

final class ClassWithMethod
{
    public static function run(): void
    {
    }
}
