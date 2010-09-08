[?php

/**
 * <?php echo $this->getModuleName() ?> module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getModuleName()."\n" ?>
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class Base<?php echo ucfirst($this->getModuleName()) ?>GeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? '<?php echo $this->params['route_prefix'] ?>' : '<?php echo $this->params['route_prefix'] ?>_'.$action;
  }

  public function linkToSave($object, $params)
  {
    return '<li class="sf_admin_action_save"><input type="submit" class="button" value="'.__($params['label'], array(), 'sf_admin').'" /></li>';
  }
  

  public function linkToSaveAndAdd($object, $params)
  {
    if (!$object->isNew())
    {
      return '';
    }

    return '<li class="sf_admin_action_save_and_add"><input type="submit" class="button altbutton" value="'.__($params['label'], array(), 'sf_admin').'" name="_save_and_add" /></li>';
  }


}
