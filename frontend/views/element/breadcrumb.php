
<ul class="page-breadcrumb bread-crumb">
    <?php
    $dataLast = array_pop($data);

    foreach ($data as $value) {
    ?>
        <li>
            <a href="<?= $value['link'] ?>"><?= $value['name'] ?></a>
        </li>
    <?php } ?>
    <li><?= $dataLast['name'] ?></li>
</ul>