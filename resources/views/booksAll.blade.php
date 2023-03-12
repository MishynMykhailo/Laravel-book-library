{{--Наследую все от файла layout в этой директории--}}
@extends('layout')
{{--Указываю название секции куда я буду вставлять нужный мне контент--}}
@section('title')
Все книги
@endsection
@section('main_content')
<section class="section-book ">
   <div class="container">
       <div class="book-filter">
           <x-form-component id="book-filter" method="GET" action="{{ route('/') }}" >
               <div class="book-filter__search">
                   <input class="search-input" type="text" id="search" name="search" placeholder="Введите название книги">
                   <button class="btn custom__button-light" type="submit">Найти</button>
               </div>
               <select class="book-filter__sort" name="sort">
                   <option selected disabled>Выберите ваш вариант</option>
                   <option value="title">Сортировать по названию</option>
               </select>
           </x-form-component>

       </div>
       @if(count($booksAll)>=1)

           <ul class="book__list">
               @foreach($booksAll as $book)
                   <li class="book__item">
                       <a class="book__link" href="{{route('book_details',['id'=>$book->id])}}">
                           <x-book-list-component :book="$book"></x-book-list-component>
                       </a>
                   </li>
               @endforeach
           </ul>
       @else
           <h2 class="">Добавьте Книги</h2>
       @endif

       <div class="">
           {{$booksAll->links()}}
       </div>

   </div>
</section>
@endsection
