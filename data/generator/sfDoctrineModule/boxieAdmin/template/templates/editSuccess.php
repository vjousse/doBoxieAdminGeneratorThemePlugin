[?php use_helper('I18N', 'Date', 'Boxie') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

<div id="sf_admin_container">

    <div id="box1" class="box box-100"><!-- box full-width -->
        [?php echo form_tag_for($form, '@<?php echo $this->params['route_prefix'] ?>',array('class'=>'fields sf_admin_form')) ?]
        [?php echo $form->renderHiddenFields(false) ?]
            <div class="boxin">
                <div class="header">
                    <h3>[?php echo <?php echo $this->getI18NString('edit.title') ?> ?]</h3>

                    [?php if (sfConfig::get('app_boxie_admin_show_tabs', false)): ?]
                        [?php include_partial('<?php echo $this->getModuleName() ?>/header_tabs', array('fields' => $configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit'))) ?]
                    [?php endif ?]
                </div>

                [?php if (sfConfig::get('app_boxie_admin_show_tabs', false)): ?]

                    [?php include_partial(
                        '<?php echo $this->getModuleName() ?>/form_containers',
                        array(
                            '<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>,
                            'form' => $form,
                            'configuration' => $configuration,
                            'helper' => $helper
                    )) ?]

                    [?php include_partial('<?php echo $this->getModuleName() ?>/form_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
                [?php else: ?]
                    [?php include_partial('<?php echo $this->getModuleName() ?>/form_content', compact('<?php echo $this->getSingularName() ?>', 'form', 'configuration', 'helper')); ?]
                [?php endif ?]

            </div>

        </form>
    </div>

</div>
