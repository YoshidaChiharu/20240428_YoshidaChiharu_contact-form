<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function admin()
    {
        $query = Contact::with('category');
        // csvエクスポート用のID配列作成
        $contacts_all = $query->get();
        $contacts_id[] = null;
        foreach($contacts_all as $contact) {
            $contacts_id[] = $contact->id;
        }
        // 問い合わせ内容取得（ページネーション表示用）
        $contacts = $query->paginate(7);

        // 問い合わせ種別を全取得
        $categories = Category::all();

        return view('admin', compact(['contacts_id', 'contacts', 'categories']));
    }

    public function search(Request $request)
    {
        $query = Contact::with('category')
                            ->KeywordSearch($request->text)
                            ->GenderSearch($request->gender)
                            ->CategorySearch($request->category_id)
                            ->DateSearch($request->date);
        // csvエクスポート用のID配列作成
        $contacts_all = $query->get();
        $contacts_id[] = null;
        foreach($contacts_all as $contact) {
            $contacts_id[] = $contact->id;
        }
        // 検索結果の取得（ページネーション表示用）
        $contacts = $query->paginate(7);

        // 問い合わせ種別を全取得
        $categories = Category::all();

        return view('admin', compact(['contacts_id', 'contacts', 'categories']));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();

        return redirect('/admin');
    }

    public function export(Request $request)
    {
        $header = [
            'id',
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tell',
            'address',
            'building',
            'detail',
            'created_at',
            'updated_at',
        ];
        $contacts = Contact::findMany($request->contacts_id);
        $csv_data = $contacts->toArray();
        // dd($contacts, $csv_data);

        return response()->streamDownload(
            function () use ($header, $csv_data) {
                $handle = fopen('php://output', 'w');
                fputcsv($handle, $header);
                foreach($csv_data as $row) {
                    unset($row['category']);
                    fputcsv($handle, $row);
                }
                fclose($handle);
            },
            'contacts.csv'
        );
    }

}

