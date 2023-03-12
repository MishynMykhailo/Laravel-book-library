{{--Наследую все от файла layout в этой директории--}}
@extends('layout')
{{--Указываю название секции куда я буду вставлять нужный мне контент--}}
@section('title')
Все Авторы
@endsection
@section('main_content')
{{-- После удаления автора,отправляю редирект на эту страницу и это alert о успехе--}}
<section class="section-author ">
<div class="container">
    @if ($errors->any())
        <div class="danger">
            @foreach($errors->all() as $error)
                <h2>{{ $error }}</h2>
            @endforeach
        </div>
    @endif
    @if (session('success'))
        <div class="">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="author__title">Все авторы</h1>
    <div class="author-filter">
        <x-form-component id="author-filter" method="GET" action="{{ route('authorsAll') }}" >
            <div class="author-filter__search">
                <input class="search-input" type="text" id="search" name="search" placeholder="Фамилию/Имя автора">
                <button class="btn custom__button-light" type="submit">Найти</button>
            </div>
            <select class="author-filter__sort" name="sort">
                <option selected disabled>Выберите ваш вариант</option>
                <option value="first_name">Сортировать по Имени</option>
                <option value="last_name">Сортировать по Фамилии</option>
            </select>
        </x-form-component>

    </div>
    @isset($authorsAll)
        @if(count($authorsAll)<1) <h2 class="">Добавьте Авторов</h2>
        @else
            <ul class="author__list">
                @foreach($authorsAll as $author)
                    <li class="author__item">
                        <a class="author__link" href="{{route('author_details',['id'=>$author])}}">
                            <x-author-list-component :author="$author" />
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    @endisset
    <div class="">
        {{$authorsAll->links()}}
    </div>
</div>
</section>
    @endsection
