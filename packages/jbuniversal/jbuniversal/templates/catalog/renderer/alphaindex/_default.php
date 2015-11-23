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

$this->app->jbdebug->mark('layout::alphaindex::start');

$alpha = $vars['object']->render();

if ($this->app->string->strpos($alpha, '#</span>')) {

    $alpha_en_ru = explode('#</span>', $alpha);
    $alpha_en_ru[0] .= '#</span>';

} elseif ($this->app->string->strpos($alpha, '#</a>')) {

    $alpha_en_ru = explode('#</a>', $alpha);
    $alpha_en_ru[0] .= '#</a>';
}

$alpha_chars = $vars['params']->get('config.alpha_chars', 0);

?>
<div class="alphaindex rborder">
    <?php if ($alpha_chars == 0 || $alpha_chars == 2) { ?>
    <div class="alphaindex_line_en"><?php echo $alpha_en_ru[0]; ?></div>
    <?php } ?>

    <?php if ($alpha_chars == 0 || $alpha_chars == 1) { ?>
    <div class="alphaindex_line_ru"><?php echo $alpha_en_ru[1]; ?></div>
    <?php } ?>
</div>

<?php
$this->app->jbdebug->mark('layout::alphaindex::finish');
