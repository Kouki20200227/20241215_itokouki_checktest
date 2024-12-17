@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('title_button')
<a href="/login" class="ttl__btn--submit">login</a>
@endsection

@section('sub_title', 'Register')

@section('content')
<div class="register__content">
    <form class="form__register" action="/register" method="post">
        @csrf
        <div class="form__group">
            <div class="group__ttl">
                <p class="group__ttl--text">お名前</p>
            </div>
            <div class="group__input">
                <input type="text" class="group__input--text" name="name" value="{{old('name')}}" placeholder="例: 山田　太郎">
            </div>
            <div class="group__error">
                @error('name')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="group__ttl">
                <p class="group__ttl--text">メールアドレス</p>
            </div>
            <div class="group__input">
                <input type="email" class="group__input--text" name="email" value="{{old('email')}}" placeholder="例: test@example.com">
            </div>
            <div class="group__error">
                @error('email')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="group__ttl">
                <p class="group__ttl--text">パスワード</p>
            </div>
            <div class="group__input">
                <input type="password" class="group__input--text" name="password" value="{{old('password')}}" placeholder="例: coachtech1106">
            </div>
            <div class="group__error">
                @error('password')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="form__btn">
            <button class="form__btn--submit" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection