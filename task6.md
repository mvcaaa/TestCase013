[comment]: # (Created by Astashov Andrey <a.astashov@straetus.com>)
[comment]: # (Date: 30.01.2016 / 22:26)

Инъекция:
Передаем след. строку:

http://host/index.php?x= -1 UNION SELECT anons, text FROM news

Лечится: 
1. ```php $query=”SELECT anons,text FROM news WHERE id='”.$_GET['x'].”'”; ``` меняем на ```php $query=”SELECT anons,text FROM news WHERE id='”.(int) $_GET['x'].”'”; ```
2. Данные всегда подставляем в запрос через плейсхолдеры и только разрешенные.  
