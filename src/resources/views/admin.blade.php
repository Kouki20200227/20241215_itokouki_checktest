@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('title_button')
<a href="/logout" class="ttl__btn--submit">logout</a>
@endsection

@section('sub_title', 'Admin')

@section('content')
<div class="admin__content">
    <form action="/admin/search" class="search__form" method="get">
    @csrf
    <div class="search__menu">
            <input type="text" class="search__input--txt" name="keyword" value="{{old('keyword')}}" placeholder="名前やメールアドレスを入力してください">
            <select name="gender" class="search__input--gender">
                <option value="" selected hidden>性別</option>
                <option value="1" @if ((int)old('gender') === 1) selected @endif>男性</option>
                <option value="2" @if ((int)old('gender') === 2) selected @endif>女性</option>
                <option value="3" @if ((int)old('gender') === 3) selected @endif>その他</option>
            </select>
            <select name="category_id" class="search__input--category_id">
                <option value="" selected hidden>お問い合わせの種類</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}" @if ((int)old('category_id') === $category->id) selected @endif>{{$category->content}}</option>
                @endforeach
            </select>
            <input name="date" type="date" class="search__input--date" placeholder="年/月/日">
            <button class="search__btn--submit" type="submit">検索</button>
            <input type="reset" class="search__input--reset" value="リセット">
    </div>
    <div class="admin__menu2">
        <p class="kari">エクスポート</p>
        {{ $contacts->links('vendor.pagination.default') }}
    </div>
    <table class="contacts__table">
        <tr class="table__ttl">
            <th class="group__name">
                <p class="group__ttl--txt item">お名前</p>
            </th>
            <th class="group__gender">
                <p class="group__ttl--txt item">性別</p>
            </th>
            <th class="group__email">
                <p class="group__ttl--txt item">メールアドレス</p>
            </th>
            <th class="group__category">
                <p class="group__ttl--txt item">お問い合わせの種類</p>
            </th>
            <th class="group__detail"></th>
        </tr>
        @foreach ($contacts as $contact)
        <tr class="table__data">
            <td class="group__name">
                <p class="item">{{$contact->first_name}} {{$contact->last_name}}</p>
            </td>
            <td class="group__gender">
                <p class="item">
                    @switch($contact->gender)
                        @case(1)
                        男性
                        @break
                        @case(2)
                        女性
                        @break
                        @default
                        その他
                    @endswitch
                </p>
            </td>
            <td class="group__email">
                <p class="item">{{$contact->email}}</p>
            </td>
            <td class="group__category">
                <p class="item">{{ $contact->category->getDetail() }}</p>
            </td>
            <td class="group__detail">
                <button class="detail__btn item" type="submit">詳細</button>
            </td>
        </tr>
        @endforeach
        </table>
    </form>
</div>
@endsection