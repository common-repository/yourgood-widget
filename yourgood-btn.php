<?php

/**
 * @link              https://yourgood.ru/
 * @since             1.0.0
 * @package           Yourgood_Btn
 *
 * @wordpress-plugin
 * Plugin Name:       Yourgood Widget — кнопка для связи через популярные мессенджеры для сайта.
 * Description:       Бесплатная кнопка для связи через популярные мессенджеры для сайта. Предложите клиентам удобный способ связи и получайте больше лидов с сайта. Установка онлайн-чата — 5 минут. Вы получите: канал для общения с клиентами на сайте, номера телефонов и статистику по конверсиям из посещения сайта в диалог.
 * Version:           1.0.0
 * Author:            yourgood
 * Author URI:        https://yourgood.ru/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       yourgood-widget
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'YGBTN_VERSION', '1.0.0' );

require plugin_dir_path( __FILE__ ) . 'includes/class-yourgood-btn.php';

function ygbtn_run() {

	$plugin = new YGBTN();
	$plugin->run();

}
ygbtn_run();
