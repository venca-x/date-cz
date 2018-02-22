<?php
declare(strict_types=1);

namespace VencaX\Components\DateCZ\Tests\App;

use Nette;
use VencaX;

final class DateCZPresenter extends Nette\Application\UI\Presenter
{
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


	public function renderMonths()
	{
		$this->template->months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 'x'];
	}


	public function renderDays()
	{
		$this->template->days = [1, 2, 3, 4, 5, 6, 7, 'x'];
	}


	public function renderShortDays()
	{
		$this->template->shortDays = [1, 2, 3, 4, 5, 6, 7, 'x'];
	}
}
