date-cz
===============

Nette addon for czech days and month names

Installation
------------

 1. Add the bundle to your dependencies:

        // composer.json

        {
           // ...
           "require": {
               // ...
			   "venca-x/date-cz": "@dev",
           }
        }

 2. Use Composer to download and install the bundle:

        composer update

Configuration
-------------

BasePresenter.php

```php

protected function createTemplate( $class = NULL )
{
    $template = parent::createTemplate( $class );
    $template->registerHelper( 'monthNameCZ', callback( new \DateCZ(), 'getMonthName' ) );
    $template->registerHelper( 'dayNameCZ', callback( new \DateCZ(), 'getDayName' ) );
    $template->registerHelper( 'dayNameShortCZ', callback( new \DateCZ(), 'getShortDayName' ) );
    return $template;
}

```

Usage
-------------

```php
{$dateTime->date|date:'n'|monthNameCZ} (* month name*)

{$dateTime->date|date:'N'|dayNameCZ} (* day name*)

{$dateTime->date|date:'N'|dayNameShortCZ} (* short day name*)

```