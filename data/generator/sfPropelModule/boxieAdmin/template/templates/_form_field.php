[?php if ($field->isPartial()): ?]
  [?php include_partial('<?php echo $this->getModuleName() ?>/'.$name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php elseif ($field->isComponent()): ?]
  [?php include_component('<?php echo $this->getModuleName() ?>', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php else: ?]
  <div class="[?php echo $class ?][?php $form[$name]->hasError() and print ' errors' ?]">
    [?php echo $form[$name]->renderError() ?]
    <div>
      [?php if($form[$name]->getWidget() instanceof sfWidgetFormInputCheckbox): ?]
        [?php $className='check'; ?]
      [?php else: ?>
        [?php $className=''; ?]
      [?php endif; ?>
      [?php echo $form[$name]->renderLabel($label,array('class'=>$className)) ?]

      [?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?]

      [?php if ($help): ?]
        <small>[?php echo __($help, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</small>
      [?php elseif ($help = $form[$name]->renderHelp()): ?]
        <small>[?php echo $help ?]</small>
      [?php endif; ?]
    </div>
  </div>
[?php endif; ?]
