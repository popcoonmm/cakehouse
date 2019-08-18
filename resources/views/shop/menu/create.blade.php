@extends('layouts.app_shop')
@section('title', 'メニューの新規作成')
@section('content')
     <div id ="app">
       <div class="cotainer">
         <div class="row">
            <div class="col-md-8 mx-auto">
             <h1>Newmenu</h1>
      <form action="{{ action('Shop\MenuController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
<h2>{{Auth::guard('shop')->user()->name}}</h2>
                     <div class="form-group row">
                        <lable class="col-md-2" for="item">商品名</lable>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="item" value="{{ old('item') }}">
                        </div>
                    </div>
                        <div class="form-group row">
                        <lable class="col-md-2" for="price">値段</lable>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                        </div>
                    </div>

                     <div class="form-group row">
                        <lable class="col-md-2" for="allergy">アレルギー</lable>
                        <div class="col-md-4">
                            <input type="checkbox" name="allergy_egg" value="鶏卵" id="allergy_egg"><label for="allergy_egg">鶏卵</label>
                            <input type="checkbox" name="allergy_milk" value="乳" id="allergy_milk"><label for="allergy_milk">乳</label>
                            <input type="checkbox" name="allergy_wheat" value="小麦" id="allergy_wheat"><label for="allergy_wheat">小麦</label>
                            <input type="checkbox" name="allergy_nuts" value="ナッツ類" id="allergy_nuts"><label for="allergy_nuts">ナッツ類</label>
                           <input type="checkbox" name="allergy_fruit" value="果物" id="allergy_fruit"><label for="allergy_fruit">果物</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <lable class="col-md-2" for="description">商品説明</lable>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-2" for="image">商品画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>


                    {{ csrf_field() }}
                    <input type="submit"class="btn-secondary" value="更新">


            </form>
           </div>
          </div>
        </div>
      </div>
@endsection
