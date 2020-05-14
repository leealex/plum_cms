<?php

use app\modules\admin\models\Menu;
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;

/**
 * @var Menu[] $children
 */
?>
<table class="table table-condensed">
  <tr>
    <th>Название</th>
    <th>Адрес</th>
    <th>Активно</th>
    <th>Порядок</th>
    <th></th>
    <th></th>
  </tr>
    <?php foreach ($children as $child) { ?>
      <tr>
        <td><?= $child->title ?></td>
        <td><?= $child->url ?></td>
        <td style="width:30px;text-align:center"><?= ($child->status
                ? '<span class="label label-success">Да</span>'
                : '<span class="label label-danger">Нет</span>') ?></td>
        <td style="width:30px;text-align:center"><?= $child->order ?></td>
        <td style="width:30px;text-align:center"><?= Html::a(Fa::i('pencil'),
                ['menu/update', 'id' => $child->id],
                ['class' => 'btn btn-xs btn-primary', 'title' => 'Редактировать']) ?>
        </td>
        <td style="width:30px;text-align:center"><?= Html::a(Fa::i('trash'), ['menu/delete', 'id' => $child->id],
                [
                    'class' => 'btn btn-xs btn-danger',
                    'title' => 'Удалить',
                    'data-confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                    'data-method' => 'post'
                ]) ?>
        </td>
      </tr>
    <?php } ?>
</table>