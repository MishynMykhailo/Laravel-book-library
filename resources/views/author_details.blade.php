{{--Наследую все от файла layout в этой директории--}}
@extends('layout')
{{--Указываю название секции куда я буду вставлять нужный мне контент--}}
@section('title')

@endsection
@section('main_content')
@isset($authors,$book_details)

<section class="section-author__details">
    <div class="container">
        @if ($errors->any())
            <div class="danger">
                @foreach($errors->all() as $error)
                    <h2>{{ $error }}</h2>
                @endforeach
            </div>
        @endif



        <div>
            @foreach($authors as $author)
                 <div>
                     <div class="author-details__list">
                         <x-author-list-component :author="$author" />
                     </div>
                     <div class="author__details-update-delete">
                         <div class="author__details-update">
                             <x-modal-component modalClass="form-content" class="btn custom__button-light" id="authorEdit" closeId="authorEdit" title="Обновить автора">
                                 <x-form-component class="form-standart" :author="$author" id="authorEditForm" method="POST" action="/author_edit">
                                     <x-authorForm-component :author="$author" />
                                 </x-form-component>
                             </x-modal-component>

                         </div>

                 <div class="author__details-delete">
                     <x-form-component id="authorDeleteForm" method="POST" action="{{ route('author_delete', ['id'=>$author->id]) }}" delete="delete">
                         <button type="submit" class="btn custom__button-delete" >Удалить</button>
                     </x-form-component>
                 </div>
                     </div>

                 </div>
                <div>
                    <h2 class="author__details-text">Книги автора:</h2>
                    @if(count($book_details)>=1)
                        <ul class="author__details-book-list">
                            @foreach($book_details as $book)
                                <li class="author__details-book-item">
                                    <a class="author__details-book-link" href="{{route('book_details',['id'=>$book->id])}}">
                                        <x-book-list-component :book="$book" />
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <h2 class="danger">Книг не найдено</h2>
                    @endif
                </div>
            @endforeach
        </div>
        @endisset
    </div>
</section>
@endsection
