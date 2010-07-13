[?php if ($field->isPartial()): ?]
  [?php 
  if (strpos($field->getName(), '/'))
  {
    $elements = explode('/', $field->getName());
    
    $module = $elements[0];
    $action = $elements[1];
  }
  else
  {
    $module = $this->getModuleName();
    $action = $name;
  }
  ?]
  [?php include_partial("$module/".$action, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php elseif ($field->isComponent()): ?]
  [?php include_component('<?php echo $this->getModuleName() ?>', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php else: ?]
    <dt>
        [?php if($form[$name]->getWidget() instanceof sfWidgetFormInputCheckbox): ?]
          [?php $className='check'; ?]
        [?php else: ?>
          [?php $className=''; ?]
        [?php endif; ?>
        [?php echo $form[$name]->renderLabel($label,array('class'=>$className)) ?]
    </dt>
    <dd>
        [?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?]
        
        <small>
            <strong>[?php echo $form[$name]->renderError() ?]</strong><br>
            [?php if ($help): ?]
              <small>[?php echo __($help, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</small>
            [?php elseif ($help = $form[$name]->renderHelp()): ?]
              <small>[?php echo $help ?]</small>
            [?php endif; ?]
        </small>
    </dd>
[?php endif; ?]
