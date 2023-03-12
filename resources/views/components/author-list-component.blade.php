@if(isset($author))
<div class="author-list__container-text">
    <p class="author-list__text">
        Имя: {{$author->first_name}}
    </p>
    <p class="author-list__text">
        Фамилия: {{$author->last_name}}
    </p>
    @if($author->middle_name)
    <p class="author-list__text">
        Отчество: {{$author->middle_name}}
    </p>
    @endif
</div>
@endif
