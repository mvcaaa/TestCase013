[comment]: # (Created by Astashov Andrey <a.astashov@straetus.com>)
[comment]: # (Date: 30.01.2016 / ‏‎23:36)

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
