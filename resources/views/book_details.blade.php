{{--Наследую все от файла layout в этой директории--}}
@extends('layout')
{{--Указываю название секции куда я буду вставлять нужный мне контент--}}
@section('title')

@endsection
@section('main_content')
@isset($book_details,$authors_details)

@if(count($book_details)<1 && count($authors_details)<1) <h1 class="">Не найдено, попробуйте открыть снова</h1>
    @else
    @foreach($book_details as $book)
    <section class="section-book__details  ">
        <div class="container">
            <div class="book__details-book__list">
                <x-book-list-component :book="$book" />
            </div>
            <div class="book__details-update-delete">
                <div class="book__details-update" >
                    <x-modal-component modalClass="form-content" class="btn custom__button-light" id="bookEdit" closeId="bookEdit" title="Обновить книгу">
                        <x-form-component  class="form-standart" :book="$book" id="bookEditForm" method="POST" action="/book_edit">
                            <x-bookForm-component :details="$book" :authorsDetails="$authors_details" />
                        </x-form-component>

                    </x-modal-component>
                </div>
                <div class="book__details-delete" >
                    <x-form-component id="bookDeleteForm" method="POST" action="{{ route('book_delete', ['id'=>$book->id]) }}" delete="delete">
                        <button type="submit" class="btn custom__button-delete">Удалить</button>
                    </x-form-component>
                </div>
            </div>
            <h2 class="book__details__text">Авторы книги:</h2>
            @if(count($authors_details)>=1)
                <ul class="book__details-author__list">
                    @foreach($authors_details as $author)
                        <li class="book__details-author__item">
                            <a class="book__details-author__link"href="{{route('author_details',['id'=>$author])}}">
                                <x-author-list-component :author="$author" />
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <h2 class="danger">Авторов не найдено</h2>
            @endif
        </div>
    </section>
    @endforeach

    @endif
    @endisset
    @endsection
