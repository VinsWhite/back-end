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
define( 'DB_NAME', 'wp_templateAdattabile' );

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
define( 'AUTH_KEY',         'iId$!QY_v/udzD^#2tc3aXXHFEs0X++Q3B+&,=qHv20$HJ6b8Dt6oD+nvy!G.e_(' );
define( 'SECURE_AUTH_KEY',  'GQo~*{S8LD^GpVR;8Yt!g<l_QOT}(&)h01m))w;mtxI{vac$_F7s<ZT<d+!=n2*B' );
define( 'LOGGED_IN_KEY',    'Nl+B0v5<(l1:zM%<~OLAt_H!7r3{uXXGs?C2lju`{dJ,0xC$V-s*?8M{o7>Mi0(A' );
define( 'NONCE_KEY',        'kfCxpZ/JZ6^g0]^>L)AA+R,sJT&<Dtc`VW`O`V=[Q#rNhGZK?[(_P.1@kq}6 _ws' );
define( 'AUTH_SALT',        '9.KI#F{jia)SF.Ht;;@4>NJ>Iw}>$]ULA%d$9Q74}zcd ]&tE<~3w/e4TESDr|?A' );
define( 'SECURE_AUTH_SALT', '{u*Vl+1$Ji+vzhUB{gb/_74 2fO[*6<+1+)jay359XFeA<T_ZSJ>HK(}_>*r.pw5' );
define( 'LOGGED_IN_SALT',   '((FfKBy$N3AJLm Fr_l?Zx~a(Vydv5p|1UK@^8OM7(6$P#S1*_.[@+^2#LS+!O>9' );
define( 'NONCE_SALT',       '|i|L`fRZZm$4eZ]p6Apv&VXFpVk#5f+W:t.%Y7cz~zNAR!r;xTOu~w^8b@j|))i%' );

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
