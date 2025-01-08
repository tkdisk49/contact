<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <h2 class="header__logo">FashionablyLate</h2>
                <nav>
                    <ul class="header-nav">
                        <li class="header-nav__item">
                            <form class="form" action="/logout" method="post">
                                @csrf
                                <button class="header-nav__button">logout</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="admin__content">
            <div class="admin__heading">
                <h2>Admin</h2>
            </div>
            <?php
            $sex = ['全員' => '', '男性' => 1, '女性' => 2, 'その他' => 3];
            ?>
            <form class="search-form" action="/admin/search" method="get">
                @csrf
                <div class="form__input--keyword">
                    <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
                </div>
                <div class="form__input--gender">
                    <select name="gender">
                        <option value="">性別</option>
                        @foreach($sex as $key => $value)
                        <option value="{{ $value }}">{{ $key }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__input--category">
                    <select name="category_id">
                        <option value="">お問い合わせの種類</option>
                        @foreach($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__input--date">
                    <input type="date" name="date">
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">検索</button>
                </div>
                <div class="form__reset">
                    <a class="form__reset-text" href="/admin">リセット</a>
                </div>
            </form>
            <div class="admin-items">
                <div class="admin-item__button">
                    <button class="export__button">エクスポート</button>
                </div>
                <div class="admin-item__paginate">
                    {{ $contacts->appends(request()->query())->links('vendor.pagination.custom') }}
                </div>
            </div>
            <div class="admin-table">
                <table class="admin-table__inner">
                    <tr class="admin-table__row">
                        <th class="admin-table__header">お名前</th>
                        <th class="admin-table__header">性別</th>
                        <th class="admin-table__header">メールアドレス</th>
                        <th class="admin-table__header" colspan="2">お問い合わせの種類</th>
                    </tr>
                    @foreach($contacts as $contact)
                    <tr class="admin-table__row">
                        <td class="admin-table__name">
                            {{ $contact['last_name'] }}
                            <span class="space"></span>
                            <span class="first-name">{{ $contact->first_name }}</span>
                        </td>
                        <td class="admin-table__gender">
                            <input wire:model.defer="gender" type="hidden" value="{{ $contact['gender'] }}" />
                            @if($contact->gender == '1')
                            男性
                            @elseif($contact->gender == '2')
                            女性
                            @else
                            その他
                            @endif
                        </td>
                        <td class="admin-table__email">
                            {{ $contact['email'] }}
                        </td>
                        <td class="admin-table__category">
                            {{ $contact['category']['content'] }}
                        </td>
                        <td class="admin-table__detail">
                            @livewire('admin')
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </main>
    @livewireScripts
</body>

</html>