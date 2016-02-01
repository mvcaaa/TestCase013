[comment]: # (Created by Astashov Andrey <a.astashov@straetus.com>)
[comment]: # (Date: 30.01.2016 / ‏‎23:36)

> Предположим, что у нас реализован некий абстрактный контроллер, содержащий следующие функции:
> actionGetUserName(...){...} // Возвращает имя текущего пользователя
> actionGetUserRole(...){...} // Возвращает роль конкретного пользователя [0=>'Guest',1=>'Admin']
> actionGetUserPayments(...){...} // Возвращает список всех платежей пользователя
>  
> Предложите механизм (дополните текущий контроллер необходимыми методами с реализацией), который позволит запретить вызов всех методов, если роль пользователя Guest.


Для этой задачи вполне подойдет простой метод Access Control Filter (ACF). RBAC тут избыточен.
Для коренного контроллера сайта (SiteController) нужно добавить следующий метод("абстрактный" контроллер как и любые другие трогать не придется)

```php
    use yii\web\Controller;
    use yii\filters\AccessControl;
    
    class SiteController extends Controller
    {
    // ...

        public function behaviors()
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['login', 'logout', 'signup'],
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['login', 'signup'],
                            'roles' => ['?'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['logout'],
                            'roles' => ['@'],
                        ],
                        
                    ],
                ],
            ];
        }
    // ...
    }
```
