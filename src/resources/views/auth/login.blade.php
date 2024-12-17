@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('title_button')
<a href="/register" class="ttl__btn--submit">register</a>
@endsection

@section('sub_title', 'Login')

@section('content')
<div class="login__content">
        <form class="login__form">
            @csrf
            <div class="form__group">
                <p class="form__group--title">メールアドレス</p>
                <input type="text" class="form__group--item" name="email" placeholder="例: test@example.com" value="{{old('email')}}">
                <div class="form__group--error">
                    @error('email')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <p class="form__group--title">パスワード</p>
                <input type="text" class="form__group--item" name="password" placeholder="例: coachtech1106">
                <div class="form__group--error">
                    @error('password')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form__button">
                <button class="form__button--submit" type="submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection

