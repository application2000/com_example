<?php
/**
 * @package    example
 *
 * @author     alexandree <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

use Joomla\CMS\Language\Text;

defined('_JEXEC') or die;

/**
 * Example helper.
 *
 * @package     A package name
 * @since       1.0
 */
class ExampleHelper
{
	/**
	 * Render submenu.
	 *
	 * @param   string $vName The name of the current view.
	 *
	 * @return  void.
	 *
	 * @since   1.0
	 */
	public function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(Text::_('COM_EXAMPLE'), 'index.php?option=com_example&view=example', $vName == 'example');

		if (JComponentHelper::isEnabled('com_fields'))
		{
			JHtmlSidebar::addEntry(
				JText::_('JGLOBAL_FIELDS'),
				'index.php?option=com_fields&context=com_example.spring',
				$vName == 'fields.fields'
			);

			JHtmlSidebar::addEntry(
				JText::_('JGLOBAL_FIELD_GROUPS'),
				'index.php?option=com_fields&view=groups&context=com_example.spring',
				$vName == 'fields.groups'
			);
		}
	}

	/**
	 * Returns a valid section for com_example. If it is not valid then null
	 * is returned.
	 *
	 * @param   string $section The section to get the mapping for
	 *
	 * @return  string|null  The new section
	 *
	 * @since   3.7.0
	 */
	public static function validateSection($section)
	{
		if (JFactory::getApplication()->isClient('site'))
		{
			// On the front end we need to map some sections
			switch ($section)
			{
				// Editing an spring season
				case 'springform':
					$section = 'spring';
					break;
				// Editing an summer season
				case 'summerform':
					$section = 'summer';
					break;
                // Editing an autumn season
				case 'autumnform':
					$section = 'autumn';
					break;

				// Editing an winter season
				case 'winterform':
					$section = 'winter';
					break;

			}
		}

		if (!in_array($section, ['spring', 'summer', 'autumn', 'winter'], true))
		{
			// We don't know other sections
			return null;
		}

		return $section;
	}

	/**
	 * Returns valid contexts
	 *
	 * @return  array
	 *
	 * @since   3.7.0
	 */
	public static function getContexts()
	{
		JFactory::getLanguage()->load('com_example', JPATH_ADMINISTRATOR);

		$contexts = array(
			'com_example.spring' => Text::_('COM_EXAMPLE_SPRING'),
			'com_example.summer' => Text::_('COM_EXAMPLE_SUMMER'),
			'com_example.autumn' => Text::_('COM_EXAMPLE_AUTUMN'),
			'com_example.winter' => Text::_('COM_EXAMPLE_WINTER')
		);

		return $contexts;
	}


}
