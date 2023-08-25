<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title', 'type', 'start_date', 'end_date', 'status', 'image'
    ];

    public function getRouteKeyName(): string
    {
        return 'title';
    }
}
