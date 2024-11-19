@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')
<div class="thanks__content">
    <div class="thanks__heading">
        <h2>Thank you</h2>
        <div class="thanks__group">
            <div class="thanks__group-title">
                <h2>お問い合わせありがとうございました</h2>
            </div>
            <div class="thanks__group-link">
                <a href="/">HOME</a>
            </div>
        </div>
    </div>
</div>
@endsection