[comment]: # (Created by Astashov Andrey <a.astashov@straetus.com>)
[comment]: # (Date: 30.01.2016 / 22:26)

Инъекция:
Передаем след. строку:

http://host/index.php?x= -1 UNION SELECT anons, text FROM news

Лечится: 
- ``` $query=”SELECT anons,text FROM news WHERE id='”.$_GET['x'].”'”; ``` меняем на ``` $query=”SELECT anons,text FROM news WHERE id='”.(int)$_GET['x'].”'”; ```
- данные всегда подставляем в запрос через плейсхолдеры и только разрешенные.  
