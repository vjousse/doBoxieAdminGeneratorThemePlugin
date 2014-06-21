[?php use_helper('Boxie') ?]
[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]

<div class="sf_admin_form">
    [?php echo $form->renderHiddenFields(false) ?]

    [?php if ($form->hasGlobalErrors()): ?]
      [?php echo $form->renderGlobalErrors() ?]
    [?php endif; ?]

    [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

    [?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?]

      [?php include_partial(
          '<?php echo $this->getModuleName() ?>/form_fieldset',
          array(
              '<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>,
              'form'      => $form,
              'fields'    => $fields,
              'fieldset'  => $fieldset
      )) ?]

    [?php endforeach ?]

    [?php include_partial('<?php echo $this->getModuleName() ?>/form_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
</div>
