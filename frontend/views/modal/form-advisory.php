<?php

use yii\bootstrap\Modal;

Modal::begin([
    'id'=>'js__modal-form-advisory',
    'header' => '<h2 class="modal-title">Nhận tư vấn miễn phí</h2>',
    'size'=>'',
    'class' => 'css__form-adv'
]);
?>
    <div id='modalContent'>
        <?php  echo $this->render("//element/form-contact"); ?>
    </div>

<?php Modal::end() ?>