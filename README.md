Тестовое задание
========================================================

ТЗ
-------------------------------------------------
1.Поставить Open Server https://ospanel.io/.
2.Поставить symfony http://symfony.com/, обязательно используя менеджер пакетов composer.
3.Поставить бандл propel orm, опять же через композер.
4.Сделать базу данных для хранения Новостей. Одна таблица, поля таблицы: Название, Краткое описание, Дата, Полный текст, Активность(bool, отвечает за то выводить новость или нет).
5.Вывести список новостей с пагинацией. Список записей получить используя propel. http://propelorm.org/documentation/03-basic-crud.html.
6.Залить все в https://gitlab.com/ и заинвайтить репозиторий - @anton_creonit.

Общее описание проделанной работы
------------------------------------
Был написан тестовый сайт для хранения, добавления новостей. Использовались Symfony 3.4, Propel 2, Bootstrap, Twig, OpenServer. Основные функции доступные на сайте: поиск по характеристикам новости, CRUD функции. Присутствуют фейковые даные для тестирования функционала (fixture). Однако на сайте отсутствует фильтрация, экранирование, обработка исключениями входных данных, так как в ТЗ не было ничего про это сказано как и про другие мелочи.

Мне понравилось выполнять задание - фреймворки действительно облегчают разработку. Надеюсь следующее задание познакомит с тестированием и безопасным написанием кода, потому что я боюсь выпускать свой код в продакшн.

Почему Symfony 3.4 и какие проблемы были
--------------
Я неделю не мог понять как интегрировать Symfony и Propel из-за отсутствия в документации чётко прописанной структуры проекта, так как все операции по конфигурированию моделей(сущностей) предопределены под структуру проектов Symfony. Пример интеграции Symfony с Propel нашёл на Symfony 3. Понимаю что сейчас актуальная версия Symfony 4 и надо с этим разобраться, хотя проблем недолжно возникнуть из-за обновления структуры проекта в 4-ой версии. 

В остальном проблем не было. Все те мелкие проблемы, что возникали решались без каких либо сложностей.

Мои вопросы:
--------------
  * Почему в качестве orm Propel? Так как стабильной версии бандла на Symfony3 и 4 нет, хотя пагинация чертовски удобная.

  * С чем ещё работает бэкенд ? Так как я познакомился с маленькой частью вашего стека технологий, а использование Propel немного, необычно, на мой взгляд, из-за не очень большой известности.

 Договор о прохождении практики
 -----------------------------
 Наконец моя кафедра выдала договор о прохождении практики и сообщила дату начала практики. Практика начинается с 28 мая и продлится примерно месяц, а дальше сессия 2-3 недели. Договор о прохождении практики отправил в отдел кадров. Хочу и дальше развиваться как web-разработчик. 
