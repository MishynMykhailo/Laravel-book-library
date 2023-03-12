{{-- Название - title --}}
<input name="bookId" value="{{$details->id ?? ''}}" type="hidden">

<label class="book__form-label custom__form-label">
<input class="book__form-input custom__form-input"type="text" name="title" id="title" placeholder=" " value="{{ $details->title ?? '' }}">
<p class="book__form-text custom__form-text">Название:</p>
</label>
    {{--Описание - description --}}
<label class="book__form-label custom__form-label" >
<input class="book__form-input custom__form-input" type="text" name="description" id="description" placeholder=" " value="{{ $details->description ?? '' }}">
<p class="book__form-text custom__form-text">Краткое описание:</p>
</label>
    {{--Изображения - image_path --}}
<label class="book__form-label custom__form-label">
<input class="book__form-file custom__form-input"type="file" name="image_path" id="image_path"  value="{{$details->image_path ?? ''}}">
    <p class="book__form-text custom__form-text">Изображение (jpg или png, не более 2 Мб):</p>
</label>
    <div class="book__form-authors-date">
    {{-- Авторы и дата--}}
    <div class="book__form-authors">
        <label for="author" class="book__form-authors--title">Авторы:</label>
        <div class="dropdown">
            <button class="btn custom__button-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                Выбрать авторов
            </button>
            <div class="dropdown-menu">
                <ul class="dropdown-menu__list">
                    @if(isset($authorsDetails))
                    @foreach(\App\Models\Author::all() as $author)
                    <li class="">
                        <div class="">
                            <label class="-label" ">
                            @if(in_array($author->id, $authorsDetails->pluck('id')->toArray()))
                            <input class="dropdown-menu__item-checkbox" checked type="checkbox" name="authors[]" value="{{ $author->id }}" id="{{ 'author-' . $author->id }}">
                            @else
                            <input class="dropdown-menu__item-checkbox" type="checkbox" name="authors[]" value="{{ $author->id }}" id="{{ 'author-' . $author->id }}">
                            @endif
                            {{ $author->first_name }}</label>
                        </div>
                    </li>
                    @endforeach
                    @else
                    @foreach(\App\Models\Author::all() as $author)
                    <li class="">
                        <div class="">
                            <label class="dropdown-menu__item-checkbox" >
                            <input class="dropdown-menu__item-checkbox" type="checkbox" name="authors[]" value="{{ $author->id }}" id="{{ 'author-' . $author->id }}">
                            {{ $author->first_name }}</label>
                        </div>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="book__form-date">
        <label for="publish_date" class="book__form-date--title">Дата публикации:</label>
        <input class="book__form-date--input" type="date" name="publication_date" id="publication_date" pattern="\d{4}-\d{2}-\d{2}" max="9999-12-30" min="0001-01-01" value="{{ $details->publication_date ?? '' }}">
    </div>
</div>
{{-- Кнопка отправки--}}
<div class="book__form-button">
    <button type="submit" id="submit" class="btn custom__button-light">Отправить</button>
</div>
{{-- Стили для dropdown-menu --}}
<style>
    .dropdown {
        position: relative;
    }
    .dropdown-menu {
        width: 100%;
        display: none;
        position: absolute;
        z-index: 1;
        height: 250px;
        overflow: auto;
        word-break: break-all;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }
    .dropdown-menu__list{
        border: 1px solid var(--transparent-black-color);
        background-color: var(--secondary-bg-color);
        color: var(--text-color);
        padding:5px;
    }
    .dropdown-item {
        cursor: pointer;
    }
    .dropdown-menu__item-checkbox{
        margin: 0;
    }
</style>
<script>
    const authorsInput = document.getElementById('authors');
    const authorCheckboxes = document.querySelectorAll('.author-checkbox');

    const form = document.getElementById('form');
    authorCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            const checkedAuthorIds = Array.from(authorCheckboxes).filter(el => el.checked).map(el => el.value);
        });
    });
</script>
