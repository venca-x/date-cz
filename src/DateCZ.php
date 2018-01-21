<?php
declare(strict_types=1);

namespace VencaX;

/**
 * Transfer numbers month to month name
 * @author vEnCa-X <venca-x@seznam.cz>
 */
class DateCZ
{
	//definition name of month
	protected $months = [1 => 'leden', 'únor', 'březen', 'duben', 'květen', 'červen', 'červenec', 'srpen', 'září', 'říjen', 'listopad', 'prosinec'];

	//definition name of days
	protected $days = [1 => 'pondělí', 'úterý', 'středa', 'čtvrtek', 'pátek', 'sobota', 'neděle'];

	//definition name of short days
	protected $shortDays = [1 => 'po', 'út', 'st', 'čt', 'pá', 'so', 'ne'];


	/**
	 * Transfer numbers month to month name
	 * @param int $numberMonth
	 * @return string Name of month
	 */
	public function getMonthName($numberMonth = null)
	{
		return $this->getValueArray($numberMonth, $this->months);
	}


	/**
	 * Transfer numbers day to day name
	 * @param int $numberDay
	 * @return string Name of day
	 */
	public function getDayName($numberDay = null)
	{
		return $this->getValueArray($numberDay, $this->days);
	}


	/**
	 * Transfer numbers day to short day name
	 * @param int $numberDay
	 * @return string Short name of day
	 */
	public function getShortDayName($numberDay = null)
	{
		return $this->getValueArray($numberDay, $this->shortDays);
	}


	/**
	 * Search index in array
	 * @param int $index Index in array
	 * @param array $array Array for search
	 * @return null
	 */
	protected function getValueArray($index, $array)
	{
		if (array_key_exists($index, $array)) {
			//Index exists in array
			return $array[$index];
		} else {
			//Index does not exist in array
			return null;
		}
	}
}
