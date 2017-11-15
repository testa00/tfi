# Тестовое задание для компании Itransition

Для выполнения программы необходимо из командной строки запустить файл index.php в папке public.
Перед этим для таблицы базы данных необходимо запустить миграции, файл csv должен находиться в storage/imports/stock.csv.

По поводу дополнительных вопросов:
1. Правильно ли форматируются данные для CSV - правильно ли пользователь экспортирует данные в формат CSV для дальнейшей работы с программой?
Не совсем понятный вопрос, помочь пользователю инструкцией.
2. Правильно ли форматируются данные для использования с базой данных - при валидации данных происходят определённые проверки и подготовка данных к импорту,
если есть определённые требования можно выразить их в валидации для импорта.
3. Потенциальные проблемы кодирования данных или проблемы с окончанием строки - считать файл, перекодировать iconv и записать, возможно так.
4. Ручное вмешательство в файл, который может аннулировать некоторые записи - дополнительные проверки входящих данных перед импортом.

Для решения задачи, как и было предложено в задании, я использовал сторонние решения:
для обработки csv файла - [Laravel Excel](https://packagist.org/packages/maatwebsite/excel),
для удобной работы с Laravel's Eloquent ORM - [Insert Duplicate Key Update](https://packagist.org/packages/yadakhov/insert-on-duplicate-key).

Учитывая простоту кода и названия классов и методов, которые говорят сами за себя, код я не комментрировал.
