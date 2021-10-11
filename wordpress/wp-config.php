<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '|-6IlM~6L94[;#|+TYccA^Db[.Kjh4j6CjvOrV=AvJ%>:EDri[[(W=QQH_T)==h5' );
define( 'SECURE_AUTH_KEY',  'J n5 bN:$6|2bpL|Zv 6_}<Es_Fz<gki~66&VvAxd.(F3)@|OaIAhSb*h@mYp!|w' );
define( 'LOGGED_IN_KEY',    'Sa{-4U_Br5L~~EF$:l6{2vc9O6hOVD>+h2G Gl_7otZ.@el2Zv53sz.8dk4]/[1V' );
define( 'NONCE_KEY',        'O)07;s/Y0b#S8BJ;^$()DnA}ys)42%/M$Y[0^5Xa_)zf<-qXr>462vPGg^Rx[./s' );
define( 'AUTH_SALT',        '>-Iv^~4?qQ-scsxc(gRl8`9#T)>Jw`?@&xU17K:L[44Fb!}UN2s><(Rxm=5!`t_E' );
define( 'SECURE_AUTH_SALT', 'J3O_[fu_:jY1b)VI8[}J|8[rbcP]IpV@KRYSQhz*x} z(wh=`$o6=Fk^w_+)tN4 ' );
define( 'LOGGED_IN_SALT',   '3kH)U*LQ%zxD{Y|WbIH<^n(c=F^6b9K?gB:}7U^n~9[n]] Ey0JAOU=c6o0g,}Ha' );
define( 'NONCE_SALT',       'mN_@9q-oj{}kGD2(Fmqp{DlCD[([hXqTwEE M`4fw])7I20<y>8wPjGur_ch9T}~' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
