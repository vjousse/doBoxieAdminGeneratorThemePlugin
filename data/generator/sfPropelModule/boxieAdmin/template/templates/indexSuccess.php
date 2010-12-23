[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]


<div id="sf_admin_container">

  [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

  <div id="sf_admin_header">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_header', array('pager' => $pager)) ?]
  </div>

    <div id="box1" class="box box-<?php echo ($this->configuration->hasFilterForm() ? '75' : '100') ?>"><!-- box full-width -->
      <div class="boxin">
        <div class="header">
          <h3>[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h3>
        </div>
        <div class="content">
  <?php if ($this->configuration->getValue('list.batch_actions')): ?>
      <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'batch')) ?]" method="post">
  <?php endif; ?>
      [?php include_partial('<?php echo $this->getModuleName() ?>/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?]
      <ul class="actions">
        [?php include_partial('<?php echo $this->getModuleName() ?>/list_batch_actions', array('helper' => $helper)) ?]
        [?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]
      </ul>
  <?php if ($this->configuration->getValue('list.batch_actions')): ?>
      </form>
  <?php endif; ?>
        </div>
      </div>
    </div>

<?php if ($this->configuration->hasFilterForm()): ?>
    <div id="box1" class="box box-25"><!-- box full-width -->
      <div class="boxin">
        <div class="header">
          <h3>[?php echo __('Filters', array(), 'sf_admin') ?]</h3>
        </div>
        <div class="content">
    [?php include_partial('<?php echo $this->getModuleName() ?>/filters', array('form' => $filters, 'configuration' => $configuration)) ?]
        </div>
      </div>
    </div>
<?php endif; ?>

  <div id="sf_admin_footer">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_footer', array('pager' => $pager)) ?]
  </div>
</div>
