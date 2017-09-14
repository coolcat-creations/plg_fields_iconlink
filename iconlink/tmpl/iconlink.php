<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Iconlink
 *
 * @copyright   Elisa Foltyn, coolcat-creations.com
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

$value = $field->value;

if ($value == '')
{
	return;
}

$attributes = '';

if (!JUri::isInternal($value))
{
	$attributes = ' rel="nofollow noopener noreferrer" target="_blank"';
}

$doc = JFactory::getDocument();
$doc->addStyleDeclaration('dd.field-entry.socialmedia { float: left;}');

$iconclass = $field->fieldparams['iconclass'];
$iconsize = $field->fieldparams['iconsize'];
$target = $field->fieldparams['target'];
$showurl = $field->fieldparams['showurl'];
$linktext = '';

if ($showurl)
{
	$linktext = $value;
}

echo sprintf('<a href="%s"%s target="' . $target . '"><span class="fa ' . $iconclass . ' ' . $iconsize . '"></span> ' . $linktext . '</a>',
	htmlspecialchars($value),
	$attributes,
	htmlspecialchars($value)
);
