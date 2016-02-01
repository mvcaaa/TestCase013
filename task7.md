[comment]: # (Created by Astashov Andrey <a.astashov@straetus.com>)
[comment]: # (Date: 30.01.2016 / ‏‎22:40)

> Я хочу хранить свою билиотеку в БД. Меня волнуют названия книг и авторы — больше ничего хранить не надо. Предложите структуру таблиц.
> Извлечь список книг, которые написаны 3-мя соавторами.

Схема:

```sql
CREATE TABLE books (
  id serial PRIMARY KEY,
  title text
 );
 
CREATE TABLE authors (
  id serial PRIMARY KEY, 
  title text
 );
 
CREATE TABLE books_authors (
	bo_id int REFERENCES books(id), 
	au_id int REFERENCES authors(id), 
	CONSTRAINT cat_pk PRIMARY KEY (bo_id, au_id)
	);

INSERT INTO books (title) VALUES 
  ('Book1'),('Book2'),('Book3'),('Book4');

INSERT INTO authors (title) VALUES 
  ('Author1')
 ,('Author2')
 ,('Author3')
 ,('Author4');

INSERT INTO books_authors (bo_id, au_id) VALUES 
   (1,1), (1,2), (1,3),(2,4),(3,3), (3,4), (3,1), (4,1), (4,2);
```

Запросы
```sql
# Запрос, выводящий id Книг и количество авторов
SELECT bo_id, count(*) AS Count FROM books_authors GROUP BY bo_id HAVING Count = 3;

# Запрос, выводящий id и заголовок книги
SELECT * FROM books WHERE id IN (SELECT bo_id FROM books_authors GROUP BY bo_id HAVING count(*) = 3);
```
[Работающий sqlfiddle](http://sqlfiddle.com/#!9/775d45/1)

