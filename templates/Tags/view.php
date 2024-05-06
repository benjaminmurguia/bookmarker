<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('deseas eliminar? # {0}?', $tag->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tag'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tags view content">
            <h3><?= h($tag->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Título') ?></th>
                    <td><?= h($tag->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tag->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creado') ?></th>
                    <td><?= h($tag->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificado') ?></th>
                    <td><?= h($tag->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Marcadores Relacionados') ?></h4>
                <?php if (!empty($tag->bookmarks)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('IdUsuario') ?></th>
                            
                            <th><?= __('Título') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Url') ?></th>
                            <th><?= __('Creado') ?></th>
                            <th><?= __('Modificado') ?></th>
                            <th class="actions"><?= __('Acciones') ?></th>
                        </tr>
                        <?php foreach ($tag->bookmarks as $bookmarks) : ?>
                        <tr>
                            <td><?= h($bookmarks->id) ?></td>
                            <td><?= h($bookmarks->user_id) ?></td>
                            <td><?= h($bookmarks->title) ?></td>
                            <td><?= h($bookmarks->description) ?></td>
                            <td><?= h($bookmarks->url) ?></td>
                            <td><?= h($bookmarks->created) ?></td>
                            <td><?= h($bookmarks->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Vista'), ['controller' => 'Bookmarks', 'action' => 'view', $bookmarks->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['controller' => 'Bookmarks', 'action' => 'edit', $bookmarks->id]) ?>
                                <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'Bookmarks', 'action' => 'delete', $bookmarks->id], ['confirm' => __('deseas eliminar? # {0}?', $bookmarks->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
