<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * @mixin \Eloquent
 */
class Feedback extends Model
{
    protected $table = "feedback";
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [
        'id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
