date-cz
===============

Nette addon for czech days and month names

Installation
------------

 1. Add the plugin to your dependencies:
 
	composer require venca-x/date-cz:~1.0

	
	////////////////////////////////////////////////////////
        // composer.json

        {
           // ...
           "require": {
               // ...
			   "venca-x/date-cz": "@dev",
           }
        }

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