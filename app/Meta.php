<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'meta';

    /**
     * Get the item of the meta data.
     */
    public function item() {
        return $this->belongsTo('App\Item');
    }
}
