<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via web
 * puoi copiare questo file in «wp-config.php» e riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni del database
 * * Chiavi segrete
 * * Prefisso della tabella
 * * ABSPATH
 *
 * * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Impostazioni database - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define( 'DB_NAME', 'gym' );

/** Nome utente del database */
define( 'DB_USER', 'root' );

/** Password del database */
define( 'DB_PASSWORD', '' );

/** Hostname del database */
define( 'DB_HOST', 'localhost' );

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Il tipo di collazione del database. Da non modificare se non si ha idea di cosa sia. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chiavi univoche di autenticazione e di sicurezza.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 *
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tutti i cookie esistenti.
 * Ciò forzerà tutti gli utenti a effettuare nuovamente l'accesso.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '-(Z3H~ksXE5|+qYm>GebgCO[X}-96CH3i*a&.W<E&:B@+9|{:y_Ma4ZMc>fxO{nt' );
define( 'SECURE_AUTH_KEY',  ' ,WF XST*B)*D^9,A*ygPamlT|).3fqK4tX]z)CRb~9f4W~{_Jf[#LRjzyQ,5M6;' );
define( 'LOGGED_IN_KEY',    '(0=R #WGu{Ibe=lSv}>}3pP?ZxJ,,!qUB5~c)?%)MNYXhM)OxV*2$gkD%eZJYi%X' );
define( 'NONCE_KEY',        'Nsm<4`8kuJm<GM]*3^BE_~R$*1ARM}w<CT#O$rF)eD/=nqoy_IJ:_l5Jp#kR;tQP' );
define( 'AUTH_SALT',        '=c>?jJnc7lBVAq0CdhoaMj}R,~anfx1JfAcrTSu1P;8Z1g6So?X:5>(]!Ry^E^` ' );
define( 'SECURE_AUTH_SALT', 'JxXR_k>v~Uy<qbwFsil7OO#^zosF(7`0`9IO1E4q5PNB(EEMb45Xv$R7V%lgq{=;' );
define( 'LOGGED_IN_SALT',   '_K0shS<va<`L|wqRHI=d&SFEAUH!2nDBCYBa~n{eh[s^(k4>{t_L,LklIB!-qd38' );
define( 'NONCE_SALT',       '`9#X7y]dj(dG;!DG$U7M;ySV %E chQ5tA%Xq]~y6tkLPn,`}f6`C65/{I29D0xT' );

/**#@-*/

/**
 * Prefisso tabella del database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco. Solo numeri, lettere e trattini bassi!
 */
$table_prefix = 'wp_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi durante lo sviluppo
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 *
 * Per informazioni sulle altre costanti che possono essere utilizzate per il debug,
 * leggi la documentazione
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Aggiungere qualsiasi valore personalizzato tra questa riga e la riga "Finito, interrompere le modifiche". */



/* Finito, interrompere le modifiche! Buona pubblicazione. */

/** Path assoluto alla directory di WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Imposta le variabili di WordPress ed include i file. */
require_once ABSPATH . 'wp-settings.php';
