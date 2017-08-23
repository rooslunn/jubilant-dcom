<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 23.08.17
 * Time: 14:50
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title', 'description'];

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'foreign_key');
    }
}