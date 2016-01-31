Имеется таблица покупателей(customer) с полями: id, name
А также таблица продаж(sales): id, cust_id, date, summ_pay
Необходимо вывести имя лучшего покупателя. Один покупатель мог сделать несколько покупок.

1. Запрос, возвращающий Имя и уплаченную сумму
```SQL
SELECT c.name, SUM(s.summ_pay) AS total_spent FROM sales s, customer c
	WHERE c.id = s.cust_id
	GROUP BY s.cust_id
	ORDER BY total_spent DESC
	LIMIT 1;
```
2. Запрос, возвращающий только имя
```sql
SELECT name
FROM customer 
WHERE id IN(SELECT cust_id
	FROM sales
	GROUP BY cust_id
	ORDER BY SUM(summ_pay) DESC
	LIMIT 1);
```