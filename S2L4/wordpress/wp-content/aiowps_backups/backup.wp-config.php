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
define( 'DB_NAME', 'polyglothub' );

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
define( 'AUTH_KEY',         '!u$Bb5Rdg /I5%x)<?jS:sK@bL_EmsNB/@:h,3sW> u991{#S[]GjR!Zr}>^UaCE' );
define( 'SECURE_AUTH_KEY',  'x<S!9aWZHwg_N6Q|ziYtx}mB;3h}5hhZ7` `8Sc@$Ru#wB_B`xq>7&U6>vQ|tjzf' );
define( 'LOGGED_IN_KEY',    'Jr/oHi1y)F.Ao0~*cy|Zj(6F9qv>,[Evn~(GM0Q]sRP?;gx`OEzY%;;};wN{X:__' );
define( 'NONCE_KEY',        'pNP[n-Os!+mkF+J7W:^(cXk M) ))~Gl.%w&d=Ia)MRGB?J|-/IH4zQ+p7I%UcS5' );
define( 'AUTH_SALT',        'sqx+#1IPgS/Gm;fc3kBsB~dM.6Cm5]u_?ceQqcG[}KzX{V[P&9:PlYa+]o(Kh{?C' );
define( 'SECURE_AUTH_SALT', 'N mk^oTc CG.dqe*bLd<v!o**}qDy=,c6N($b|@JoD**}7#(nU#?<!8hC9jzYjre' );
define( 'LOGGED_IN_SALT',   'kFFY6+<`ngS*)SG<UIODqdOG&7ef[xiZ-D?&DCvFAYq[~cA >1W3SopynCHrq#i;' );
define( 'NONCE_SALT',       '#9k bID4%(Yzb:DQv3!;LY5/I=jD43&~UIMT&]G:Vd(fr+zm7~6]u)I`3ujhA^mR' );

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
