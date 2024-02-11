<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wp_test' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'tp/:Jo_hH]q 1kjCFGw+<{z,WngdBi?*QEPq)hXb<1ILaLz4PGD8hU%nC}w=9<WL' );
define( 'SECURE_AUTH_KEY',  'GH4ozv%-m/gK!j_aUy}WkQ-)GQ %h:XuHq2ZK[=BxY wbv{5jyed!RKpjhD8As]i' );
define( 'LOGGED_IN_KEY',    '5t|BU+a0O!FpBQJkVKZhHVC8QbmS5&YKp+LLc^k]QM[&+y!6Ng>^XvUD`M}[$j?l' );
define( 'NONCE_KEY',        'nZxxUbM:F?{S:d&u[46G{_G77_V=F8jmc+gu7A3~2^eK:jiUxJnIsaG(LWK!B>>;' );
define( 'AUTH_SALT',        'JU<HK`k zB0[sGlGamItsLZv,MnVrl&tPr<*qH>]G!x8l$)/q_irG<{1J{q7|$j,' );
define( 'SECURE_AUTH_SALT', '2Swl1R)x1_;}IF^:>~hM>S9XVL>d[o$wot+,?3]Q8|}:!rBX3V{K$Re[g5&tLh|O' );
define( 'LOGGED_IN_SALT',   'F)qSvP&kwFwauXj;Hx>MCfbkkqZl14n<6xep-C2vRu$P*t#A[DJ?cWF:N}Oxt/nR' );
define( 'NONCE_SALT',       '72ww*v_mvSk4yrc]N4.!#c1w[X|Nco^wkvFjtT%0/~@iaGY,M$Rb8Suo8s?h]pfX' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
