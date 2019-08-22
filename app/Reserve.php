<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
  protected $guarded = array('id');

   
    public static $rules = array(
        'quantity' => 'required',
      // id	product_number	users_number	quantity	menu_id	item	price	description	created_at	updated_at
　　　//ルールを書く　マイグレーションファイルに入れる

    );
    // protected $fillable = [
    //   'menu_id','product_number','price','item','users_number','quantity',
    //   ];
    public function menu() {
      return $this->belongsTo('App\Menu');//belongsToは$reservekから$menuに入れることができる便利なやつ
    }
    //belongsToの中身　
    // public function menu() {
    //   return Menu::find($this->menu_id);
    // }
}

//追加
