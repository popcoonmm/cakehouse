<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_list extends Model
{
    public static $rules = array(
      //ルールかく
    );
    public function user()
    {
        return $this->blongsTo('App\User');
    }
}
