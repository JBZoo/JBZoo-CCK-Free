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

$align = $this->app->jbitem->getMediaAlign($item, $layout);
?>

<?php if ($this->checkPosition('title')) : ?>
    <h1 class="item-title"><?php echo $this->renderPosition('title'); ?></h1>
<?php endif; ?>


<?php if ($this->checkPosition('image')) : ?>
<div class="item-image align-<?php echo $align;?>">
    <?php echo $this->renderPosition('image');?>
</div>
<?php endif; ?>


<?php if ($this->checkPosition('properties')) : ?>
<ul class="item-properties">
    <?php echo $this->renderPosition('properties', array('style' => 'list'));?>
</ul>
<?php endif; ?>


<?php if ($this->checkPosition('text')) : ?>
    <?php echo $this->renderPosition('text', array('style' => 'block')); ?>
<?php endif; ?>


<?php if ($this->checkPosition('meta')) : ?>
    <ul class="item-metadata">
        <?php echo $this->renderPosition('meta', array('style' => 'list'));?>
    </ul>
<?php endif; ?>

<div class="clear clr"></div>
