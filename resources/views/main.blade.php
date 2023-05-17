@extends('layout')

@section('content')
  <div class="container main-menu">
    <div class="top-menu">
        <p>Сервис</p>
        <p>Курс</p>
        <p>Валюта</p>
    </div>
    <div>
        @foreach ($data as $itemCryptoCurrency)
            <div class="second-menu">
                <p> {{ $itemCryptoCurrency['currency'] }}</p>
                <p> {{ $itemCryptoCurrency['amount'] }}</p>
                <p>USD</p>
            </div>
        @endforeach
    </div>
  </div>
@endsection
