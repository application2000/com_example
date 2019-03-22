<?php
/**
 * @package    example
 *
 * @author     alexandree <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Layout\FileLayout;

defined('_JEXEC') or die;

HTMLHelper::_('script', 'com_example/script.js', array('version' => 'auto', 'relative' => true));
HTMLHelper::_('stylesheet', 'com_example/style.css', array('version' => 'auto', 'relative' => true));

$layout = new FileLayout('example.page');
$data = array();
$data['text'] = 'Hello Joomla!';
echo $layout->render($data);
