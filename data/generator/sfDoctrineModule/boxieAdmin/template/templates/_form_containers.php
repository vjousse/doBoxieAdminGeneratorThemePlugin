[?php use_helper('Boxie') ?]
[?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?]
    <div id="[?php echo slugString($fieldset) ?]" class="content tabbed_admin" style="[?php echo ($visible = !isset($visible)) ? '' : 'display:none' ?]">
        [?php if ($form->hasGlobalErrors()): ?]
          [?php echo $form->renderGlobalErrors() ?]
        [?php endif; ?]

        [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]
        

        [?php include_partial('<?php echo $this->getModuleName() ?>/form_fieldset', array(
              '<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>,
              'form'      => $form,
              'fields'    => $fields,
              'fieldset'  => 'NONE'
      )) ?]
    </div>
[?php endforeach ?]
