[?php use_helper('Boxie') ?]
<fieldset id="sf_fieldset_[?php echo slugString($fieldset) ?]">
  [?php if ('NONE' != $fieldset): ?]
    <legend><strong>[?php echo __($fieldset, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</strong></legend>
  [?php endif;

  $next_field_names = array_keys($fields);
  array_shift($next_field_names);
  ?]

  [?php
    foreach ($fields as $name => $field):
    if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue;

    $show_label = !preg_match('/^'.sfConfig::get('app_boxie_admin_hide_labels_prefix', '_').'/', $name);
    $next_field = array_shift($next_field_names);
    $show_help = !preg_match('/^'.sfConfig::get('app_boxie_admin_hide_labels_prefix', '_').'/', $next_field);

    include_partial('<?php echo $this->getModuleName() ?>/form_field', array(
              'name'       => $name,
              'attributes' => $field->getConfig('attributes', array()),
              'label'      => $field->getConfig('label'),
              'help'       => $field->getConfig('help'),
              'show_label' => $show_label,
              'show_help'  => $show_help,
              'form'       => $form,
              'field'      => $field,
              'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_form_field_'.$name,
    ));

    endforeach; 
  ?]
</fieldset>
