<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function admin()
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->paginate(7);

        return view('admin', compact(['categories', 'contacts']));
    }

    public function search(Request $request)
    {
        // dd($request);
        $categories = Category::all();
        $contacts = Contact::with('category')
                            ->KeywordSearch($request->text)
                            ->GenderSearch($request->gender)
                            ->CategorySearch($request->category_id)
                            ->DateSearch($request->date)
                            ->paginate(7);

        return view('admin', compact(['categories', 'contacts']));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();

        return redirect('/admin');
    }

}

