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
define( 'DB_NAME', 'wp_tutorialwebsite' );

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
define( 'AUTH_KEY',         '}B0gh&q#z>E8ca/>!??/OU(p1-s(wO4cv{%w9gD-upd WX3@4mZDqB`+9oe)(x1l' );
define( 'SECURE_AUTH_KEY',  '5s/g#_2c.Pi[^J=| %f6/y@<(J9hIP%3e?TqL 2.6%~His9S5C0a|+Ga}jY9$D{u' );
define( 'LOGGED_IN_KEY',    '@A8[b,{Fto7GgJ!R[LVps%[<P8:;fc/c)Hkq55E^EJKJw!h=2(R;;_Jk:qNJyAIL' );
define( 'NONCE_KEY',        'aAor=3~=qrEm[Wc(:lD!Id9wV<4aGwB4bq+TC,KF|oA-[M,cOu$tzNj-IG$V;*X8' );
define( 'AUTH_SALT',        '|GDBbw{;:iA)^a+eMqPVgvN1UsEZLO3nyzbo0RA3M[ )a>C6DFAR$kX%~m#gdDPQ' );
define( 'SECURE_AUTH_SALT', 'aI6Lbn<B=-L[>$YFx_}aH,!7(z?nM-w+v.qGXFsHxV9=[~ZRi;M2jBBzLwm,w,|B' );
define( 'LOGGED_IN_SALT',   'i}:|<3&lZy3/&M:kjhNjSG5f>iYz(vZyUEyc$-v!:Fg=5t,(f#^9k}4P(- CNWrO' );
define( 'NONCE_SALT',       '`7FXwoc.a(lDbRc;6.a?OQfV73a<PTO6Q9sJuxEti*z^wTtWl2;F(a|F;=o`w`%0' );

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
