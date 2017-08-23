<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 23.08.17
 * Time: 14:50
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['email', 'password', 'token'];
}