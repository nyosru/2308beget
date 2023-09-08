<?php

namespace Modules\Phpcat\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Phpcat\Database\factories\TimelineFactory;

class PhpcatNews extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'head',
        'date',
        'text',
        'img',
        'link',
    ];

    protected static function newFactory()
    {
        return TimelineFactory::new();
    }
}
