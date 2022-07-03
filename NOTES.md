# Essential Notes

---

1. [Functions](#function)
2. [Others](#others)

## Functions

---

### 1. include vs require

- The require() function is identical to include(), except that it handles errors differently.
- If an error occurs, the include() function generates a warning, but the script will continue execution.
- The require() generates a fatal error, and the script will stop.

### 2. ob_start and ob_get_clean

- ob_start() will turn output buffering on while output buffering is active no output is sent from the script (other than headers), instead the output is stored in an internal buffer.
- ob_get_clean() essentially executes both ob_get_contents() and ob_end_clean().

```php
<?php

protected function renderOnlyView($view, $params)
{
    foreach ($params as $key => $value) {
        $$key = $value;
    }
    ob_start();
    include_once Application::$ROOT_DIR . "/views/$view.php";
    return ob_get_clean();
}
```

### 3. call_user_func

#### Example 1

```php
<?php

$func = "str_replace";
$output_single = call_user_func($func, "monkeys", "giraffes", "Hundreds and thousands of monkeys\n");

echo $output_single; // Hundreds and thousands of giraffes
```

#### Example 2

```php
<?php

function func($a, $b){
    echo $a."\r\n";
    echo $b."\r\n";
}

// The first one is the function name, followed by the parameter list
call_user_func("func", 1, 2); // 1, 2
```

### 4. filter_input (form input)

- https://www.youtube.com/watch?v=8uzV9cFyAK8

```php
<?php

$data = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if($data) {
    echo $data;
}
else echo "Data was empty.";
```

### 5. filter_var

- https://www.youtube.com/watch?v=BVFaDrQbgp4

```php
<?php

$input = "<script>alert('Check this');</script>"
echo filter_var($input, FILTER_SANITIZE_STRIPED);
```

### 6. sprintf

- Replace the percent (%) sign by a variable passed as an argument:

```php
<?php

$number = 9;
$str = "Beijing";
$txt = sprintf("There are %u million bicycles in %s.",$number,$str);

echo $txt; // There are 9 million bicycles in Beijing.
```

### 7. \_\_toString

- It is called when an object is passed to a function (esp echo() or print()) when its context is expected to be a string.
- Since an object is not a string, the \_\_toString() handles the transformation of the object into some string representation.

### 8. dirname

- The dirname() function returns the path of the parent directory.

```php
<?php

echo dirname("c:/testweb/home.php"); // c:/testweb/
echo dirname("c:/testweb/home.php", 2); // c:
echo dirname("/testweb/home.php"); // testweb
```

### 9. scandir

- The scandir() function returns an array of files and directories of the specified directory.

### 10. array_diff

- Returns an array containing all the entries from array that are not present in any of the other arrays.
- Keys in the array array are **preserved**.

```php
<?php

$array1 = array("a" => "green", "red", "blue", "red");
$array2 = array("b" => "green", "yellow", "red");
$result = array_diff($array1, $array2);

print_r($result); // Array ( [1] => blue )
```

### 11. pathinfo

- The pathinfo() function returns information about a file path.

```php
<?php

pathinfo(dirname(__DIR__));

// Output
array(3) {
    ["dirname"]=>
    string(22) "C:\Users\Admin\Desktop"
    ["basename"]=>
    string(17) "php-mvc-framework"
    ["filename"]=>
    string(17) "php-mvc-framework"
    ["extension"]=> // if it is file
}
```

### 12. array_map

- The array_map() function sends each value of an array to a user-made function, and returns an array with new values, given by the user-made function.

```php
<?php

function myfunction($v)
{
    return($v * $v);
}

$a = array(1, 2, 3, 4, 5);

print_r(array_map("myfunction", $a)); // Array ( [0] => 1 [1] => 4 [2] => 9 [3] => 16 [4] => 25 )
```

### 13. unset

- The unset() function unsets a variable.

```php
<?php

$a = "Hello world!";
echo "The value of variable 'a' before unset: " . $a . "<br>";
// The value of variable 'a' before unset: Hello world!
unset($a);
echo "The value of variable 'a' after unset: " . $a;
// The value of variable 'a' after unset:
```

## Others

---

### 1. PDO (PHP Data Object)

### 2. PHP_EOL (PHP End of Line)

### 3. $this vs self::class

- Use $this to refer to the current object.
- Use self to refer to the current class.
- In other words, use $this->member for non-static members, use self::$member for static members.

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
```
