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

  public function linkToEdit($object, $params)
  {
    return '<li class="sf_admin_action_edit">'.link_to('<img src="/css/boxie/img/led-ico/pencil.png" alt="' . __($params['label'], array(), 'sf_admin') . '" />&nbsp;' . __($params['label'], array(), 'sf_admin'), $this->getUrlForAction('edit'), $object,'class=ico').'</li>';
  }

  public function linkToDelete($object, $params)
  {
    if ($object->isNew())
    {
      return '';
    }

    return '<li class="sf_admin_action_delete">'.link_to('<img src="/css/boxie/img/led-ico/delete.png" alt="' . __($params['label'], array(), 'sf_admin') . '" />&nbsp;' . __($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('class'=>'ico','method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])).'</li>';
  }

  public function linkToNew($params)
  {
    return '<li class="sf_admin_action_new">'.link_to(__($params['label'], array(), 'sf_admin') . '<img src="/css/boxie/img/led-ico/add.png" alt="' . __($params['label'], array(), 'sf_admin') . '" />', '@'.$this->getUrlForAction('new'),array('class'=>'ico')).'</li>';
  }

  public function linkToSave($object, $params)
  {
    return '<li class="sf_admin_action_save"><input type="submit" class="button" value="'.__($params['label'], array(), 'sf_admin').'" /></li>';
  }
  
  public function linkToList($params)
  {
    return '<li class="sf_admin_action_list">'.link_to('<img src="/css/boxie/img/led-ico/arrow_undo.png" alt="' . __($params['label'], array(), 'sf_admin') . '" /> ' . __($params['label'], array(), 'sf_admin'), '@'.$this->getUrlForAction('list'),array('class'=>'ico')).'</li>';
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
