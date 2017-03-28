<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'containers';

    protected $fillable = ['id', 'label'];

    /**
     * Get the items for the container.
     */
    public function items() {
        return $this->hasMany('App\Item');
    }
}
