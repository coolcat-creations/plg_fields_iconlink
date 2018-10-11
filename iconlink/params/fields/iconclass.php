<?php
defined('_JEXEC') or die();
JForm::addFormPath(JPATH_PLUGINS . '/fields/iconlink/params/');

jimport('joomla.form.formfield');


// The class name must always be the same as the filename (in camel case)
class JFormFieldIconclass extends JFormField {

	//The field class must know its own type through the variable $type.
	protected $type = 'Iconclass';

	public function getInput()
	{
		/*making sure jQuery is loaded first */
		JHtml::_('jquery.framework');
		JHtml::_('bootstrap.framework');

		JHtml::_('stylesheet', 'media/plg_fields_iconlink/css/bootstrap-iconpicker.css');
		JHtml::_('stylesheet', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');


		JHtml::_('script', 'media/plg_fields_iconlink/js/bootstrap-iconpicker-iconset-all.js');
		JHtml::_('script', 'media/plg_fields_iconlink/js/bootstrap-iconpicker.js');


		$plugin = JPluginHelper::getPlugin('fields', 'iconlink');
		if ($plugin)
		{
			$pluginParams = new JRegistry($plugin->params);
			$iconleft = $pluginParams->get('iconleft');
			$iconright = $pluginParams->get('iconright');
		}

		$return = ' <div id="'. $this->id .'-wrapper" /></div>';

		$return .= "<script>
			(function ($) {
				$('#". $this->id ."-wrapper').iconpicker({
             	align: 'left', 
    			arrowClass: 'btn-success',
			    arrowPrevIconClass: 'fa " . $iconleft . "',
			    arrowNextIconClass: 'fa " . $iconright . "',
			    cols: 5,
			    rows:2,
			    footer: true,
			    header: true,
			    iconset: 'fontawesome',
			    labelHeader: '" . JText::sprintf( 'PLG_FIELDS_ICONLINK_PAGESINDEX', '{0}', '{1}' ) . "',
			    labelFooter: '" . JText::sprintf( 'PLG_FIELDS_ICONLINK_ICONSINDEX', '{0}', '{1}', '{2}' ) . "',
			    placement: 'bottom', 
			    search: true,
			    searchText: '". JText::_('PLG_FIELDS_ICONLINK_SEARCHTEXT') . "',
			    selectedClass: 'btn-primary',
			    unselectedClass: 'btn-default',
			    iconClass: 'fontawesome',
                iconClassFix: 'fa fa-'
				});
				
				var myfield = $('#" . $this->id . "-wrapper'),
					input = $('input', myfield);
					input.attr({'id': '" . $this->id . "', 'name': '" . $this->name . "'});
					input.val('" . $this->value . "');
				
			})(jQuery);
		</script>";

		return $return;
	}

}

?>


