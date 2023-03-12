@if(isset($book))
<div class="book-list__container-text">
    <div class="book__img-container">
    <img class="book__img" src="{{$book->image_path}}" alt="{{$book->title}}">
</div>
    <p class="book-list__text"><b>Название книги:</b> {{$book->title}}</p>
    <p class="book-list__text"><b>Описание: </b>{{$book->description}}</p>
    <p class="book-list__text"><b>Дата публикации:</b> {{$book->publication_date}}</p>
</div>
@endif
