<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/** Enable W3 Total Cache */

/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'wp');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '_#lJ{$eSh$bx@:!~e$d>od5y{rpk2qqhS+*-`7[h8AQEz!L)@X,<LayE+spe m]E');
define('SECURE_AUTH_KEY',  'M^<b*{Qx1!3A]Y=S!+FhOXcH&J]62B mg+!QJ1{O#)M,@J[(!w%G]ncZyf)Bu+K/');
define('LOGGED_IN_KEY',    '4a,4(q]j&0e>$31O$fXbHYcRQgKaOI?^tRY&93Ub^47%FX:wE1bo3$BWX~[aBi4N');
define('NONCE_KEY',        'RuYux#.&Q}sOg*(_V%mbH4xjL&[R5?&+@QDl=Qi&B|g*yQ_$zAYg)4arph73H[bS');
define('AUTH_SALT',        '3I3{:%B]<Q;bXWO~k9_k$aUW)=p8{$)SllONp[GBbyeZ_t4Md}=^c4*Z?||PxX@N');
define('SECURE_AUTH_SALT', '[8cnpBFyYOqQG}({:@@sL&G+Zgvr9*3zB>efU9^(YIu0u! $3FW*jeYr^W<4VGDI');
define('LOGGED_IN_SALT',   'meDM$=HJ+,3bl ShB!vZ:Whh>zR)HR4`]J(?!*x4&$sp{},;8psTS;Ex#vkZ@-gW');
define('NONCE_SALT',       'CArq=obd%k+~{gapGLNfNKE2Dvt<%4X_HQ6.7+iW=7Ulkuv88B1R22uS1?vm)H64');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
