<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/images/ServiceImages/ico-book.ico">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body class="page">
    <header class="header container">
       <div class="header__container ">
           <a class="header__logo"href="/">
               PHP TEST
           </a>
           {{--        START burgerMenu--}}
           <div>
               <button class="burger-menu">
                   <svg class="burger-menu__icon-open" width="40" height="40">
                       <use href="/images/ServiceImages/burger-menu.svg#icon-burger-menu"></use>
                   </svg>
               </button>
               <nav >
                   <ul class="nav__burger">
                       <ul class="nav__burger-list">
                           <li class="nav__burger-item">
                               <a class="nav__burger-link" href="/">Главная</a>
                           </li>
                           <li class="nav__burger-item">
                               <a class="nav__burger-link" href="/authorsAll">Все авторы</a>
                           </li>
                           <li class="nav__burger-item">
                               <x-modal-component modalClass="form-content" class="btn custom__button" id="authorFormMobile" closeId="authorFormMobile" title="Добавить автора">
                                   <x-form-component class="form-standart" id="authorCreateFormMobile" method="POST" action="/authorForm_create">
                                       <x-authorForm-component />
                                   </x-form-component>
                               </x-modal-component>
                           </li>
                           <li class="nav__burger-item">
                               <x-modal-component modalClass="form-content" class="btn custom__button" id="bookFormMobile" closeId="bookFormMobile" title="Добавить книгу">
                                   <x-form-component class="form-standart" id="bookCreateFormMobile" method="POST" action="/bookForm_create">
                                       <x-bookForm-component />
                                   </x-form-component>
                               </x-modal-component>
                           </li>
                       </ul>
                   </ul>
               </nav>
           </div>
           {{--         END  burgerMenu--}}
           <nav class="nav">
               <ul class="nav__list">
                   <li class="nav__item">
                       <a class="nav__link" href="/">Главная</a>
                   </li>
                   <li class="nav__item">
                       <a class="nav__link" href="/authorsAll">Все авторы</a>
                   </li>
                   <li class="nav__item">
                       <x-modal-component modalClass="form-content" class="btn custom__button" id="authorForm" closeId="authorForm" title="Добавить автора">
                           <x-form-component class="form-standart" id="authorCreateForm" method="POST" action="/authorForm_create">
                               <x-authorForm-component />
                           </x-form-component>
                       </x-modal-component>
                   </li>
                   <li class="nav__item">
                       <x-modal-component modalClass="form-content" class="btn custom__button" id="bookForm" closeId="bookForm" title="Добавить книгу">
                           <x-form-component class="form-standart" id="bookCreateForm" method="POST" action="/bookForm_create">
                               <x-bookForm-component />
                           </x-form-component>
                       </x-modal-component>
                   </li>
               </ul>
           </nav>

       </div>
    </header>


    <main>
        @yield('main_content')
    </main>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
