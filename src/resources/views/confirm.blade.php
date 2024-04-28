@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="container__heading">confirm</div>
    <div class="container__content">

        <!-- 送信用フォーム -->
        <form action="/thanks" class="confirm-form" method="post">
            @csrf
            <table class="confirm-table">
                <tr>
                    <th>お名前</th>
                    <td>山田  太郎</td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>男性</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>test@example.com</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>08012345678</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>東京都渋谷区千駄ヶ谷1-2-3</td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>千駄ヶ谷マンション101</td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>category1</td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>サンプルテキスト</td>
                </tr>
            </table>
            <!-- 値送信用の隠しパラメータ -->
            <input type="hidden" name="first_name" value="">
            <input type="hidden" name="last_name" value="">
            <input type="hidden" name="gender" value="">
            <input type="hidden" name="email" value="">
            <input type="hidden" name="tell" value="">
            <input type="hidden" name="address" value="">
            <input type="hidden" name="building" value="">
            <input type="hidden" name="category_id" value="">
            <input type="hidden" name="detail" value="">            
            <div class="form__button">
                <button class="form__button-submit" type="submit">送信</button>
            </div>
        </form>

        <!-- 修正用フォーム -->
        <form action="/" class="modify-form" method="post">
            @csrf
            <!-- 値送信用の隠しパラメータ -->
            <input type="hidden" name="first_name" value="">
            <input type="hidden" name="last_name" value="">
            <input type="hidden" name="gender" value="">
            <input type="hidden" name="email" value="">
            <input type="hidden" name="tell" value="">
            <input type="hidden" name="address" value="">
            <input type="hidden" name="building" value="">
            <input type="hidden" name="category_id" value="">
            <input type="hidden" name="detail" value="">
            <button class="form__button-modify" type="submit">修正</button>
        </form>

    </div>
</div>

@endsection