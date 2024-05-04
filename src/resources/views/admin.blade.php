@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-button')
<form action="/logout" method="post">
    @csrf
    <button class="header-button">logout</button>
</form>
@endsection

@section('content')
<div class="container">
    <div class="container__heading">Admin</div>
    <div class="container__content">
        <!-- 検索欄 -->
        <div class="admin-search">
            <form class="search__form" action="/admin/search" method="get">
                @csrf
                <div class="search__text">
                    <input type="text" name="text" placeholder="名前やメールアドレスを入力してください" value="{{ request()->text ?? '' }}">
                </div>
                <div class="search__gender custom-icon">
                    <select name="gender">
                        <option value="" selected>性別</option>
                        <option value="" >全て</option>
                        <option value="1" {{ request()->gender == 1 ? 'selected' : '' }} >
                            男性
                        </option>
                        <option value="2" {{ request()->gender == 2 ? 'selected' : '' }} >
                            女性
                        </option>
                        <option value="3" {{ request()->gender == 3 ? 'selected' : '' }} >
                            その他
                        </option>
                    </select>
                </div>
                <div class="search__category  custom-icon">
                    <select name="category_id">
                        <option value="">お問い合わせの種類</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request()->category_id == $category->id ? 'selected' : '' }} >
                                {{ $category->content }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="search__date  custom-icon">
                    <input type="date" name="date" value="{{ request()->date ?? '' }}">
                </div>
                <div class="search__button">
                    <button class="admin-search__button--submit">検索</button>
                </div>
            </form>
            <div class="search__button">
                <button class="admin-search__button--reset" onclick="location.href='/admin'">リセット</button>
            </div>
        </div>

        <!-- エクスポートボタン＆ページネーション -->
        <div class="admin-export">
            @if( !($contacts->isEmpty()) )
            <form class="admin-export__button" action="/admin/export" method="get">
                <input type="hidden" name="text" value="{{ request()->text ?? '' }}">
                <input type="hidden" name="gender" value="{{ request()->gender ?? '' }}">
                <input type="hidden" name="category_id" value="{{ request()->category_id ?? '' }}">
                <input type="hidden" name="date" value="{{ request()->date ?? '' }}">
                <button class="admin-export__button-submit">エクスポート</button>
            </form>
            <div class="admin-export__pagination">
                {{ $contacts->appends(request()->query())->links('vendor.pagination.default') }}
            </div>
            @endif
        </div>

        <!-- 問い合わせ内容一覧 -->
        <table class="admin-table">
            <tr>
                <th class="column-name">お名前</th>
                <th class="column-gender">性別</th>
                <th class="column-mail">メールアドレス</th>
                <th class="column-category">お問い合わせの種類</th>
                <th class="column-button"></th>
            </tr>
            @foreach($contacts as $contact)
            <tr>
                <td class="column-name">
                    {{ $contact->last_name }}  {{ $contact->first_name }}
                </td>
                <td class="column-gender">
                    @switch($contact['gender'])
                        @case (1)
                            男性
                            @break
                        @case (2)
                            女性
                            @break
                        @case (3)
                            その他
                    @endswitch
                </td>
                <td class="column-mail">
                    {{ $contact->email }}
                </td>
                <td class="column-category">
                    {{ $contact->category->content }}
                </td>
                <td class="column-button">
                    <a class="admin-table__button" href="#modal-{{ $contact->id }}">詳細</a>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
</div>

<!-- モーダルウィンドウ -->
@foreach($contacts as $contact)
<div class="modal" id="modal-{{ $contact->id }}">
    
    <form class="modal-form" action="/admin/delete" method="post">
        @csrf
        <table class="modal-table">
            <tr>
                <th>お名前</th>
                <td>{{ $contact->last_name }}  {{ $contact->first_name }}</td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    @switch($contact->gender)
                        @case (1)
                            男性
                            @break
                        @case (2)
                            女性
                            @break
                        @case (3)
                            その他
                    @endswitch
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>{{ $contact->email }}</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>{{ $contact->tell }}</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>{{ $contact->address }}</td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>{{ $contact->building }}</td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td>{{ $contact->category->content }}</td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>{{ $contact->detail }}</td>
            </tr>
        </table>
        <input type="hidden" name="id" value="{{ $contact->id }}">
        <div class="modal-form__button">
            <button class="modal-form__button-submit" type="submit">削除</button>
        </div>
    </form>

    <div class="modal-close">
        <a href="#" class="modal-close__button">×</a>
    </div>
</div>
@endforeach

@endsection