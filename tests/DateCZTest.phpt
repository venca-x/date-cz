<?php

use Tester\Assert;

# Nacteme knihovny Testeru
require __DIR__ . '/../vendor/autoload.php';          # pri instalaci Composerem

# Konfigurace prostredi velmi zprehledni vypisy chyb.
# Nemusite pouzit, pokud preferujete vychozi vypis PHP.
Tester\Environment::setup();

$dateCZ = new DateCZ;

//months
Assert::same( 'leden', $dateCZ->getMonthName( 1 ) );
Assert::same( 'únor', $dateCZ->getMonthName( 2 ) );
Assert::same( 'březen', $dateCZ->getMonthName( 3 ) );
Assert::same( 'duben', $dateCZ->getMonthName( 4 ) );
Assert::same( 'květen', $dateCZ->getMonthName( 5 ) );
Assert::same( 'červen', $dateCZ->getMonthName( 6 ) );
Assert::same( 'červenec', $dateCZ->getMonthName( 7 ) );
Assert::same( 'srpen', $dateCZ->getMonthName( 8 ) );
Assert::same( 'září', $dateCZ->getMonthName( 9 ) );
Assert::same( 'říjen', $dateCZ->getMonthName( 10 ) );
Assert::same( 'listopad', $dateCZ->getMonthName( 11 ) );
Assert::same( 'prosinec', $dateCZ->getMonthName( 12 ) );       

//wrong values
Assert::same( NULL, $dateCZ->getMonthName( 0 ) );
Assert::same( NULL, $dateCZ->getMonthName( 13 ) );
Assert::same( NULL, $dateCZ->getMonthName(  ) );
Assert::same( NULL, $dateCZ->getMonthName( "" ) );
Assert::same( NULL, $dateCZ->getMonthName( "asdf" ) );
Assert::same( NULL, $dateCZ->getMonthName( NULL ) );


//days
Assert::same( 'pondělí', $dateCZ->getDayName( 1 ), "xxx1" );
Assert::same( 'úterý', $dateCZ->getDayName( 2 ) );
Assert::same( 'středa', $dateCZ->getDayName( 3 ) );
Assert::same( 'čtvrtek', $dateCZ->getDayName( 4 ) );
Assert::same( 'pátek', $dateCZ->getDayName( 5 ) );
Assert::same( 'sobota', $dateCZ->getDayName( 6 ) );
Assert::same( 'neděle', $dateCZ->getDayName( 7 ) );

//wrong values
Assert::same( NULL, $dateCZ->getDayName( 0 ) );
Assert::same( NULL, $dateCZ->getDayName( 8 ) );
Assert::same( NULL, $dateCZ->getDayName(  ) );
Assert::same( NULL, $dateCZ->getDayName( "" ) );
Assert::same( NULL, $dateCZ->getDayName( "asdf" ) );
Assert::same( NULL, $dateCZ->getDayName( NULL ) );

//short days
Assert::same( 'po', $dateCZ->getShortDayName( 1 ) );
Assert::same( 'út', $dateCZ->getShortDayName( 2 ) );
Assert::same( 'st', $dateCZ->getShortDayName( 3 ) );
Assert::same( 'čt', $dateCZ->getShortDayName( 4 ) );
Assert::same( 'pá', $dateCZ->getShortDayName( 5 ) );
Assert::same( 'so', $dateCZ->getShortDayName( 6 ) );
Assert::same( 'ne', $dateCZ->getShortDayName( 7 ) );

//short days - wrong values
Assert::same( NULL, $dateCZ->getShortDayName( 0 ) );
Assert::same( NULL, $dateCZ->getShortDayName( 8 ) );
Assert::same( NULL, $dateCZ->getShortDayName(  ) );
Assert::same( NULL, $dateCZ->getShortDayName( "" ) );
Assert::same( NULL, $dateCZ->getShortDayName( "asdf" ) );
Assert::same( NULL, $dateCZ->getShortDayName( NULL ) );