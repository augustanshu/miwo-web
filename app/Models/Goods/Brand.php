<?php

namespace App\Models\Goods;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Brand extends Model  implements StaplerableInterface
{
 use EloquentTrait;	
	
 protected $dates=['delete_at'];
 protected $table = 'brands';
 protected $fillable=['id','brand_initial','brand_name','class_id','brand_status','avatar'];
	
	
	/*
 public function __construct(array $attributes = array())
 {
	 parent::__construct($attributes);
	  
 }
 */
 
 
  public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('avatar', [
            'styles' => [
                'medium' => '300x300',
                'thumb' => '100x100'
            ]
        ]);
        parent::__construct($attributes);
    }
	
     /**
     * Initialize the modal variables.
     *
     * @return void
     */
    public function initialize()
    {
		
    }
}
