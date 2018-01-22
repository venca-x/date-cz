Date-cz
===============
[![Build Status](https://travis-ci.org/venca-x/date-cz.svg)](https://travis-ci.org/venca-x/date-cz) 
[![Latest Stable Version](https://poser.pugx.org/venca-x/date-cz/v/stable.svg)](https://packagist.org/packages/venca-x/date-cz) 
[![Total Downloads](https://poser.pugx.org/venca-x/date-cz/downloads.svg)](https://packagist.org/packages/venca-x/date-cz) 
[![Latest Unstable Version](https://poser.pugx.org/venca-x/date-cz/v/unstable.svg)](https://packagist.org/packages/venca-x/date-cz) 
[![License](https://poser.pugx.org/venca-x/date-cz/license.svg)](https://packagist.org/packages/venca-x/date-cz)


Nette addon for czech days and month names

| Version     | PHP&nbsp;&nbsp;&nbsp;     | Recommended&nbsp;Nette |
| ---         | ---                       | ---               |
| dev-master  | \>= 7.1                   | Nette 3.0         |
| 1.1.x       | \>= 7.1                   | Nette 3.0         |
| 1.0.x       | \>= 5.5                   | Nette 2.4, 2.3    |


Installation
------------

Install plugin to your dependencies with composer:

```
composer require venca-x/date-cz:^1.1
```

**For dev version install**:
```
composer require venca-x/date-cz:dev-master
```

Configuration
-------------

Register filter for Nette/Layout. You do not have to use Nette/Layout, then call **$dateCZ->getMonthName($text)** in php code.

BasePresenter.php

```php
use VencaX;
//...
protected function beforeRender()
{
    parent::beforeRender();

    $this->template->addFilter('monthNameCZ', function ($dayNumber) {
        $dateCZ = new VencaX\DateCZ();
        return $dateCZ->getMonthName($dayNumber);
    });
    
    $this->template->addFilter('dayNameCZ', function ($dayNumber) {
        $dateCZ = new VencaX\DateCZ();
        return $dateCZ->getDayName($dayNumber);
    });
    
    $this->template->addFilter('dayNameShortCZ', function ($dayNumber) {
        $dateCZ = new VencaX\DateCZ();
        return $dateCZ->getShortDayName($dayNumber);
    });
}

```

Usage
-------------

To display the correct day use PHP function for formating date:

| Format | Description     | Explain|
| ---         | ---                       | ---               |
| 'n'    | Numeric representation of a month, without leading zeros | 1 through 12 |
| 'N'    | ISO-8601 numeric representation of the day of the week (added in PHP 5.1.0) | 1 (for Monday) through 7 (for Sunday) |

Use in Nette/Layout:
```php
{$dateTime->date|date:'n'|monthNameCZ} (* month name*)

{$dateTime->date|date:'N'|dayNameCZ} (* day name*)

{$dateTime->date|date:'N'|dayNameShortCZ} (* short day name*)
```


Use in PHP:
```php
$dateCZ = new VencaX\DateCZ();
echo $dateCZ->monthNameCZ($dateTime->date->format('n')); //month name

echo $dateCZ->dayNameCZ($dateTime->date->format('N')); //day name

echo $dateCZ->dayNameShortCZ($dateTime->date->format('N')); //short day name
```


Output example
-------------
```php
//monthNameCZ
echo $dateCZ->monthNameCZ(1); //leden
echo $dateCZ->monthNameCZ(2); //únor
echo $dateCZ->monthNameCZ(3); //březen
echo $dateCZ->monthNameCZ(4); //duben
echo $dateCZ->monthNameCZ(5); //květen
echo $dateCZ->monthNameCZ(6); //červen
echo $dateCZ->monthNameCZ(7); //červenec
echo $dateCZ->monthNameCZ(8); //srpen
echo $dateCZ->monthNameCZ(9); //září
echo $dateCZ->monthNameCZ(10); //říjen
echo $dateCZ->monthNameCZ(11); //listopad
echo $dateCZ->monthNameCZ(12); //prosinec

//dayNameCZ
echo $dateCZ->dayNameCZ(1); //pondělí
echo $dateCZ->dayNameCZ(2); //úterý
echo $dateCZ->dayNameCZ(3); //středa
echo $dateCZ->dayNameCZ(4); //čtvrtek
echo $dateCZ->dayNameCZ(5); //pátek
echo $dateCZ->dayNameCZ(6); //sobota
echo $dateCZ->dayNameCZ(7); //neděle

//dayNameShortCZ
echo $dateCZ->dayNameShortCZ(1); //po
echo $dateCZ->dayNameShortCZ(2); //út
echo $dateCZ->dayNameShortCZ(3); //st
echo $dateCZ->dayNameShortCZ(4); //čt
echo $dateCZ->dayNameShortCZ(5); //pá
echo $dateCZ->dayNameShortCZ(6); //so
echo $dateCZ->dayNameShortCZ(7); //ne
```