# WordReverser

PHP-класс для реверса букв в каждом слове строки с сохранением регистра и пунктуации.

## Возможности
- Меняет порядок букв в каждом слове на обратный.
- Сохраняет регистр по позициям (например: `Cat` → `Tac`, `houSe` → `esuOh`).
- Сохраняет пунктуацию и оставляет её на месте (например: `cat,` → `tac,`, `is 'cold' now` → `si 'dloc' won`).
- Дефисы и апострофы считаются разделителями слов (например: `third-part` → `driht-trap`, `can\`t` → `nac\`t`).
- Работает с буквами из любых языков (латиница, кириллица и др.).

## Установка

```bash
composer require --dev phpunit/phpunit
```

(сам класс подключается в проект вручную, автозагрузкой PSR-4 или через `require_once`).

## Использование

```php
use App\Text\WordReverser;

$text = "is 'cold' now";
echo WordReverser::reverseWords($text);
// Результат: "si 'dloc' won"
```

## Тестирование

Тесты написаны на PHPUnit.

Запуск:

```bash
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/WordReverserTest.php
```

## Структура проекта

```
src/
 └── WordReverser.php       # Основной класс

tests/
 └── WordReverserTest.php   # Unit-тесты PHPUnit
```

## Известные моменты
- По умолчанию апострофы (`'`, `\`) и дефисы (`-`) считаются разделителями. Если нужно трактовать их как часть слова (например, `don't` → `t'nod`), то регулярное выражение в классе можно скорректировать.

---
© 2025
