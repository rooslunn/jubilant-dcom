<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 23.08.17
 * Time: 15:26
 */

namespace App\Http\Response;


class Success implements Base
{
    public static function create(array $data): string
    {
        $response = [
            'status' => 1,
            'data' => $data
        ];
        return json_encode($response);
    }
}