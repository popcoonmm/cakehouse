@extends('layouts.app_shop')
@section('title', 'MENU HOUSE1')
@section('content')
  <header>
      <div class="container">
           <a href='/' class="home">CAKE HOUSE</a>
           <a href='/house1' class="house1">トップへ</a>
      </div>

<div class="container-fluid col-md-6 mx-auto col-10">
  <h1 class="header-top" >MENU</h1>
     <a href='reserves/index' class="reservation">予約リストへ</a>
  </header>

	<div class="row">
@foreach($menus as $menu)
		<div class="col-md-4">
           <div class="menu-image">
@if ($menu->image_path)
            <img src="{{ $menu->image_path }}"class="aligncenter" style="width:100%;" />
@endif
           </div>
                    <div class="item">
                    {{ str_limit($menu->item, 150) }}
                    </div>
                    <div class="price">
                        <td>{{ str_limit($menu->price, 150) }}円</td>
                    </div>
                    <div class="allergy">
                        {{ str_limit($menu->allergies(), 150) }}
                    </div>
                    <div class="description mt-3">
                        {{ str_limit($menu->description, 300) }}
                    </div>
               <form action="{{ action('Reserve\ReserveController@create') }}" method="post" enctype="multipart/form-data">
                      <div class="form-item">{{ $menu->quantity }}注文数</div>
                       <select name="quantity">
                          <option value="0">選択してください</option>
                            <?php
                                 for ($i = 1; $i <= 10; $i++){
                                 echo "<option value='{$i}'>{$i}</option>";
                                 }
                                 ?>
                       </select>
                   {{ csrf_field() }}
                   <!--IDのタグをPOSTで一緒に送るためのタグ-->
                   <input type="hidden" name="menu_id" value="{{$menu->id}}">
                    <input type="submit"class="btn-secondary" value="予約リストへ">
                  </form>
        </div>
@endforeach
       </div>
    </div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#map">
  Mapを表示
</button>
	<div class="row">
		<div class="col-md-12">
        	<div class="modal fade" tabindex="-1" role="dialog" id="map" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <iframe src="https://maps.google.co.jp/maps?output=embed&q=渋谷駅"></iframe>
                 </div>
              </div>
            </div>
         </div>
@endsection
