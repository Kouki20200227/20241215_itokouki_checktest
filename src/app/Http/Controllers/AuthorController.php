<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    // 入力画面表示処理
    public function index(){
        $categories = Category::all();
        return view('index', ['categories' => $categories]);
    }

    // 確認画面表示処理
    public function confirm(AuthorRequest $request){
        $category = Category::find($request->category_id);
        return view('confirm', ['confirm' => $request, 'category' => $category]);
    }
    // 登録処理
    public function create(Request $request){
        // 修正ボタンを押した時の処理
        if ($request->input('back') == 'back'){
            return redirect('/')->withInput();
        }

        // 登録処理
        $form = [
            'category_id' => $request->category_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'tel' => $request->tell1 . $request->tell2 . $request->tell3,
            'address' => $request->address,
            'building' => $request->building,
            'detail' => $request->detail,
        ];
        Contact::create($form);
        return view('thanks');
    }

    public function test(){
        return view('thanks');
    }
}
