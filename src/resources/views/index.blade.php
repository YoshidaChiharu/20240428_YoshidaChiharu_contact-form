@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="container__heading">Contact</div>
    <div class="container__content">
        <form action="/confirm" class="contact-form" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group-title">お名前 ※</div>
                <div class="form__group-content">
                    <div class="form__input--text input-name">
                        <input type="text" name="first_name" placeholder="例: 山田">
                    </div>
                    <div class="form__input--text input-name">
                        <input type="text" name="last_name" placeholder="例: 太郎">
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">性別 ※</div>
                <div class="form__group-content">
                    <div class="form__input--radio">
                        <input type="radio" id="male" name="gender" value="男性">
                        <label for="male">男性</label>
                        <input type="radio" id="female"  name="gender" value="女性">
                        <label for="female">女性</label>
                        <input type="radio" id="other" name="gender" value="その他">
                        <label for="other">その他</label>
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">メールアドレス ※</div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" placeholder="例: test@example.com">
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">電話番号 ※</div>
                <div class="form__group-content">
                    <div class="form__input--text input-tell">
                        <input type="tel" name="tell_first"  placeholder="080">
                    </div>
                    <span>-</span>
                    <div class="form__input--text input-tell">
                        <input type="tel" name="tell_second" placeholder="1234">
                    </div>
                    <span>-</span>
                    <div class="form__input--text input-tell">
                        <input type="tel" name="tell_third" placeholder="5678">
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">住所 ※</div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">建物名</div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101">
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">お問い合わせの種類 ※</div>
                <div class="form__group-content">
                    <div class="form__input--text input-category">
                        <select name="category_id">
                            <option value="" selected>選択してください</option>
                            <option value="">category1</option>
                            <option value="">category2</option>
                            <option value="">category3</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">お問い合わせ内容 ※</div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <textarea name="detail" cols="30" rows="10" placeholder="お問い合わせ内容をご記入ください"></textarea>
                    </div>
                </div>
            </div>

            <div class="form__button">
                <button class="form__button-submit" type="submit">確認画面</button>
            </div>

        </form>
    </div>
</div>
@endsection