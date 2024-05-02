@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-button')
<button class="header-button" onclick="location.href='/register'">register</button>
@endsection

@section('content')
<div class="background"></div>
<div class="container">
    <div class="container__heading">Login</div>
    <div class="container__content">
        <form action="/login" class="login-form" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group-title">メールアドレス</div>
                <input type="text" class="form__group-input" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                <div class="form__group-error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">パスワード</div>
                <input type="text" class="form__group-input" name="password" placeholder="caochtech1106">
                <div class="form__group-error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection