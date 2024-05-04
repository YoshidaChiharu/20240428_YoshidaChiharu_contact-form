@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="container__heading">Confirm</div>
    <div class="container__content">

        <!-- 送信用フォーム -->
        <form action="/thanks" class="confirm-form" method="post">
            @csrf
            <table class="confirm-table">
                <tr>
                    <th>お名前</th>
                    <td>{{ $contact['last_name'] }}&emsp;{{ $contact['first_name'] }}</td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>
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
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{ $contact['email'] }}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{ $contact['tell'] }}</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>{{ $contact['address'] }}</td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>{{ $contact['building'] }}</td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>{{ $contact['category_content'] }}</td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>{{ $contact['detail'] }}</td>
                </tr>
            </table>
            <!-- 登録用パラメータ -->
            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
            <input type="hidden" name="email" value="{{ $contact['email'] }}">
            <input type="hidden" name="tell" value="{{ $contact['tell'] }}">
            <input type="hidden" name="address" value="{{ $contact['address'] }}">
            <input type="hidden" name="building" value="{{ $contact['building'] }}">
            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
            <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
            <div class="form__button">
                <button class="form__button-submit" type="submit">送信</button>
            </div>
        </form>

        <!-- 修正用フォーム -->
        <form action="/" class="modify-form" method="post">
            @csrf
            <!-- トップページへの戻りで渡すパラメータ -->
            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
            <input type="hidden" name="email" value="{{ $contact['email'] }}">
            <input type="hidden" name="tell_first" value="{{ $contact['tell_first'] }}">
            <input type="hidden" name="tell_second" value="{{ $contact['tell_second'] }}">
            <input type="hidden" name="tell_third" value="{{ $contact['tell_third'] }}">
            <input type="hidden" name="address" value="{{ $contact['address'] }}">
            <input type="hidden" name="building" value="{{ $contact['building'] }}">
            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
            <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
            <button class="form__button-modify" type="submit">修正</button>
        </form>

    </div>
</div>

@endsection