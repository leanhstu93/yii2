<?php
use yii\widgets\LinkPager;
use frontend\models\Product;

/**
 * @var $categories
 * @var $pages
 * @var $bread
 */
if (!empty($categories)) {
    $page_title = $categories->name;
    $page_des = $categories->desc;
    $category_id = $categories->id;
} else {
    $page_title = 'Tin tức';
    $page_des = '';
    $category_id =0;
}

echo $this->render("//element/page-title",['name' => $page_title, 'bread' => $bread]);
?>
<div class="blog-page-container sp-two">
    <div class="container">
        <div class="row">
            <!-- sidebar area -->
            <!-- Main area -->
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                <!-- blog post item -->
                <?php foreach ($data as $item) {
                    $item->setTranslate();
                    echo $this->render("//element/news-category/item", ['data' => $item,'page_title' => $page_title]);
                ?>

                <!-- blog post item -->
                <?php } ?>
                <div class="theme_pagination">
                    <?php
                    echo LinkPager::widget([
                        'pagination' => $pages,
                    ]);
                    ?>
                </div>
                <!--End post pagination-->
            </div>
            <!--Content Side-->
            <!-- sidebar area -->
            <?= $this->render("//element/news-category/right", ['newsHot' => $newsHot]); ?>
            <!--Sidebar-->
        </div>
    </div>
</div>
<?php echo $this->render("//element/news-letter-home"); ?>
