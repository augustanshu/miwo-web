<?php

namespace App\Models\Goods;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model 
{
 protected $dates=['delete_at'];
 protected $table = 'brands';
     protected $casts = [
        'banner' => 'array',
        'images' => 'array',
    ];
	
	/*
 public function __construct()
 {
	 parent::__construct();
	  $this->initialize();
 }
 */
 
  public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('avatar', [
            'styles' => [
                'medium' => '300x300',
                'thumb' => '100x100'
            ]
        ]);
        parent::__construct();
        parent::__construct($attributes);
		$this->initialize();
    }
	
     /**
     * Initialize the modal variables.
     *
     * @return void
     */
    public function initialize()
    {
		$this->fillable = config('goods.brand.brand.listfields');
    }
}
