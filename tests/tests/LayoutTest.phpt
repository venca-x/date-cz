<?php
declare(strict_types=1);

namespace VencaX\Components\NettePaginator\Tests\Tests;

use Nette;
use Tester;

require_once __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../app/DateCZPresenter.php';
require_once __DIR__ . '/../app/Router.php';

class LayoutTest extends Tester\TestCase
{
	/** @var Nette\Application\IPresenterFactory */
	private $presenterFactory;

	/** @var Nette\DI\Container */
	private $container;

	private $presenter = 'DateCZ';


	/**
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();
		$this->container = $this->createContainer();
		$this->presenterFactory = $this->container->getByType('Nette\\Application\\IPresenterFactory');
	}


	/**
	 * @return void
	 */
	public function tearDown()
	{
		parent::tearDown();
	}


	/**
	 * @return Nette\DI\Container
	 */
	private function createContainer()
	{
		$configurator = new Nette\Configurator();

		$configurator->setTempDirectory(TEMP_DIR);
		$configurator->addConfig(__DIR__ . '/../app/config/config.neon');

		return $configurator->createContainer();
	}


	/**
	 * @return Nette\Application\IPresenter
	 */
	private function createPresenter()
	{
		$presenter = $this->presenterFactory->createPresenter($this->presenter);
		$presenter->autoCanonicalize = false;
		return $presenter;
	}


	/**
	 * @return void
	 */
	public function testDays()
	{
		$presenter = $this->createPresenter();
		$request = new Nette\Application\Request($this->presenter, 'GET', ['action' => 'days']);
		$response = $presenter->run($request);

		Tester\Assert::true($response instanceof Nette\Application\Responses\TextResponse);

		$html = (string) $response->getSource();
		Tester\Assert::matchFile(__DIR__ . '/expected/days.phtml', $html);
	}


	/**
	 * @return void
	 */
	public function testMonths()
	{
		$presenter = $this->createPresenter();
		$request = new Nette\Application\Request($this->presenter, 'GET', ['action' => 'months']);
		$response = $presenter->run($request);

		Tester\Assert::true($response instanceof Nette\Application\Responses\TextResponse);

		$html = (string) $response->getSource();
		Tester\Assert::matchFile(__DIR__ . '/expected/months.phtml', $html);
	}


	/**
	 * @return void
	 */
	public function testShortDays()
	{
		$presenter = $this->createPresenter();
		$request = new Nette\Application\Request($this->presenter, 'GET', ['action' => 'shortDays']);
		$response = $presenter->run($request);

		Tester\Assert::true($response instanceof Nette\Application\Responses\TextResponse);

		$html = (string) $response->getSource();
		Tester\Assert::matchFile(__DIR__ . '/expected/shortDays.phtml', $html);
	}
}

$testCase = new LayoutTest;
$testCase->run();
