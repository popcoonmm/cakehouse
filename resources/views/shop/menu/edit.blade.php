@extends('layouts.house')
@section('title', 'メニューの編集')
@section('content')
   <div id ="app">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>menuの編集</h1>
                <form action="{{ action('Admin\MenuController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                     <div class="form-group row">
                        <lable class="col-md-2" for="item">商品名</lable>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="item" value="{{ $menu_form->item }}">
                        </div>
                    </div>
                        <div class="form-group row">
                        <lable class="col-md-2" for="price">値段</lable>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="price" value="{{ $menu_form->price}}">
                        </div>
                    </div>
                    
                     <div class="form-group row">
                        <lable class="col-md-2" for="allergy">アレルギー</lable>
                        <div class="col-md-8">
                            <input type="checkbox" name="allergy_egg" value="{{ $menu_form->allergy_egg}}">鶏卵
                            <input type="checkbox" name="allergy_milk" value="{{ $menu_form->allergy_milk}}">乳
                            <input type="checkbox" name="allergy_wheat" value="{{ $menu_form->allergy_wheat}}">小麦
                            <input type="checkbox" name="allergy_nuts" value="{{ $menu_form->allergy_nuts}}">ナッツ類
                           <input type="checkbox" name="allergy_fruit" value="{{ $menu_form->allergy_fruit}}">果物
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <lable class="col-md-2" for="description">商品説明</lable>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                        </div>
                    </div>
                  <div class="form-group row">
                        <label class="col-md-2" for="image">商品画像</label>
                        <div class="col-md-8">
                            <input type="file" class="form-control-file" name="image">
                             <div class="form-text text-info">設定中: {{$menu_form->image_path }}
                  </div>
                  <div class="form-group row">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                      </label>
                  </div>
                        </div>
                    </div>
                    <div class="form-group row">
                     <div class="col-md-10">
                       <input type="hidden" name="id" value="{{$menu_form->id }}">

                    {{ csrf_field() }}
                    <input type="submit" class="btn-secondary" value="更新">
                    
                </form>
          </div>
        </div>
       </div>   
      </div>
     </div>
    </div>
   </div>
  </div>
  @endsection