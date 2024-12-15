@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection

@section('sub_title', 'Confirm')

@section('content')
<div class="confirm__content">
    <form action="/thanks" class="confirm__form" method="post">
        @csrf
        <table class="confirm__table">
            <tr class="table__group">
                <th class="group__ttl">
                    <p class="group__lbl">お名前</p>
                </th>
                <td class="group__input">
                    <p class="group__lbl">{{$confirm->first_name}} {{$confirm->last_name}}</p>
                    <input type="hidden" name="first_name" value="{{$confirm->first_name}}">
                    <input type="hidden" name="last_name" value="{{$confirm->last_name}}">
                </td>
            </tr>
            <tr class="table__group">
                <th class="group__ttl">
                    <p class="group__lbl">性別</p>
                </th>
                <td class="group__input">
                    <p class="group__lbl">
                        @switch($confirm->gender)
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
                    <input type="hidden" name="gender" value="{{$confirm->gender}}">
                </td>
            </tr>
            <tr class="table__group">
                <th class="group__ttl">
                    <p class="group__lbl">メールアドレス</p>
                </th>
                <td class="group__input">
                    <p class="group__lbl">{{$confirm->email}}</p>
                    <input type="hidden" name="email" value="{{$confirm->email}}">
                </td>
            </tr>
            <tr class="table__group">
                <th class="group__ttl">
                    <!-- <p class="group__lbl">電話番号</p> -->
                </th>
                <td class="group__input">
                    <p class="group__lbl">{{$confirm->tell1}}{{$confirm->tell2}}{{$confirm->tell3}}</p>
                    <input type="hidden" name="tell1" value="{{$confirm->tell1}}">
                    <input type="hidden" name="tell2" value="{{$confirm->tell2}}">
                    <input type="hidden" name="tell3" value="{{$confirm->tell3}}">
                </td>
            </tr>
            <tr class="table__group">
                <th class="group__ttl">
                    <!-- <p class="group__lbl">住所</p> -->
                </th>
                <td class="group__input">
                    <p class="group__lbl">{{$confirm->address}}</p>
                    <input type="hidden" name="address" value="{{$confirm->address}}">
                </td>
            </tr>
            <tr class="table__group">
                <th class="group__ttl">
                    <!-- <p class="group__lbl">建物名</p> -->
                </th>
                <td class="group__input">
                    <p class="group__lbl">{{$confirm->building}}</p>
                    <input type="hidden" name="building" value="{{$confirm->building}}">
                </td>
            </tr>
            <tr class="table__group">
                <th class="group__ttl">
                    <!-- <p class="group__lbl">お問い合わせの種類</p> -->
                </th>
                <td class="group__input">
                    <p class="group__lbl">{{$category->content}}</p>
                    <input type="hidden" name="category_id" value="{{$confirm->category_id}}">
                </td>
            </tr>
            <tr class="table__group">
                <th class="group__ttl">
                    <!-- <p class="group__lbl">お問い合わせ内容</p> -->
                </th>
                <td class="group__input">
                    <p class="group__lbl">{{$confirm->detail}}</p>
                    <input type="hidden" name="detail" value="{{$confirm->detail}}">
                </td>
            </tr>
        </table>
        <div class="confirm__btn">
            <div class="group__btn">
                <button type="submit" class="send__btn--submit">送信</button>
                <button class="correct__btn--submit" name="back" value="back">修正</button>
            </div>
        </div>
    </form>
</div>
@endsection