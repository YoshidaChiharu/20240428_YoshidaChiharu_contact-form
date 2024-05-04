<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    // 管理画面表示用アクション
    public function admin()
    {
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();

        return view('admin', compact(['contacts', 'categories']));
    }

    // 検索アクション
    public function search(Request $request)
    {
        $contacts = Contact::with('category')
                            ->KeywordSearch($request->text)
                            ->GenderSearch($request->gender)
                            ->CategorySearch($request->category_id)
                            ->DateSearch($request->date)
                            ->paginate(7);
        $categories = Category::all();

        return view('admin', compact(['contacts', 'categories']));
    }

    // 削除アクション
    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();

        return redirect('/admin');
    }

    // csvエクスポートアクション
    public function export(Request $request)
    {
        $contacts = Contact::with('category')
                            ->KeywordSearch($request->text)
                            ->GenderSearch($request->gender)
                            ->CategorySearch($request->category_id)
                            ->DateSearch($request->date)
                            ->get();
        $csv_data = $contacts->toArray();

        if( !empty($csv_data) ) {
            $csv_header = array_keys($csv_data[0]);

            return response()->streamDownload(
                function () use ($csv_header, $csv_data) {
                    $handle = fopen('php://output', 'w');
                    fputcsv($handle, $csv_header);
                    foreach($csv_data as $row) {
                        unset($row['category']);
                        fputcsv($handle, $row);
                    }
                    fclose($handle);
                },
                'contacts.csv'
            );
        } else {
            return redirect('/admin');
        }
    }

}

