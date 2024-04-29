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
                        <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name', $contact['last_name']) }}">
                        <div class="form__error">
                            @error('last_name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form__input--text input-name">
                        <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name', $contact['first_name']) }}">
                        <div class="form__error">
                            @error('first_name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">性別 ※</div>
                <div class="form__group-content">
                    <div class="form__input--radio">
                        <input type="radio" id="male" name="gender" value="1" checked>
                        <label for="male">男性</label>
                        <input type="radio" id="female"  name="gender" value="2" {{ old('gender', $contact['gender']) == 2 ? 'checked' : '' }}>
                        <label for="female">女性</label>
                        <input type="radio" id="other" name="gender" value="3" {{ old('gender', $contact['gender']) == 3 ? 'checked' : '' }}>
                        <label for="other">その他</label>
                        <div class="form__error">
                            @error('gender')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">メールアドレス ※</div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email', $contact['email']) }}">
                        <div class="form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">電話番号 ※</div>
                <div class="form__group-content">
                    <div class="form__input--text input-tell">
                        <input type="tel" name="tell_first"  placeholder="080" value="{{ old('tell_first', $contact['tell_first']) }}">
                        <div class="form__error">
                            @error('tell_first')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <span>-</span>
                    <div class="form__input--text input-tell">
                        <input type="tel" name="tell_second" placeholder="1234" value="{{ old('tell_second',$contact['tell_second']) }}">
                        <div class="form__error">
                            @error('tell_second')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <span>-</span>
                    <div class="form__input--text input-tell">
                        <input type="tel" name="tell_third" placeholder="5678" value="{{ old('tell_third', $contact['tell_third']) }}">
                        <div class="form__error">
                            @error('tell_third')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">住所 ※</div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address', $contact['address']) }}">
                        <div class="form__error">
                            @error('address')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">建物名</div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building', $contact['building']) }}">
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">お問い合わせの種類 ※</div>
                <div class="form__group-content">
                    <div class="form__input--text input-category">
                        <select name="category_id">
                            <option value="" disabled selected>選択してください</option>
                            @foreach($categories as $category)
                                <!-- <option value="{{ $category->id }}" @if($category->id == $contact['category_id']) selected @endif > -->
                                <option value="{{ $category->id }}" {{ old('category_id', $contact['category_id']) == $category->id ? 'selected' : '' }} >
                                    {{ $category->content }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form__error">
                            @error('category_id')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">お問い合わせ内容 ※</div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <textarea name="detail" cols="30" rows="10" placeholder="お問い合わせ内容をご記入ください">{{ old('detail', $contact['detail']) }}</textarea>
                        <div class="form__error">
                            @error('detail')
                            {{ $message }}
                            @enderror
                        </div>
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