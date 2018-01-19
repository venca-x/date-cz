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
| 0.1.x       | \>= 5.5                   | Nette 2.4, 2.3    |


Installation
------------

 1. Add the plugin to your dependencies:
 
	```
	composer require venca-x/date-cz:~1.0
	```

    **For dev version install (only ofr PHP >= 7.1)**:
    ```
    composer require venca-x/date-cz:~1.0
    ```

Configuration
-------------

BasePresenter.php

```php

protected function beforeRender()
{
    parent::beforeRender();

    $this->template->addFilter('monthNameCZ', function ($text) {
        $dateCZ = new \DateCZ();
        return $dateCZ->getMonthName($text);
    });
    
    $this->template->addFilter('dayNameCZ', function ($text) {
        $dateCZ = new \DateCZ();
        return $dateCZ->getDayName($text);
    });
    
    $this->template->addFilter('dayNameShortCZ', function ($text) {
        $dateCZ = new \DateCZ();
        return $dateCZ->getShortDayName($text);
    });
}

```

Usage
-------------

```php
{$dateTime->date|date:'n'|monthNameCZ} (* month name*)

{$dateTime->date|date:'N'|dayNameCZ} (* day name*)

{$dateTime->date|date:'N'|dayNameShortCZ} (* short day name*)

```
