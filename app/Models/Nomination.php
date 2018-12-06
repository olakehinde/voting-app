<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Nomination
 * @package App\Models
 * @version October 6, 2018, 2:59 pm UTC
 *
 * @property string name
 * @property string bio
 * @property string gender
 * @property string occupation
 * @property string reasons_for_nomination
 * @property integer no_of_nominations
 * @property integer category_id
 * @property integer user_id
 * @property boolean is_won
 * @property boolean is_admin_selected
 */
class Nomination extends Model
{
    use SoftDeletes;

    public $table = 'nominations';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'bio',
        'image',
        'gender',
        'occupation',
        'reasons_for_nomination',
        'no_of_nominations',
        'category_id',
        'user_id',
        'is_won',
        'is_admin_selected'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'bio' => 'string',
        'image' => 'string',
        'gender' => 'string',
        'occupation' => 'string',
        'reasons_for_nomination' => 'string',
        'no_of_nominations' => 'integer',
        'category_id' => 'integer',
        'user_id' => 'integer',
        'is_won' => 'boolean',
        'is_admin_selected' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
    public function category() {
        return $this->belongsTo('App\Models\Category');
    }   
}
