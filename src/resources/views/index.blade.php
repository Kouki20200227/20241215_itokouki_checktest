@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('sub_title', 'Contact')

@section('content')
<div class="contact__content">
    <form class="contact__form" action="/confirm" method="post">
        @csrf
        <table class="contact__table">
            <tr class="table__group">
                <th class="group__ttl">お名前<span class="need">※</span></th>
                <td class="group__input">
                    <div class="group__input--items">
                        <input type="text" class="group__input--name" name="first_name" value="{{old('first_name')}}" placeholder="例: 山田">
                        <input type="text" class="group__input--name" name="last_name" value="{{old('last_name')}}" placeholder="例: 太郎">
                    </div>
                </td>
            </tr>
            @if ($errors->has('first_name') || $errors->has('last_name'))
            <tr class="table__group">
                <th class="group__ttl"></th>
                <td class="group__input">
                    <div class="group__input--items">
                        <div class="group__input--name">
                            @error('first_name')
                            <p class="need">{{$errors->first('first_name')}}</p>
                            @enderror
                        </div>
                        <div class="group__input--name">
                            @error('last_name')
                            <p class="need">{{$errors->first('last_name')}}</p>
                            @enderror
                        </div>
                    </div>
                </td>
            </tr>
            @endif
            <tr class="table__group">
                <th class="group__ttl">性別<span class="need">※</span></th>
                <td class="group__input">
                    <div class="group__input--radios">
                        <div class="radio__group">
                            <input type="radio" class="radio__btn" id="man" name="gender" value="1" @if (1 === (int)old('gender'))
                            checked @endif>
                            <label for="man" class="radio__txt">男性</label>
                        </div>
                        <div class="radio__group">
                            <input type="radio" class="radio__btn" id="woman" name="gender" value="2" @if (2 === (int)old('gender'))
                            checked @endif>
                            <label for="woman" class="radio__txt">女性</label>
                        </div>
                        <div class="radio__group">
                            <input type="radio" class="radio__btn" id="other" name="gender" value="3" @if (3 === (int)old(('gender')))
                            checked @endif>
                            <label for="other" class="radio__txt">その他</label>
                        </div>
                    </div>
                </td>
            </tr>
            @error('gender')
            <tr class="table__group">
                <th class="group__ttl"></th>
                <td class="group__input">
                    <div class="group__input--radios">
                        <p class="need">{{$errors->first('gender')}}</p>
                    </div>
                </td>
            </tr>
            @enderror
            <tr class="table__group">
                <th class="group__ttl">メールアドレス<span class="need">※</span></th>
                <td class="group__input">
                    <div class="group__input--items">
                        <input type="email" class="group__input--email" name="email" value="{{old('email')}}" placeholder="例: test@example.com">
                    </div>
                </td>
            </tr>
            @error('email')
            <tr class="table__group">
                <th class="group__ttl"></th>
                <td class="group__input">
                    <div class="group__input--items">
                        <p class="need">{{$errors->first('email')}}</p>
                    </div>
                </td>
            </tr>
            @enderror
            <tr class="table__group">
                <th class="group__ttl">電話番号<span class="need">※</span></th>
                <td class="group__input">
                    <div class="group__input--items">
                        <input type="text" class="group__input--tel" name="tell1" value="{{old('tell1')}}" placeholder="080">
                        <p class="line">-</p>
                        <input type="text" class="group__input--tel" name="tell2" value="{{old('tell2')}}" placeholder="1234">
                        <p class="line">-</p>
                        <input type="text" class="group__input--tel" name="tell3" value="{{old('tell3')}}" placeholder="5678">
                    </div>
                </td>
            </tr>
            @if ($errors->has('tell1') || $errors->has('tell2') || $errors->has('tell3'))
            <tr class="table__group">
                <th class="group__ttl"></th>
                <td class="group__input">
                    <div class="group__input--items">
                        <div class="group__input--tel">
                            @error('tell1')
                            <p class="need">{{$errors->first('tell1')}}</p>
                            @enderror
                        </div>
                        <div class="group__input--tel">
                            @error('tell2')
                            <p class="need">{{$errors->first('tell2')}}</p>
                            @enderror
                        </div>
                        <div class="group__input--tel">
                            @error('tell3')
                            <p class="need">{{$errors->first('tell3')}}</p>
                            @enderror
                        </div>
                    </div>
                </td>
            </tr>
            @endif
            <tr class="table__group">
                <th class="group__ttl">住所<span class="need">※</span></th>
                <td class="group__input">
                    <div class="group__input--items">
                        <input type="text" class="group__input--address" name="address" value="{{old('address')}}" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
                    </div>
                </td>
            </tr>
            @error('address')
            <tr class="table__group">
                <th class="group__ttl"></th>
                <td class="group__input">
                    <div class="group__input--items">
                        <p class="need">{{$errors->first('address')}}</p>
                    </div>
                </td>
            </tr>
            @enderror
            <tr class="table__group">
                <th class="group__ttl">建物名</th>
                <td class="group__input">
                    <div class="group__input--items">
                        <input type="text" class="group__input--building" name="building" value="{{old('building')}}" placeholder="例: 千駄ヶ谷マンション101">
                    </div>
                </td>
            </tr>
            <tr class="table__group">
                <th class="group__ttl">お問い合わせの種類<span class="need">※</span></th>
                <td class="group__input">
                    <div class="group__input--items">
                        <select name="category_id">
                            <option value="" selected hidden>選択してください</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" @if ($category->id === (int)old('category_id')) selected
                            @endif>
                            {{$category->id}}:{{$category->content}}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
            </tr>
            @error('category_id')
            <tr class="table__group">
                <th class="group__ttl"></th>
                <td class="group__input">
                    <div class="group__input--items">
                        <p class="need">{{$errors->first('category_id')}}</p>
                    </div>
                </td>
            </tr>
            @enderror
            <tr class="table__group">
                <th class="group__ttl">お問い合わせ内容<span class="need">※</span></th>
                <td class="group__input">
                    <div class="group__input--items">
                        <textarea class="group__input--detail" name="detail"placeholder="例: お問い合わせ内容をご記入ください">{{old('detail')}}</textarea>
                    </div>
                </td>
            </tr>
            @error('detail')
            <tr class="table__group">
                <th class="group__ttl"></th>
                <td class="group__input">
                    <div class="group__input--items">
                        <p class="need">{{$errors->first('detail')}}</p>
                    </div>
                </td>
            </tr>
            @enderror
        </table>
        <div class="contact__btn">
            <button class="contact__btn--submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection