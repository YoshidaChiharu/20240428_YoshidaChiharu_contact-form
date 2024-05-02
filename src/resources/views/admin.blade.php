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
                    <input type="text" placeholder="名前やメールアドレスを入力してください">
                </div>
                <div class="search__gender custom-icon">
                    <select name="" id="">
                        <option value="">性別</option>
                        <option value="1">男性</option>
                        <option value="2">女性</option>
                        <option value="3">その他</option>
                    </select>
                </div>
                <div class="search__category  custom-icon">
                    <select name="" id="">
                        <option value="">お問い合わせの種類</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->content }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="search__date  custom-icon">
                    <input type="date">
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
            <div class="admin-export__button">
                <button>エクスポート</button>
            </div>
            <div class="admin-export__pagenation">
                {{ $contacts->links('vendor.pagination.default') }}
            </div>
            <!-- <div class="admin-export__pagenation">< 1 2 3 4 5 ></div> -->
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
                    <button class="admin-table__button">詳細</button>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
</div>
@endsection