<?php

namespace Piquant\MikadofModules\Shortcodes\Lib;

use Piquant\MikadofModules\CallToAction\CallToAction;
use Piquant\MikadofModules\Counter\Countdown;
use Piquant\MikadofModules\Counter\Counter;
use Piquant\MikadofModules\ElementsHolder\ElementsHolder;
use Piquant\MikadofModules\ElementsHolderItem\ElementsHolderItem;
use Piquant\MikadofModules\GoogleMap\GoogleMap;
use Piquant\MikadofModules\Separator\Separator;
use Piquant\MikadofModules\PieCharts\PieChartBasic\PieChartBasic;
use Piquant\MikadofModules\PieCharts\PieChartDoughnut\PieChartDoughnut;
use Piquant\MikadofModules\PieCharts\PieChartDoughnut\PieChartPie;
use Piquant\MikadofModules\PieCharts\PieChartWithIcon\PieChartWithIcon;
use Piquant\MikadofModules\Shortcodes\AnimationsHolder\AnimationsHolder;
use Piquant\MikadofModules\Shortcodes\Icon\Icon;
use Piquant\MikadofModules\Shortcodes\IconSlider\IconSlider;
use Piquant\MikadofModules\Shortcodes\IconSlider\IconSliderItem;
use Piquant\MikadofModules\Shortcodes\ImageGallery\ImageGallery;
use Piquant\MikadofModules\Shortcodes\InfoCardSlider\InfoCardSlider;
use Piquant\MikadofModules\Shortcodes\InfoCardSlider\InfoCardSliderItem;
use Piquant\MikadofModules\Shortcodes\InteractiveBanner\InteractiveBanner;
use Piquant\MikadofModules\Shortcodes\ShapeSeparator\ShapeSeparator;
use Piquant\MikadofModules\Shortcodes\TabbedGallery\TabbedGalleryHolder;
use Piquant\MikadofModules\Shortcodes\TabbedGallery\TabbedGalleryItem;
use Piquant\MikadofModules\Shortcodes\TextSliderHolder\TextSliderHolder;
use Piquant\MikadofModules\Shortcodes\TextSliderItem\TextSliderItem;
use Piquant\MikadofModules\SocialShare\SocialShare;
use Piquant\MikadofModules\Team\Team;
use Piquant\MikadofModules\OrderedList\OrderedList;
use Piquant\MikadofModules\UnorderedList\UnorderedList;
use Piquant\MikadofModules\Message\Message;
use Piquant\MikadofModules\ProgressBar\ProgressBar;
use Piquant\MikadofModules\IconListItem\IconListItem;
use Piquant\MikadofModules\Tabs\Tabs;
use Piquant\MikadofModules\Tab\Tab;
use Piquant\MikadofModules\PricingTables\PricingTables;
use Piquant\MikadofModules\PricingTable\PricingTable;
use Piquant\MikadofModules\Accordion\Accordion;
use Piquant\MikadofModules\AccordionTab\AccordionTab;
use Piquant\MikadofModules\BlogList\BlogList;
use Piquant\MikadofModules\Shortcodes\Button\Button;
use Piquant\MikadofModules\Blockquote\Blockquote;
use Piquant\MikadofModules\CustomFont\CustomFont;
use Piquant\MikadofModules\Highlight\Highlight;
use Piquant\MikadofModules\VideoButton\VideoButton;
use Piquant\MikadofModules\Dropcaps\Dropcaps;
use Piquant\MikadofModules\Shortcodes\IconWithText\IconWithText;
use Piquant\MikadofModules\Shortcodes\TwitterSlider\TwitterSlider;
use Piquant\MikadofModules\Shortcodes\Process\Process;
/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader {
	/**
	 * @var private instance of current class
	 */
	private static $instance;
	/**
	 * @var array
	 */
	private $loadedShortcodes = array();

	/**
	 * Private constuct because of Singletone
	 */
	private function __construct() {}

	/**
	 * Private sleep because of Singletone
	 */
	private function __wakeup() {}

	/**
	 * Private clone because of Singletone
	 */
	private function __clone() {}

	/**
	 * Returns current instance of class
	 * @return ShortcodeLoader
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			return new self;
		}

		return self::$instance;
	}

	/**
	 * Adds new shortcode. Object that it takes must implement ShortcodeInterface
	 * @param ShortcodeInterface $shortcode
	 */
	private function addShortcode(ShortcodeInterface $shortcode) {
		if(!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
			$this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
		}
	}

	/**
	 * Adds all shortcodes.
	 *
	 * @see ShortcodeLoader::addShortcode()
	 */
	private function addShortcodes() {
		$this->addShortcode(new ElementsHolder());
		$this->addShortcode(new ElementsHolderItem());
		$this->addShortcode(new Team());
		$this->addShortcode(new Icon());
		$this->addShortcode(new CallToAction());
		$this->addShortcode(new OrderedList());
		$this->addShortcode(new UnorderedList());
		$this->addShortcode(new Message());
		$this->addShortcode(new Counter());
		$this->addShortcode(new Countdown());
		$this->addShortcode(new ProgressBar());
		$this->addShortcode(new IconListItem());
		$this->addShortcode(new Tabs());
		$this->addShortcode(new Tab());
		$this->addShortcode(new PricingTables());
		$this->addShortcode(new PricingTable());
		$this->addShortcode(new PieChartPie());
		$this->addShortcode(new PieChartDoughnut());
		$this->addShortcode(new Accordion());
		$this->addShortcode(new AccordionTab());
		$this->addShortcode(new BlogList());
		$this->addShortcode(new Button());
		$this->addShortcode(new Blockquote());
		$this->addShortcode(new CustomFont());
		$this->addShortcode(new Highlight());
		$this->addShortcode(new ImageGallery());
		$this->addShortcode(new GoogleMap());
		$this->addShortcode(new Separator());
		$this->addShortcode(new VideoButton());
		$this->addShortcode(new Dropcaps());
		$this->addShortcode(new IconWithText());
		$this->addShortcode(new SocialShare());
		$this->addShortcode(new TwitterSlider());
		$this->addShortcode(new Process());
		$this->addShortcode(new ShapeSeparator());
		$this->addShortcode(new TextSliderHolder());
		$this->addShortcode(new TextSliderItem());
		$this->addShortcode(new InfoCardSlider());
		$this->addShortcode(new InfoCardSliderItem());
		$this->addShortcode(new IconSlider());
		$this->addShortcode(new IconSliderItem());
		$this->addShortcode(new AnimationsHolder());
		$this->addShortcode(new InteractiveBanner());
		$this->addShortcode(new TabbedGalleryHolder());
		$this->addShortcode(new TabbedGalleryItem());
	}
	/**
	 * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
	 * of each shortcode object
	 */
	public function load() {
		$this->addShortcodes();

		foreach ($this->loadedShortcodes as $shortcode) {
			add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
		}

	}
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();