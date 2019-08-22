<?php

namespace App\Http\Controllers\Order_list;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order_list;
use  App\Reserve;
use Storage;
use Illuminate\Support\Facades\Auth;

class Order_listsController extends Controller
{
    public function create(Request $request)
    {
      $this->validate($request,Order_list::$rules);
     
      $form = $request->all();
      
      unset($form['_token']);
// dd($form);
      for ($i = 0;$i <  $form['loop_times']; $i++) {
          $order_list = new Order_list;
          $order_list->back_number = "P-1";
          $order_list->product_number= $form['product_number_'.$i];
          $order_list->users_number = $form['users_number_'.$i];
          $order_list->quantity = $form['quantity_'.$i];
          $order_list->price = $form['price_'.$i];
          $order_list->description = $form['description_'.$i];
          $order_list->menu_id = $form['menu_id_'.$i];
          $order_list->user_id = Auth::guard("user")->user()->id;
          $order_list->save();
          //セーブしたら削除する
          Reserve::find($form['reserve_id_'.$i])->delete();
          
      }
      
       
       return redirect('home');
    }
}