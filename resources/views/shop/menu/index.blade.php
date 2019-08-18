@extends('layouts.app_shop')
@section('title','メニュー一覧')
@section('content')
 <div id ="app">
       <div class="cotainer">
         <div class="row">
            <div class="col-md-8 mx-auto">
             <h1>Newmenu</h1>
              <a href='menu/create'class="">MENU CREATE</a>
      <div class="container">
        <div class="row">
          <p>商品検索</p>
            <div class="col-lg-6">
                <form action="{{ action('Shop\MenuController@index') }}" method="get">
                  <input type="text" class="form-control" name="cond_item" value="{{ $cond_item }}">
            </div>

{{ csrf_field() }}
                <div class="col-lg-2">
                  <input type="submit" class="btn-secondary " value="検索">
                </form>
              </div>

            <div class="list-menu col-md-12 mx-auto">
                <table class="table table-outline-secondary">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="15%">商品名</th>
                            <th width="15%">値段</th>
                            <th width="20%">アレルギー</th>
                            <th width="20%">商品紹介</th>
                            <th width="10%">商品画像</th>
                            <th eidth="20%">編集</th>
                        </tr>
                    </thead>
                      <tbody>
@foreach($menu as $menu)
                    <tr>
                                <th>{{ $menu->id }}</th>
                                <td>{{ str_limit($menu->item, 10) }}</td>
                                <td>{{ str_limit($menu->price, 10) }}円</td>
                                <td> <span>{{ $menu->allergies() }}</span></td>
                                <td>{{ str_limit($menu->description, 20) }}</td>
                                <td><img src="{{ $menu->image_path }}" width="50" height="50"></td>
                            <td>
                              <div>
                                <a href="{{ action('Shop\MenuController@edit', ['id' => $menu->id]) }}" role="button" class="btn-secondary">編集</a>
                              </div>
                                <div>
                                  <a href="{{ action('Shop\MenuController@delete', ['id' => $menu->id]) }}" role="button" class="btn-secondary">削除</a>
                                </div>
                            </td>
                    </tr>
@endforeach
                     </tbody>
                 </table>
               </div>
             </div>
          </div>
       </div>
     </div>
   </div>
</div>
@endsection
