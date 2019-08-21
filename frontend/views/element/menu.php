<nav class="main-menu navbar-expand-lg">
    <div class="navbar-header">
        <!-- Toggle Button -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
        <ul class="navigation clearfix">
            <?php
            foreach ($this->params['menu'] as $item) {
            ?>
            <li class=" current dropdown">
                <a href="<?= $item['link'] ?>"><?= $item['name'] ?></a>
                <?php
                if (!empty($item['sub_menu'])) { ?>
                    <ul>
                        <?php foreach ($item['sub_menu'] as $item1) { ?>
                        <li>
                            <a href="<?= $item1['link'] ?>"><?= $item1['name'] ?></a>
                            <?php
                            if (!empty($item1['sub_menu'])) { ?>
                                <ul>
                                    <?php foreach ($item1['sub_menu'] as $item2) { ?>
                                        <li>
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
    </div>
</nav>
