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
        $categories = Category::all();

        return view('index', compact('categories'));
    }

    // フォーム修正用アクション
    public function modify(Request $request)
    {
        $categories = Category::all();

        $contact = $request->all();
        unset($contact['_token']);

        return view('index', compact('categories', 'contact'));
    }

    // フォーム確認ページ表示用アクション
    public function confirm(ContactRequest $request)
    {
        $contact = $request->all();
        unset($contact['_token']);

        // 電話番号を一つの文字列に結合
        $tell = $contact['tell_first'].'-'.$contact['tell_second'].'-'.$contact['tell_third'];
        $contact['tell'] = $tell;

        // カテゴリー名称取得
        $category = Category::find($contact['category_id']);
        $contact['category_content'] = $category->content;

        return view('confirm', compact('contact'));
    }

    // フォーム登録アクション
    public function store(Request $request)
    {
        $contact = $request->all();
        unset($contact['_token']);
        Contact::create($contact);
        
        return redirect('/thanks');
    }

    // サンクス画面表示用アクション
    public function thanks()
    {
        return view('thanks');
    }
}

