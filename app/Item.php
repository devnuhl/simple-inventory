<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * Get the meta fields for the item.
     */
    public function metas() {
        return $this->hasMany('App\Meta');
    }

    /**
     * Get the container of the item.
     */
    public function container() {
        return $this->belongsTo('App\Container');
    }
}
