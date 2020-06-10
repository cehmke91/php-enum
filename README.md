# PHP-ENUM

Provides a simple to use interface to create enums in PHP which allows both static comparisons and instanced interactions.

## Installation
    composer require cehmke/php-enum

## How to use

Create a new class extending cehmke91/enum and declare some constants.
That's it.

    <?php

    use Cehmke/Enum;

    class Colour extends Enum
    {
        public const RED = 'red';
        public const BLUE = 'blue;
        public const GREEN = 'green';
    }

The underlying enum class uses reflection to pull the declared constants and use them in a more traditional enum context. so you can easily create a new instance of the enum as follows:

    $colour = new Colour(Colour::RED);

This will create a new instance of the enum holding the value of red.

---

## Static functions

**contains** : returns whether the enum containst the given element. <br/>
`Colour::contains('red')` > true <br/>
`Colour::contains('orange')` > false <br/>

**elements** : returns an array of the elements available to the enum. </br>
`Colour::elements()` > ['red', 'blue', 'green']

---

## Instance functions

You can then create an instance of the enum like: `$colour = new Colour(Colour::RED)` <br/>
*Note: an instance must be initialized with a valid value* <br/>

**get** : returns the value of the instance. <br/>
`$colour->get()` > 'red'

**set** : sets a new value on the instance. <br/>
`$colour->set(Colour::BLUE)` > $colour is now set to 'blue'<br/>

**is** : performs a truth comparison on the instance. <br/>
`$colour->is('blue')` > true <br/>
`$colour->is('orange')` > false <br/>

**in** : returns whether the instance value is found on an array. <br/>
`$colour->in(['red', 'green'])` > false
