<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InquiryRequest;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class InquiryFormController extends Controller
{
    public function index()
    {
    $categories = Category::all(); //すべてのカテゴリを取得
    return view('index',compact('categories'));
    }

    public function confirm(InquiryRequest $request)
    {

        $inputs = $request->all();
        $category = Category::find($inputs['category_id']);

        return view('contact.confirm', [
            'inputs' => $inputs,
            'category_name' => $category->content ?? '',
        ]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'tel' => $request->input('tel1') . '-' . $request->input('tel2') . '-' . $request->input('tel3')
        ]);

        // 入力をまとめて取得
        $inputs = $request->all();

        // 電話番号を結合（分割入力の場合）
        $tel = $inputs['tel1'] . '-' . $inputs['tel2'] . '-' . $inputs['tel3'];

        // 保存処理
        Contact::create([
            'last_name' => $inputs['last_name'],
            'first_name' => $inputs['first_name'],
            'gender' => $inputs['gender'],
            'email' => $inputs['email'],
            'tel' => $tel,
            'address' => $inputs['address'],
            'building' => $inputs['building'] ?? null,
            'category_id' => $inputs['category_id'],
            'detail' => $inputs['detail'],
        ]);

        return redirect()->route('contact.thanks');
    }

    public function thanks()
    {
        return view('contact.thanks');
    }

    public function admin(Request $request)
    {
        $query = Contact::query()->with('category');

        // 名前 or メール
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', "%$keyword%")
                    ->orWhere('last_name', 'like', "%$keyword%")
                    ->orWhere('email', 'like', "%$keyword%");
            });
        }

        // 性別
        if ($request->filled('gender')) {
            $query->where('gender', $request->input('gender'));
        }

        // カテゴリ
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        // 日付
        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->input('created_at'));
        }

        $contacts = $query->orderByDesc('created_at')->paginate(7);
        $categories = Category::all();

        return view('contact.admin', compact('contacts', 'categories'));
    }

    public function export(Request $request)
    {
        $query = Contact::query();

        // 検索条件があれば絞り込む
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('last_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('first_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        $contacts = $query->get();

        $csvHeader = [
            'ID',
            '姓',
            '名',
            '性別',
            'メールアドレス',
            '電話番号',
            '住所',
            '建物名',
            'お問い合わせの種類',
            'お問い合わせ内容',
            '登録日時',
        ];

        $csvData = $contacts->map(function ($contact) {
            return [
                $contact->id,
                $contact->last_name,
                $contact->first_name,
                ['1' => '男性', '2' => '女性', '3' => 'その他'][$contact->gender] ?? '',
                $contact->email,
                $contact->tel,
                $contact->address,
                $contact->building,
                $contact->category->content ?? '',
                $contact->detail,
                $contact->created_at->format('Y-m-d H:i:s'),
            ];
        });

        $filename = 'contacts.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename={$filename}",
        ];

        $callback = function () use ($csvHeader, $csvData) {
            $file = fopen('php://output', 'w');

            // ここがポイント：UTF-8 BOMを出力する
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            fputcsv($file, $csvHeader);

            foreach ($csvData as $row) {
                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)?->delete();

        return redirect()->route('contact.admin')->with('status', '削除しました');
    }

    public function back(Request $request)
    {
        return redirect()
            ->route('index')
            ->withInput(); // ← これで入力値が old() で使えるようになる
    }

    public function show($id)
    {
        $contact = Contact::with('category')->findOrFail($id);
        return response()->json($contact);
    }
}