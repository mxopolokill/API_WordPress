<?php

//Appelle la classe sur l'écran d'édition du message.
function create_meta_box() {
//variable  $myMetaBox inclue un tableau des élement voulant etre ajouter 
$myMetaBox = array(
    array('prenom', 'Prénom', ''),
    array('nom', 'Nom', ''),
    array('portfolio', 'Portfolio', ''),
    array('cv', 'CV', ''),
    array('linkedin', 'Linkedin', '')
   
);

//création d'un tableau pour la création d'une nouvelle Metabox 
foreach($myMetaBox as $metaBox){
    
    new CreateMetaBox($metaBox);
}
}

// si  la demande actuelle concerne est une page d'interface administrative.
if ( is_admin() ) {
    // on lance nos deux hook via la fonction précedement crée 
    
add_action( 'load-post.php',     'create_meta_box' );
add_action( 'load-post-new.php', 'create_meta_box' );
}

//La classe
class CreateMetaBox {

/// Hook dans les actions appropriées lorsque la classe est construite.
public function __construct($meta_name) {
    $this->meta_name = $meta_name[0];
    $this->name_display = $meta_name[1];
    $this->default_value = $meta_name[2];
    
    add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
    add_action( 'save_post',      array( $this, 'save'         ) );
}

// Ajoute le conteneur de la boîte méta.   
public function add_meta_box( $post_type ) {
    // Limiter la boîte à méta à certains types de messages.
    $post_types = array('apprenant');

    if ( in_array( $post_type, $post_types ) ) {
        add_meta_box(
            $this->name_display,
            __( $this->name_display, 'default' ),
            array( $this, 'render_meta_box_content' ),
            $post_type,
            'advanced',
            'high'
        );
    }
}

/** Sauvegarder la méta lorsque le message est enregistré.  
 * @param int $post_id L'ID du message en cours de sauvegarde.
 */
public function save( $post_id ) {

    // Nous devons vérifier que cela vient de notre écran et avec l'autorisation appropriée, 
    //car save_post peut être déclenché à d'autres moments.
    //Vérifier si notre nonce est activé.
    if ( ! isset( $_POST['_apprenant' .$this->meta_name. '_nonce'] ) ) {
        return $post_id;
    }

    $nonce = $_POST['_apprenant' .$this->meta_name. '_nonce'];

    // Vérifier que le nonce est valide.
    if ( ! wp_verify_nonce( $nonce, '_apprenant' .$this->meta_name ) ) {
        return $post_id;
    }

    // S'il s'agit d'une sauvegarde automatique, 
    //notre formulaire n'a pas été soumis, If this is an autosave, 
    //our form has not been submitted,donc nous ne voulons pas faire n'importe quoi.
     
    if ( defined( 'DOING_AUTOSAVE' )  ) {
        return $post_id;
    }

    // Vérifier les autorisations de l'utilisateur.
    if ( 'apprenant' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
    } else {           
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    }

    
    // Assainir l'entrée de l'utilisateur.
    $mydata = sanitize_text_field( $_POST['_apprenant' .$this->meta_name] );

    // Mettez à jour le champ méta.
    update_post_meta( $post_id, '_' .$this->meta_name, $mydata );
}


/** Rendre le contenu de la Meta Box
 * @param WP_Post $post  post objet
 */
public function render_meta_box_content( $post) {

// Ajoutez un champ nonce pour que nous puissions le vérifier plus tard.
    wp_nonce_field( '_apprenant'.$this->meta_name, '_apprenant'.$this->meta_name.'_nonce' );
    // Utilisez get_post_meta pour récupérer une valeur existante dans la base de données.
    if(get_post_meta( $post->ID, '_'.$this->meta_name, true )){
        $value = get_post_meta( $post->ID, '_'.$this->meta_name, true );
    } else {
        $value = $this->default_value;
    }
    // Afficher le formulaire, en utilisant la valeur actuelle.
    ?>
    <label for="_apprenant<?php echo $this->meta_name; ?>">
        <?php _e($this->name_display, 'default' ); ?>
    </label>
    <input type="text" id="_apprenant<?php echo $this->meta_name; ?>" name="_apprenant<?php echo $this->meta_name; ?>" value="<?php echo esc_attr( $value ); ?>" size="50" />
    <?php
}
}
