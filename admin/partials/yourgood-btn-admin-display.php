<?php

/**
 * @since      1.0.0
 *
 * @package    Yourgood_Btn
 * @subpackage Yourgood_Btn/admin/partials
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'admin_menu', function() {
	add_menu_page(
		'YourgoodWidget',
		'YourgoodWidget',
		'manage_options',
		'ygbtn-main-page',
		'ygbtn_main_page_callback',
		'data:image/svg+xml;base64,' . base64_encode(' <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
<path d="M0.5 4.57143C0.5 2.32284 2.32284 0.5 4.57143 0.5H15.4286C17.6772 0.5 19.5 2.32284 19.5 4.57143V15.4286C19.5 17.6772 17.6772 19.5 15.4286 19.5H4.57143C2.32284 19.5 0.5 17.6772 0.5 15.4286V4.57143Z" stroke="#9DA1A8"/>
<circle cx="10" cy="10" r="6.10377" stroke="#9DA1A8"/>
<circle cx="10" cy="10" r="4.40566" stroke="#9DA1A8"/>
<circle cx="10" cy="10" r="3.20755" fill="#9DA1A8"/>
</svg>
 '),
		81
	);
	
	add_submenu_page(
		'ygbtn-main-page',
		'YourgoodWidget',
		'Настройки',
		'manage_options',
		'ygbtn_main_page_settings',
		'ygbtn_main_page_callback'
	);
	
	remove_submenu_page('ygbtn-main-page', 'ygbtn-main-page');
});

function ygbtn_main_page_callback() {
	$url = 'https://widget.yourgood.ru';
	?>
	<div class="wrap ygbtn-wrap">
		<h1 class="ygbtn-wrap__title">Настройки - YourgoodWidget</h1>
		<form class="ygbtn-wrap__block" method="post" action="options.php">
			<p>Установите и пользуйтесь кнопкой YourgoodWidget бесплатно. Для этого:</p>
			<ol>
				<li>Зарегистрируйтесь <a href="<?php echo esc_url($url) ?>">в Yourgood.Widget</a></li>
				<li>В личном кабинете Yourgood.Widget в разделе «Каналы» добавьте номер WhatsApp или Telegram</li>
				<li>Перейдите в раздел «Интеграции» личного кабинета и скопируйте API&#8209;ключ</li>
				<li>Вставьте API-ключ в поле ниже и нажмите «Сохранить»</li>
			</ol>
			<p>Расположение, размер и дизайн виджета настраивается в личном кабинете.</p>
			<?php 
				settings_fields( 'ygbtn_settings' ); 
				do_settings_sections('ygbtn_main_page_settings');
				submit_button(
					'Сохранить', 
					'primary',
					'submit',
					false,
					array(
						'id' => 'ygbtn-btn',
					)
				);
			?>
		</form>
	</div>
	<?php
}

add_action( 'admin_init',  'ygbtn_fields' );
 
function ygbtn_fields(){
 
	register_setting(
		'ygbtn_settings',
		'ygbtn_api_field'
	);
 
	add_settings_section(
		'ygbtn_api_field_id',
		'',
		'',
		'ygbtn_main_page_settings'
	);
 
	add_settings_field(
		'ygbtn_api_field',
		'',
		'ygbtn_text_field',
		'ygbtn_main_page_settings',
		'ygbtn_api_field_id',
		array( 
			'label_for' => 'ygbtn_api_field',
			'name' => 'ygbtn_api_field'
		)
	);
 
}
 
function ygbtn_text_field( $args ){
	$value = get_option( $args[ 'name' ] );

	echo '<input type="text" placeholder="Поле для API" id="ygbtn-api-field" name="ygbtn_api_field" value="' . esc_attr($value) . '" />';
}

add_action( 'admin_notices', 'ygbtn_notice' );
 
function ygbtn_notice() {

	$message = 'API сохранён!';
 
	if(
		isset( $_GET[ 'page' ] )
		&& 'ygbtn_main_page_settings' == $_GET[ 'page' ]
		&& isset( $_GET[ 'settings-updated' ] )
		&& true == $_GET[ 'settings-updated' ]
	) {
		echo '<div class="notice notice-success is-dismissible"><p>' . esc_html($message) . '</p></div>';
	}
 
}

?>
