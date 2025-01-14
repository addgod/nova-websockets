<?php

namespace Vemcogroup\Websockets\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class App extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id',
        'key',
        'secret',
    ];
    protected $casts = [
        'client_messages' => 'bool',
        'statistics' => 'bool',
    ];

    protected static function boot() :void
    {
        parent::boot();

        static::creating(function (App $app) {
            $app->key = str_random(40);
            $app->secret = str_random(40);
        });
    }
}
