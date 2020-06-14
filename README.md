## установка

```shell script
git clone https://github.com/cetver/ho-test-task -- /project/dir

cd /project/dir

composer install

sudo -H -u postgres psql <<EOT
CREATE DATABASE ho-test-task;
EOT
```

Изменить [настройки БД](https://github.com/cetver/ho-test-task/tree/master/config/db.php)

```shell script
./yii migrate  
./yii serve
```

## использование

[http://localhost:8080/](http://localhost:8080/)

## комментарии

> Реализовать через треит

```
\app\serializers\JsonSerializer
```

> Реализовать через поведение

```
\app\behaviors\JsonBehavior
```

> Реализовать возможность выборки моделей из БД на основе фильтра по некоторым наборам ключ-значение из массива данных

[http://localhost:8080/](http://localhost:8080/) 