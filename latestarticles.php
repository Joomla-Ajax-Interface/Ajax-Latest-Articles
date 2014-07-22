<?php defined('_JEXEC') or die;

/**
 * File       session.php
 * Created    5/20/13 5:28 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

// Import library dependencies
jimport('joomla.plugin.plugin');

class plgAjaxLatestarticles extends JPlugin
{

	function onAjaxLatestarticles()
	{

		// Create a new query object.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query
			->select($db->quoteName(array('title', 'introtext', 'fulltext')))
			->from($db->quoteName('#__content'))
			->order($db->quoteName('modified') . ' ASC');

		$db->setQuery($query, 0, $this->params->get('limit', 5));

		return $db->loadObjectList();
	}
}
