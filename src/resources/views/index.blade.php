@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--name">
                    <div class="form__input--last-name">
                        <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}" />
                    </div>
                    <div class="form__input--first-name">
                        <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}" />
                    </div>
                </div>
                <div class="form__error">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                        <input class="input-gender" type="radio" id="male" name="gender" value="1" {{ old('gender')==1 || old('gender')==null ? 'checked' : '' }} />
                        <label class="gender-label" for="men" value="男性">男性</label>
                        <input class="input-gender" type="radio" id="female" name="gender" value="2" {{ old('gender')==2 ? 'checked' : '' }} />
                        <label class="gender-label" for="female" value="女性">女性</label>
                        <input class="input-gender" type="radio" id="other" name="gender" value="3" {{ old('gender')==3 ? 'checked' : '' }} />
                        <label class="gender-label" for="other" value="その他">その他</label>
                </div>
                <div class="form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" />
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--number">
                    <div class="form__input--first">
                        <input type="tel" name="first_tel" placeholder="080" value="{{ old('first_tel') }}" />
                    </div>
                    <span class="form__label--hyphen">-</span>
                    <div class="form__input--second">
                        <input type="tel" name="second_tel" placeholder="1234" value="{{ old('second_tel') }}" />
                    </div>
                    <span class="form__label--hyphen">-</span>
                    <div class="form__input--third">
                        <input type="tel" name="third_tel" placeholder="5678" value="{{ old('third_tel') }}" />
                    </div>
                </div>
                <div class="form__error">
                    @if($errors->has('first_tel'))
                    {{ $errors->first('first_tel') }}
                    @elseif($errors->has('second_tel'))
                    {{ $errors->first('second_tel') }}
                    @else
                    {{ $errors->first('third_tel') }}
                    @endif
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                </div>
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title building">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}" />
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--select">
                    <select class="form__select--category" name="category_id">
                        <option hidden>選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>{{ $category->content }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__error">
                    @error('category_id')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                </div>
                <div class="form__error">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>

@endsection