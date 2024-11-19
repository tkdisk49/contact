@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<div class="confirm__content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>
    <form class="form" action="/thanks" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" readonly />
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" readonly />
                        <input type="text" value="{{ $name }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly />
                        @if($contact['gender'] == '1')
                        男性
                        @elseif($contact['gender'] == '2')
                        女性
                        @else
                        その他
                        @endif
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input type="tel" name="tel" value="{{ $tel }}" readonly />
                        <input type="hidden" name="first_tel" value="{{ $contact['first_tel'] }}" readonly />
                        <input type="hidden" name="second_tel" value="{{ $contact['second_tel'] }}" readonly />
                        <input type="hidden" name="third_tel" value="{{ $contact['third_tel'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" readonly />
                        @if($contact['category_id'] == '1')
                        商品のお届けについて
                        @elseif($contact['category_id'] == '2')
                        商品の交換について
                        @elseif($contact['category_id'] == '3')
                        商品トラブル
                        @elseif($contact['category_id'] == '4')
                        ショップへのお問い合わせ
                        @else
                        その他
                        @endif
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
                    </td>
                </tr>
            </table>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit" name='submit' value="store">送信</button>
            <button class="form__button-correct" type="submit" name='back' value="back">修正</button>
        </div>
    </form>
</div>
@endsection