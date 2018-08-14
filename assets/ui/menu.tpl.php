<ul class="nav <?php echo $css_class; ?>">

    <?php $last_level = 0; ?>

    <?php
    foreach ($menu as $id => $item) {
        ?>

        <?php
        //bootstrap поддерживает только 2 уровня вложенности, остальное без меня :)
        if ($item['level'] > 2) {
            continue;
        }
        ?>

        <?php
        //закрываем пункт меню второго уровня
        if ($item['level'] < $last_level) {
            ?>
        </div></li>
    <?php } ?>

    <?php
    //закрываем пункт меню первого уровня
    if (($item['level'] == $last_level) && ($item['level'] < 2)) {
        ?>
        </li>
    <?php } ?>

    <?php
    $is_active = in_array($id, $active_ids);
    $parent = false;

    $css_classes = array();
    $css_item_classes = array();
    $css_classes[] = 'nav-item';
    if ($is_active) {
        $css_classes[] = 'active';
    }
    if ($item['childs_count'] > 0) {
        //родитель подменю
        $css_classes[] = 'dropdown';
        $css_item_classes[] = 'dropdown-toggle';
        $item['url'] = false;
        $item['data']['toggle'] = "dropdown";
        $parent = 'role="button" aria-haspopup="true" aria-expanded="false"';
    }
    if ($item['level'] > 1) {
        //подменю пункты
        $css_item_classes[] = 'dropdown-item';
    }
    if (!empty($item['options']['class'])) {
        $css_classes[] = $item['options']['class'];
    }

    $onclick = isset($item['options']['onclick']) ? $item['options']['onclick'] : false;
    $onclick = isset($item['options']['confirm']) ? "return confirm('{$item['options']['confirm']}')" : $onclick;

    $target = isset($item['options']['target']) ? $item['options']['target'] : false;
    $data_attr = '';
    if (!empty($item['data'])) {
        foreach ($item['data'] as $key => $val) {
            $data_attr .= 'data-' . $key . '="' . $val . '" ';
        }
    }
    ?>
    <?php
//у bootstrap вложенные меню состоят только из ссылок
    if ($item['level'] < 2) {
        ?>
        <li <?php if ($css_classes) { ?>class="<?php echo implode(' ', $css_classes); ?>"<?php } ?>>
        <?php } ?> 

        <?php if ($item['disabled']) { ?>
            <span class="item disabled"><?php html($item['title']); ?></span>
    <?php } else { ?>
            <a <?php if (!empty($item['title'])) { ?>title="<?php echo html($item['title']); ?>"<?php } ?> class="nav-link<?php if ($css_item_classes) { ?> <?php echo implode(' ', $css_item_classes); ?><?php } ?>" <?php echo $data_attr; ?> href="<?php echo!empty($item['url']) ? htmlspecialchars($item['url']) : 'javascript:void(0)'; ?>" <?php if ($onclick) { ?>onclick="<?php echo $onclick; ?>"<?php } ?> <?php if ($target) { ?>target="<?php echo $target; ?>"<?php } ?><?php if ($parent) { ?> <?php echo $parent; ?><?php } ?>>
                <span class="wrap">
                    <?php
                    if (!empty($item['title'])) {
                        html($item['title']);
                    }
                    ?>
        <?php if (isset($item['counter']) && $item['counter']) { ?>
                        <span class="counter"><?php html($item['counter']); ?></span>
            <?php } ?>
                </span>
            </a>
            <?php } ?>

            <?php if (($item['childs_count'] > 0) && ($item['level'] == 1)) { ?><div class="dropdown-menu"><?php } ?>

            <?php $last_level = $item['level']; ?>

        <?php } ?>

        <?php
//после перебора всех пунктов меню, надо закрыть открытые теги
        if ($last_level == 2) {
            ?>
        </div></li>
<?php
}
if ($last_level < 2) {
    ?>
    </li>
<?php } ?>
</ul>