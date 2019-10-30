<?php
/**
 * @var $data
 */
?>
<div class="case-block-two col-lg-4 col-md-6">
    <div class="inner-box">
        <div class="image">
            <img width="370" height="340"
                 src="<?= $data->image ?>"
                 class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                 alt=""/>
            <a href="<?= $data->getUrl() ?>" class="overlay-link">
                <img src="/images/link-2.png" alt="<?= $data->name ?>">
            </a>
        </div>
        <div class="lower-content">
            <div class="category"></div>
            <h4><a href="<?= $data->getUrl() ?>"><?= $data->name ?></a></h4>
        </div>
    </div>
</div>