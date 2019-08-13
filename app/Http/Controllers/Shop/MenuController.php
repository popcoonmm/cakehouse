<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use Storage;

class MenuController extends Controller
{
    public function add()
    {
        return view('shop.menu.create');
    }
    public function create(Request $request)
  {

      $this->validate($request, Menu::$rules);

      $menu = new Menu;
      $form = $request->all();

      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $menu->image_path = Storage::disk('s3')->url($path);
      } else {
          $menu->image_path = null;
      }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      $form["shop_id"] = Auth()->guard('shop')->user()->id;
      // $menu->timestamps = false;    // 追記
      // データベースに保存する
      $menu->fill($form);
      $menu->save();

      return redirect('shop/menu');
  }
   public function index(Request $request)
  {
      $cond_item = $request->cond_item;
      if (isset($cond_item)){
        $menu = Menu::menu_search($cond_item);
      }else{
        $menu=Menu::all();
      }

      return view('shop.menu.index', ['menu' => $menu, 'cond_item' => $cond_item]);
  }
  public function edit(Request $request)
  {
    $menu = Menu::find($request->id);
    if (empty($menu)) {
      abort(404);

  }
    return view('shop.menu.edit',['menu_form' => $menu]);
  }
  public function update(Request $request)
  {
    $this->validate($request,Menu::$rules);
    $menu = Menu::find($request->id);
    $menu_form = $request->all();
    if (isset($menu_form['image'])) {
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $menu->image_path = Storage::disk('s3')->url($path);
        unset($menu_form['image']);
      } elseif (isset($request->remove)) {
        $menu->image_path = null;
        unset($menu_form['remove']);
    unset($menu_form['_token']);
      }

    // $menu->fill($menu_form);
    // $menu->save();
    $menu->fill($menu_form)->save();
    return redirect('shop/menu');
  }
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $menu = Menu::find($request->id);
      // 削除する
      $menu->delete();
      return redirect('shop/menu');
  }

}
