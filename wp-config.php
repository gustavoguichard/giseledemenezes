<?php
/** 
 * A configuração de base do WordPress
 *
 * Este ficheiro define os seguintes parâmetros: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, e ABSPATH. Pode obter mais informação
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} no Codex. As definições de MySQL são-lhe fornecidas pelo seu serviço de alojamento.
 *
 * Este ficheiro é usado para criar o script  wp-config.php, durante
 * a instalação, mas não tem que usar essa funcionalidade se não quiser. 
 * Salve este ficheiro como "wp-config.php" e preencha os valores.
 *
 * @package WordPress
 */

// ** Definições de MySQL - obtenha estes dados do seu serviço de alojamento** //
/** O nome da base de dados do WordPress */
define('DB_NAME', 'giseledemenezes');

/** O nome do utilizador de MySQL */
define('DB_USER', 'root');

/** A password do utilizador de MySQL  */
define('DB_PASSWORD', 'root');

/** O nome do serviddor de  MySQL  */
define('DB_HOST', 'localhost:8889');

/** O "Database Charset" a usar na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O "Database Collate type". Se tem dúvidas não mude. */
define('DB_COLLATE', '');

/**#@+
 * Chaves Únicas de Autenticação.
 *
 * Mude para frases únicas e diferentes!
 * Pode gerar frases automáticamente em {@link https://api.wordpress.org/secret-key/1.1/salt/ Serviço de chaves secretas de WordPress.org}
 * Pode mudar estes valores em qualquer altura para invalidar todos os cookies existentes o que terá como resultado obrigar todos os utilizadores a voltarem a fazer login
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '&Q@@Fmh$CnHj,rtrh?xp1R]?Vr.`NV>$,W#kf8k/[HDyZ)gvht4(AK{u#f5j1>){');
define('SECURE_AUTH_KEY',  '+)S@0XAR6EeR8cM{3|zgl}YYl0@B$ (;]DW>43Z>lp4c rVh4OG11X2vf3e$Zi$K');
define('LOGGED_IN_KEY',    'QKFEf[ hiqJm14Lo ,thIsbjMM<N8]2ugCKBtgC%tlFGr#2`Ru2[vd*Un61aRm<y');
define('NONCE_KEY',        'E}f@/=`wcZ?V{)MIWn!]}`?F7VQ<9?Z#P4X^T7-},eX>WbEt{oPm)b#!R6@fwGI@');
define('AUTH_SALT',        'G5MQBah;xU5@$*RMeoy+mcCcFTAYpxOAIuQ~~}q.T{bwd|5-A}Tq- RgBkv9D}eG');
define('SECURE_AUTH_SALT', ')JAHi$/n#NJqV=p:g~N.J-^Cmz^Po/2/yv*g+fH|*aqZ.t$*7x3vY;G|`B?<8c)i');
define('LOGGED_IN_SALT',   '@JS1qYne]4n!Wp{E.*/ $sb*a^E/wEt)Vt64r&3ny(/uu:+WdS]3`?)IEk++:WZa');
define('NONCE_SALT',       '|vV}W?ubb%P5=?X2R(O:`3:!mwNNk#PWHiP,5ao5X0RJA-@b+-.E}Bs]J%^]&;wE');
define('WP_POST_REVISIONS', 3);

/**#@-*/

/**
 * Prefixo das tabelas de WordPress.
 *
 * Pode suportar múltiplas instalações numa só base de dados, ao dar a cada
 * instalação um prefixo único. Só algarismos, letras e underscores, por favor!
 */
$table_prefix  = 'wp_';

/**
 * Idioma de Localização do WordPress, Inglês por omissão.
 *
 * Mude isto para localizar o WordPress. Um ficheiro MO correspondendo ao idioma
 * escolhido deverá existir na directoria wp-content/languages. Instale por exemplo
 * pt_PT.mo em wp-content/languages e defina WPLANG como 'pt_PT' para activar o
 * suporte para a língua portuguesa.
 */
define ('WPLANG', 'pt_PT');

/**
 * Para developers: WordPress em modo debugging.
 *
 * Mude isto para true para mostrar avisos enquanto estiver a testar.
 * É vivamente recomendado aos autores de temas e plugins usarem WP_DEBUG
 * no seu ambiente de desenvolvimento.
 */
define('WP_DEBUG', false);

/* E é tudo. Pare de editar! Bom blogging!. */

/** Caminho absoluto para a pasta do WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
