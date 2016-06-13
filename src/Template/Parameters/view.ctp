<h2>Parameter: <?= h($parameter->name) ?></h2>

<dl class="dl-horizontal">
  <dt><?= __('Id') ?></dt>
  <dd>PD<?= $this->Number->format($parameter->id) ?></dd>
  <dt><?= __('Display Name') ?></dt>
  <dd><?= h($parameter->display_name) ?></dd>
  <dt><?= __('Standard Name') ?></dt>
  <dd><?= h($parameter->standard_name) ?></dd>
  <dt><?= __('Unit') ?></dt>
  <dd><?= h($parameter->unit) ?></dd>
  <dt><?= __('Fill Value') ?></dt>
  <dd><?= h($parameter->fill_value) ?></dd>
  <dt><?= __('Precision') ?></dt>
  <dd><?= h($parameter->precision) ?></dd>
  <dt><?= __('Parameter Function') ?></dt>
  <dd><?= $parameter->has('parameter_function') ? $this->Html->link($parameter->parameter_function->name, ['controller' => 'ParameterFunctions', 'action' => 'view', $parameter->parameter_function->id]) : '' ?></dd>
  <dt><?= __('Data Product Identifier') ?></dt>
  <dd><?= h($parameter->data_product_identifier) ?></dd>
  <dt><?= __('Parameter Function Map') ?></dt>
  <dd><?= $this->Text->autoParagraph(h($parameter->parameter_function_map)); ?></dd>
  <dt><?= __('Description') ?></dt>
  <dd><?= $this->Text->autoParagraph(h($parameter->description)); ?></dd>
</dl>

<h4><?= __('Related Streams') ?></h4>
<?php if (!empty($parameter->streams)): ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th><?= __('Id') ?></th>
      <th><?= __('Name') ?></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($parameter->streams as $streams): ?>
    <tr>
      <td><?= h($streams->id) ?></td>
      <td><?= $this->Html->link($streams->name,['controller'=>'streams','action'=>'view',$streams->id]) ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
  <p class="panel-body">no related Streams</p>
<?php endif; ?>