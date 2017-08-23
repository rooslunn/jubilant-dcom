<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 23.08.17
 * Time: 14:06
 */

namespace App\Http\Controllers;


class ShowAbout
{
    public function __invoke()
    {
        return 'DCOM PHP Exam';
    }
}