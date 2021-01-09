<?php

declare(strict_types=1);

namespace Symplify\PHPStanRules\Tests\Rules\ForbiddenMethodOrStaticCallInForeachRule\Fixture;

class SkipWithStaticCallWithoutParameter
{
    public static function getData()
    {
        return [];
    }

    public function execute()
    {
        foreach (self::getData() as $key => $item) {

        }
    }
}
