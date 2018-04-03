# bzbz-back-end-technical-task


## 1. 7bit/8bit question

128

___
## 2. What is the output of the following code?

011235813213455

___
## 3. Write a function that displays the numbers from 25 to 250 one per line.

```php
for($x = 25; $x <= 250; $x++){
    $string = '';
    $divideBy7 = $x % 7 === 0;
    $divideBy5 = $x % 5 === 0;
    if (!$divideBy5 && !$divideBy7) {
        $string += $x;
    } 
    if ($divideBy7) {
         $string = 'tip';
    }
    if ($divideBy5) {
       $string = $string.'top';
    }
    
    echo $string."\n";
}
```
___
## 4. Describe the classes, interfaces and methods you would use to implement the animals in a Virtual Zoo 

```php
trait Walks {
    public function walk() {
        echo 'walk';
    }
}

trait Flies {
    public function fly() {
        echo 'fly';
    }
}

trait Swims {
    public function swim() {
        echo 'swim';
    }
}

abstract class Animal {
    public function eats(){
        echo 'eat';
    }
}

abstract class WalkingAnimal extends Animal {
    use Walks;
}

abstract class FlyingAnimal extends WalkingAnimal {
    use Flies;
}

abstract class SwimmingAnimal extends Animal {
    use Swims;
}

class Bat extends FlyingAnimal {
    
}

class Dolphin extends SwimmingAnimal {
    
}

class Penguin extends WalkingAnimal {
    use Swims;
}

class Duck extends FlyingAnimal {
    use Swims;
}
```
___
## 5. Video Shop refactor

* Add namespacing
* Move properties to top of class 
* Break out getStatement god-function into smaller methods
* Write tests `./vendor/bin/phpunit tests --testdox`
* Move many methods from Customer to Rental
* Add codeblocks to all methods.
* write toDos: 
  * Are Frequent Renter Points and Total Amount used - could be removed
  * Requirements for price formatting


