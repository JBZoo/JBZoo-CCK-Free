<?php
/**
 * JBZoo is universal CCK, application for YooTheme Zoo component
 * @package     JBZoo
 * @author      JBZoo App http://jbzoo.com
 * @copyright   Copyright (C) JBZoo.com
 * @license     http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$this->app->jbdebug->mark('layout::subcategory(' . $vars['object']->id . ')::start');

// set vars
$subcategory = $vars['object'];
$params = $subcategory->getParams('site');
$link = $this->app->route->category($subcategory);
$task = $this->app->jbrequest->get('task', 'category');

// teaser content
$text = $params->get('content.category_teaser_text', '');
$imageAlign = $params->get('template.subcategory_teaser_image_align', 'left');

// items
$itemsOrder = $vars['params']->get('config.item_order', 'none');
$maxItems   = $vars['params']->get('template.subcategory_items_count', 5);
$showCount  = $vars['params']->get('template.subcategory_items_count_show', 1);

$items = array();
$countItems = 0;
if ($showCount || $maxItems != "0" || $maxItems == "-1") {
    $items = $subcategory->getItems(true, null, $itemsOrder);
    $countItems = count($items);
}

if ($maxItems != "-1" && $countItems > $maxItems) {
    $items = array_slice($items, 0, $maxItems);
}

$image = $this->app->jbimage->get('category_teaser_image', $params);

?><div class="subcategory subcategory-<?php echo $subcategory->alias; ?>">

    <?php if ($vars['params']->get('template.subcategory_teaser_image', 1) && $image['src']) : ?>
        <div class="subcategory-image align-<?php echo $imageAlign;?>">
            <a href="<?php echo $link;?>" title="<?php echo $subcategory->name; ?>"><img
               src="<?php echo $image['src']; ?>" <?php echo $image['width_height']; ?>
               alt="<?php echo $subcategory->name; ?>"
               title="<?php echo $subcategory->name; ?>"
            /></a>
        </div>
    <?php endif; ?> 


    <h2 class="subcategory-title">
        <a href="<?php echo $link;?>" title="<?php echo $subcategory->name;?>"><?php echo $subcategory->name;?></a>
        <?php if ($showCount && $countItems != 0 ) : ?><span>(<?php echo $countItems; ?>)</span><?php endif; ?>
    </h2>


    <?php if ($vars['params']->get('template.subcategory_teaser_text', 1) && strlen($text) > 0 ) : ?>
        <div class="subcategory-description"><?php echo $text;?></div>
    <?php endif; ?>


    <?php if (in_array($task, array('category', 'frontpage'))) : ?>
        <?php if ($maxItems != 0 && count($items) > 0 ) : ?>
            <div class="clear clr"></div>
            <div class="subcategory-items">
                <?php
                foreach($items as $item) {
                    echo $this->app->jblayout->renderItem($item, 'subcategory_item');
                }
                ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="clear clr"></div>
</div>

<?php
$this->app->jbdebug->mark('layout::subcategory(' . $vars['object']->id . ')::finish');
