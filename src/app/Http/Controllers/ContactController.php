<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    // トップページ表示用アクション
    public function index()
    {
        // カテゴリー取得
        $categories = Category::all();

        // フォーム表示用データの作成
        // （表示するものが無いので全てnullで渡す）
        $contact = [
            'first_name' => null,
            'last_name' => null,
            'gender' => null,
            'email' => null,
            'tell_first' => null,
            'tell_second' => null,
            'tell_third' => null,
            'address' => null,
            'building' => null,
            'category_id' => null,
            'detail' => null,
        ];
        return view('index', compact('categories', 'contact'));
    }

    // フォーム修正用アクション
    public function modify(Request $request)
    {
        // カテゴリー取得
        $categories = Category::all();

        // フォーム表示用データの取得
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'tell_first',
            'tell_second',
            'tell_third',
            'address',
            'building',
            'category_id',
            'detail',
        ]);
        // dd($contact);
        return view('index', compact('categories', 'contact'));
    }

    // フォーム確認ページ表示用アクション
    public function confirm(ContactRequest $request)
    {
        // 確認表示用データの取得
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'tell_first',
            'tell_second',
            'tell_third',
            'address',
            'building',
            'category_id',
            'detail',
        ]);

        // 電話番号を一つの文字列に結合
        $tell = $contact['tell_first'].'-'.$contact['tell_second'].'-'.$contact['tell_third'];
        $contact['tell'] = $tell;

        // カテゴリー文字列を取得
        $category = Category::find($contact['category_id']);
        $contact['category_content'] = $category->content;

        // dd($contact);
        return view('confirm', compact('contact'));
    }

    // レコード登録＆サンクス画面表示用アクション
    public function store(Request $request)
    {
        // 登録用データ取得
        $contact = $request->only([
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tell',
            'address',
            'building',
            'detail',
        ]);

        // レコード登録
        Contact::create($contact);
        
        // サンクス画面へ遷移
        return redirect('/thanks');
    }

    public function thanks()
    {
        return view('thanks');
    }
}

