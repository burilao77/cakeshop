
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>



        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($product->price) ?></td>
        </tr>

    </table>

    <div class="related">
        <h4><?= __('Related Shoppings') ?></h4>
        <?php if (!empty($product->shoppings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->shoppings as $shoppings): ?>
            <tr>
                <td><?= h($shoppings->id) ?></td>
                <td><?= h($shoppings->quantity) ?></td>
                <td><?= h($shoppings->created) ?></td>
                <td><?= h($shoppings->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Shoppings', 'action' => 'view', $shoppings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Shoppings', 'action' => 'edit', $shoppings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Shoppings', 'action' => 'delete', $shoppings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shoppings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
