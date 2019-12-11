<ul class="navigation clearfix">
    <?php
    foreach ($this->params['menu'] as $item) {
        $class_sub = !empty($item['sub_menu']) ? 'dropdown' : '';
        ?>
        <li class="current <?= $class_sub ?>">
            <a href="<?= $item['link'] ?>"><?= $item['name'] ?></a>
            <?php
            if (!empty($item['sub_menu'])) { ?>
                <ul>
                    <?php foreach ($item['sub_menu'] as $item1) {
                        $class_sub = !empty($item1['sub_menu']) ? 'dropdown' : '';
                        ?>
                        <li class="current <?= $class_sub ?>">
                            <a href="<?= $item1['link'] ?>"><?= $item1['name'] ?>
                                <?php if (!empty($item1['sub_menu'])) { ?>
                                <i class="fas fa-angle-right"></i>
                                <?php } ?>
                            </a>
                            <?php
                            if (!empty($item1['sub_menu'])) {
                                ?>
                                <ul>
                                    <?php foreach ($item1['sub_menu'] as $item2) {
                                        $class_sub = !empty($item2['sub_menu']) ? 'dropdown' : '';
                                        ?>
                                        <li  class="current <?= $class_sub ?>">
                                            <a href="<?= $item2['link'] ?>"><?= $item2['name'] ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </li>
    <?php } ?>
</ul>
