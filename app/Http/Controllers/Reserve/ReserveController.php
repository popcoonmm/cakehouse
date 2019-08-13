<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Reserve;
use Storage;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
     public function index()
    {
      
      $reserves = Reserve::all();
      
        return view('reserves.index',['reserves' => $reserves]);
        // dd($reserves);heroku
    }
    
     public function create(Request $request)
    {
      
      $this->validate($request,Reserve::$rules);
      
      $reserve = new Reserve;
      $form = $request->all();
      
      unset($form['_token']);
   
    
      
      $reserve->fill($form);
      $reserve->user_id = Auth::user()->id;
      
      $reserve->save();
       
       return redirect('home');
    }
    
  public function edit(Request $request)
  {
    $res = Reserve::find($request->id);
    if (empty($res)) {
      abort(404);
    }
    return view('reserves.edit',['reserve' => $res]);
  }
  
  public function update(Request $request)
  {
    $this->validate($request,Reserve::$rules);
    $reserve = Reserve::find($request->id);
    $reserve_form = $request->all();
    unset($reserve_form['_token']);
    $reserve->fill($reserve_form)->save();
    return redirect('reserves/index');
  }
    public function delete(Request $request)
  {
     $reserve = Reserve::find($request->id);
      // 削除する
      $reserve->delete();
      return redirect('home');
  }
}