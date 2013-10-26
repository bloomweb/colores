<div class="names index">
    <h2><?php echo __('Names'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
            <th><?php echo $this->Paginator->sort('code', 'Código'); ?></th>
            <th><?php echo $this->Paginator->sort('name', 'Color'); ?></th>
            <th class="actions"><?php echo __('Acciones'); ?></th>
        </tr>
        <?php foreach ($names as $name): ?>
            <tr>
                <td><?php echo h($name['Name']['id']); ?>&nbsp;</td>
                <td><?php echo h($name['Name']['code']); ?>&nbsp;</td>
                <td><?php echo h($name['Name']['name']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $name['Name']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo $this->element('paginator'); ?>
</div>