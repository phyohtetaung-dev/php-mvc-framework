# Essential Notes

## Functions
---
### 1. include vs require
### 2. include_once vs require_once
### 3. ob_start and ob_get_clean
### 4. call_user_func
### 5. filter_input
### 6. filter_var
### 7. sprintf
### 8. __toString
### 9. dirname
### 10. scandir
### 11. array_diff
### 12. pathinfo
### 13. array_map
### 14. password_hash
### 15. unset

## Others
---
### 1. PDO
### 2. PHP_EOL
### 3. self::class
### 4. Objects and references
- https://www.php.net/manual/en/language.oop5.references.php#:~:text=A%20PHP%20reference%20is%20an,to%20find%20the%20actual%20object.

### 5. Scope Resolution Operator(::)
- https://www.php.net/manual/en/language.oop5.paamayim-nekudotayim.php

### 6. static::
- https://www.geeksforgeeks.org/difference-between-selfbar-and-staticbar-in-php/?ref=rp
- This PHP keyword helps the concept of “late static binding in PHP” to come in the picture. 
- It is used to access the static function desired by the extended class at runtime.
```php
<?php
   
// Declaring parent class
class demo {
   
    public static $bar = 10;
   
    public static function func() {
                   
        // Static in place of self
        echo static::$bar."\n";
    }
}
   
// Declaring child class
class Child extends demo {
    public static $bar = 20;
}
   
// Calling for demo's version of func()
demo::func();
   
// Calling for child's version of func()
Child::func();
   
?>
```