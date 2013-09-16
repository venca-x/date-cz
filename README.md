Configuration
-------------

BasePresenter.php

```php

protected function createTemplate( $class = NULL )
{
    $template = parent::createTemplate( $class );
    $template->registerHelper( 'monthNameCZ', callback( new \DateCZ(), 'getMonthName' ) );
    $template->registerHelper( 'dayNameCZ', callback( new \DateCZ(), 'getDayName' ) );
    return $template;
}

```

Usage
-------------

```php
{$dateTime->date|date:'n'|monthNameCZ} (* month name*)

{$dateTime->date|date:'N'|dayNameCZ} (* day name*)

```