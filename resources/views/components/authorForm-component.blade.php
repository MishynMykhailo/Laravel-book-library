        <input name="authorId" value="{{$author->id ?? ''}}" type="hidden">
        <label
            class="author__form-label custom__form-label">
        <input
            class="author__form-input custom__form-input"
            type="text"
            name="first_name"
            id="first_name"
            placeholder=" "
            autocomplete="off"
            value="{{$author->first_name ?? ''}}">
        <p class="author__form-text custom__form-text">ИМЯ:</p>
        </label>
        <label class="author__form-label custom__form-label" >
        <input
            class="author__form-input custom__form-input"
            type="text"
            name="last_name"
            id="last_name"
            placeholder=" "
            autocomplete="off"
            value="{{$author->last_name ?? ''}}">
        <p class="author__form-text custom__form-text">ФАМИЛИЯ:</p>
        </label>
        <label class="author__form-label custom__form-label">
        <input
            class="author__form-input custom__form-input"
            type="text"
            name="middle_name"
            id="middle_name"
            placeholder=" "
            autocomplete="off"
            value="{{$author->middle_name ?? ''}}">
       <p class="author__form-text custom__form-text">ОТЧЕСТВО:</p>
        </label>
        <button id="authorCreateBtn" type="submit" class="custom__button-light">Отправить</button>
