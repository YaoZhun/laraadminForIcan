<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game_permission extends Model
{
    use SoftDeletes;
	
	protected $table = 'game_permissions';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];
}
