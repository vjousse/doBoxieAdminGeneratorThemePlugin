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
    <label for="[?php echo $name ?]">
        [?php if($form[$name]->getWidget() instanceof sfWidgetFormInputCheckbox): ?]
          [?php $className='check'; ?]
        [?php else: ?]
          [?php $className=''; ?]
        [?php endif; ?]
        [?php echo $form[$name]->renderLabel($label,array('class'=>$className)) ?]

        [?php unset($className) ?]
    </label>
    [?php $new_classes = array() ?]
    [?php if ($form[$name]->hasError()): ?]
        [?php $new_classes = array('class' => 'error') ?]
    [?php endif ?]

    [?php if (in_array($name, array_keys($form->getEmbeddedForms()))):
        $embedded = $form->getEmbeddedForm($name);
        $embedded->renderUsing('list');
        echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : array_merge($attributes, $new_classes)) ?]
    [?php else: ?]
        [?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : array_merge($attributes, $new_classes)) ?]
    [?php endif; ?]
    <br>
    <small>
        [?php if ($help): ?]
          [?php echo __($help, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]
        [?php elseif ($help = $form[$name]->renderHelp()): ?]
          [?php echo $help ?]
        [?php endif; ?]
    </small>
[?php endif; ?]
