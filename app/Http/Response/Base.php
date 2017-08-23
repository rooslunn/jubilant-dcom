<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 23.08.17
 * Time: 15:30
 */

namespace App\Http\Response;


interface Base
{
    public static function create(array $data): string;
}