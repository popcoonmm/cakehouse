<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
  protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'quantity' => 'required',
      // id	product_number	users_number	quantity	menu_id	item	price	description	created_at	updated_at


    );
    // protected $fillable = [
    //   'menu_id','product_number','price','item','users_number','quantity',
    //   ];
    public function menu() {
      return $this->belongsTo('App\Menu');//belongsToは$menuから$reserveに入れることができる便利なやつ
    }
}

//追加
