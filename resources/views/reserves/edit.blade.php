@extends('layouts.house')
@section('title', '予約の変更')
@section('content')
  <header>
      <div class="container">
           <a href='/' class="home">CAKE HOUSE</a>
           <a href='/house1' class="house1">トップへ</a>
      </div>
              
<div class="container-fluid col-md-6 mx-auto col-10">
  <h1 class="header-top" >Change of reservation</h1>
     <a href='/reserves/index' class="reservation">予約リストへ</a>
  </header>
  
            <div class="container">
                <div class="row">
                    <table class="table table-outline-secondary">
                        <thead>
                            <tr>
                                <th width="15%">商品名</th>
                                <th width="15%">値段</th>
                                <th width="20%">注文数</th>
                                <th width="15%">商品詳細</th>
                                <th width="10%">商品画像</th>
                                <th eidth="20%">編集</th>
                            </tr>
                        </thead>
                         <tbody>
                             
                          <form action="{{ action('ReserveController@update',['id' =>$reserve->id]) }}" method="post" enctype="multipart/form-data">   
                           <tr>
                                   <td>{{ $reserve->menu->item }}</td>
                                    <td>{{ $reserve->menu->price * $reserve->quantity  }}円</td>
                                   
                                    <td>
                                       <select name="quantity">
                          <option value="0">選択してください</option>
                           <?php
                                 for ($i = 1; $i <= 10; $i++){
                                 echo "<option value='{$i}'>{$i}</option>";
                                 }
                                 ?>
                    <td>{{ str_limit($reserve->menu->description, 20) }}</td>
                                    <td><img src="{{ $reserve->menu->image_path }}" width="50" height="50"></td>
                                      </select>
                             <td>
                              
                                <div>
                                  <a href="{{ action('ReserveController@delete', ['id' =>$reserve->id]) }}" role="button" class="btn-secondary">キャンセル</a>
                                </div>
                             </td>
                        
                           </tr>
                         </tbody>
                    </table>
                         {{ csrf_field() }}
                   <!--IDのタグをPOSTで一緒に送るためのタグ-->
                   <input type="hidden" name="menu_id" value="{{ $reserve->menu->id }}">
                   
                    <input type="submit"class="btn-secondary" value="更新">
                    
                  
                </form>
                <script type="text/javascript" >
                    $(function(){
                       $("select[name='quantity'] option[value='{{ $reserve->quantity }}']").attr("selected","selected");
                       
                    });
                    
                </script>
               </div>
            </div>
         </div>
     </div>
@endsection
