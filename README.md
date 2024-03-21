<p align="center">
    <h2 align="center">Пример использования ООП. Предметная область - услуги связи.</h2>
</p>
<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h3 align="center">Php8.3 - микросборка Yii2</h3>
    <br>
</p>
<p align="right">
    Always welcome with open arms from 
    <a href="https://github.com/s-drozdov?tab=repositories" target="_blank">
        @Sergey Drozdov
    </a>
</p>

УСТАНОВКА
------------

Из корня проекта с хост-машины запустите:
```bash
make
```

Потребует ввести пароль для новой БД.

MAKEFILE команды
------------

* **make up** - сокращалка для docker compose up -d
* **make stop** - сокращалка для docker compose stop
* **make down** - сокращалка для docker compose down
* **make build** - билд образа с пробросом UID и GID
* **make composer-install** - запуск composer с хост машины
* **make yii-migrate** - накатка миграций с хост машины


* **make create-env** - готовим оригинал .env с вводом пароля от БД
* **make create-db-config** - готовим оригинал конфига db.php с заполнением из .env


ОСНОВНОЙ КОНЦЕПТ
------------

###Доменная модель. Бизнес-логика.

Моделирование каналов связи. Имеются потребители (Consumer), провайдеры услуг связи (Provider), 
устройства (Device) различных моделей (DeviceModel), разделенные по категориям (DeviceCategory).
Провайдеры услуг выпускают сим-карты (SimCard), и поставляют домашний интернет. Сим-карты можно вставлять в
устройства. Потребители могут быть владельцами конкретных устройств, покупать сим-карты. 

Потребители живут в домах (Apartment). К дому может быть подключен один или несколько провайдеров 
домашнего интернета.

У каждого устройства в зависимости от модели могут быть слоты сим/адаптеры Ethernet/Wifi.

[comment]: <> (@TODO: приложить структуру данных)
