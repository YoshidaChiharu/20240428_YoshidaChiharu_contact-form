<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function admin()
    {
        // カテゴリー取得
        $categories = Category::all();

        // 問い合わせ一覧取得
        $contacts = Contact::with('category')->paginate(7);

        return view('admin', compact(['categories', 'contacts']));
    }
}
