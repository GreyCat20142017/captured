Идея и "визуальный скелет" проекта позаимствованы у одного из проектов базового PHP HTML Academy.
Контент изменен. Все совпадения с ТЗ случайны.
Выполнено по принципу: "Что вижу - то пою!" 
Оригинальная верстка будет заменена на верстку с использованием [Material Design Bootstrap](https://mdbootstrap.com/previews/free-templates/blog/home-page.html">)
#
В разделе "Популярное" - предположительно все посты с возможностью сортировки и фильтрации. 
В разделе "Моя лента" - посты авторов, на которых подписан текущий пользователь.
В профиле пользователя - его посты и репосты, сделанные им.
Для  незарегистрированных пользователей доступен просмотр раздела "Популярное", поиск и просмотр постов.
#
Счетчик просмотров сделан по принципу: 1 пользователь - 1 просмотр. Просмотры не залогиненных пользователей не учитываются.
#
Многие вещи, очевидно, лучше было бы сделать через ajax, но это же про PHP вроде как... 
Но для лайков, репостов и подписок ajax все-таки добавлен (без поддержки в IE).

Ссылка на форму комментариев является на самом деле и ссылкой на публикацию (где есть эта форма), т.к. не у всех типов
постов во всех режимах есть заголовки, а способ открывать post_details был все равно нужен.
#
Схема БД зря такая. Кажется, у MySQL нет проблем с разреженными таблицами. Перебор. Но переделывать уже не захотелось...