require('./bootstrap');
import { Notify } from 'notiflix/build/notiflix-notify-aio';
Notify.init({
    width: "300px",
    position: "right-bottom",
    closeButton: false,
    clickToClose: true,
    timeout: 2000,
});
import axios from 'axios';
// class ValidationAuthorForm{
//     constructor(formId) {
//         this.formId = document.getElementById(formId);
//         this.first_name = this.formId.querySelector('input[name="first_name"]')
//         this.last_name = this.formId.querySelector('input[name="last_name"]')
//     }
//     validation(){
//         this.formId.addEventListener('submit',(e)=>this.checkFields(e))
//     }
//     checkFields(e){
//         const firstLength =  this.first_name.value.length
//             const lastLength = this.last_name.value.length
//         if(firstLength < 3 || lastLength < 3 ){
//             e.preventDefault();
//             Notify.failure('Имя или Фамилия содержат меньше 3 символов');
//         }
//         if(firstLength > 100 || lastLength > 100){
//             e.preventDefault();
//             Notify.failure('Имя или Фамилия содержат больше 100 символов');
//         }
//         return ;
//     }
//
//
// }
// const create = new ValidationAuthorForm('authorCreateForm').validation();
// const update = new ValidationAuthorForm('authorEditForm').validation();

const burgerMenu = document.querySelector('.burger-menu');
const navBurger = document.querySelector('.nav__burger');
console.log(burgerMenu)
console.log(navBurger);
burgerMenu.addEventListener('click', () => {
    navBurger.classList.toggle('nav__burger--active');
});


// class ValidationBookForm{
//     constructor() {
//     }
//     validation(){
//         this.formId.addEventListener('submit',(e)=>this.checkFields(e))
//     }
//     checkFields(e){
//         if(this.first_name.value.length < 3 || this.last_name.value.length < 3){
//             e.preventDefault();
//             console.log('hi')
//             Notify.failure('Имя или Фамилия содержат меньше 3 символов');
//         }
//         return ;
//     }
// }

