<?php
class ytsHelper {
    static function getParentTheme() {
		if ( wp_get_theme()->parent() ) {
			return wp_get_theme()->parent();
		} else {
			return wp_get_theme();
		}
    }
}
?>