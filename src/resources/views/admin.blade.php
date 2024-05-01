@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-button')
<form action="">
    <button class="header-button">logout</button>
</form>
@endsection


@section('content')
<div class="container">
    <div class="container__heading">Admin</div>
    <div class="container__content">
        <!-- 検索欄 -->
        <div class="admin-search">
            <div class="search__text">
                <input type="text" placeholder="名前やメールアドレスを入力してください">
            </div>
            <div class="search__select">
                <select name="" id="">
                    <option value="">性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
            </div>
            <div class="search__select">
                <select name="" id="">
                    <option value="">お問い合わせの種類</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>
            <div class="search__select">
                <input type="date">
            </div>
            <div class="search__button">
                <button class="admin-search__button--submit">検索</button>
            </div>
            <div class="search__button">
                <button class="admin-search__button--reset">リセット</button>
            </div>
        </div>

        <!-- エクスポートボタン＆ページネーション -->
        <div class="admin-export">
            <div class="admin-export__button">
                <button>エクスポート</button>
            </div>
            <div class="admin-export__pagenation">< 1 2 3 4 5 ></div>
        </div>

        <!-- 問い合わせ内容一覧 -->
        <table class="admin-table">
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
            <tr>
                <td>山田  太郎</td>
                <td>男性</td>
                <td>test@example.com</td>
                <td>商品の交換について</td>
                <td>
                    <button class="admin-table__button">詳細</button>
                </td>
            </tr>
            <tr>
                <td>山田  太郎</td>
                <td>男性</td>
                <td>test@example.com</td>
                <td>商品の交換について</td>
                <td>
                    <button class="admin-table__button">詳細</button>
                </td>
            </tr>
            <tr>
                <td>山田  太郎</td>
                <td>男性</td>
                <td>test@example.com</td>
                <td>商品の交換について</td>
                <td>
                    <button class="admin-table__button">詳細</button>
                </td>
            </tr>
        </table>

    </div>
</div>
@endsection