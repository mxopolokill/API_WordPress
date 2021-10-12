<?php

//Appelle la classe sur l'écran d'édition du message.
function create_meta_box() {

$LaMetaBox = array(
    array('prenom', 'Prénom', ''),
    array('nom', 'Nom', ''),
    array('portfolio', 'Portfolio', ''),
    array('cv', 'CV', ''),
    array('linkedin', 'Linkedin', '')
   
);

foreach($LaMetaBox as $metaBox){
    new CreateMetaBox($metaBox);
}
}

if ( is_admin() ) {
add_action( 'load-post.php',     'create_meta_box' );
add_action( 'load-post-new.php', 'create_meta_box' );
}

/** Rendre le contenu de la Meta Box
 * @param WP_Post $post  post objet
 */
public function render_meta_box_content( $post) {

    // Ajoutez un champ nonce pour que nous puissions le vérifier plus tard.
        wp_nonce_field( 'apprenant'.$this->meta_name, 'apprenant'.$this->meta_name.'nonce' );
        // Utilisez get_post_meta pour récupérer une valeur existante dans la base de données.
        if(get_post_meta( $post->ID, '-'.$this->meta_name, true )){
            $value = get_post_meta( $post->ID, '-'.$this->meta_name, true );
        } else {
            $value = $this->default_value;
        }
    
    }



//La classe
class CreateMetaBox {

/// Hook dans les actions appropriées lorsque la classe est construite.
public function construct($meta_name) {
    $this->meta_name = $meta_name[0];
    $this->name_display = $meta_name[1];
    $this->default_value = $meta_name[2];
    
    add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
    add_action( 'save_post',      array( $this, 'save'         ) );
}

// Ajoute le conteneur de la MetaBox.   
public function add_meta_box( $post_type ) {
    // Limiter la MetaBox à certains types de messages.
    $post_types = array('apprenant');

    if ( in_array( $post_type, $post_types ) ) {
        //ajout de la meta box
        add_meta_box(

            $this->name_display,
            ( $this->name_display, 'default' ),
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

    /
    //Vérifier si notre nonce est activé.
    if ( ! isset( $_POST['apprenant' .$this->meta_name. 'nonce'] ) ) {
        return $post_id;
    }

    $nonce = $_POST['apprenant' .$this->meta_name. 'nonce'];

    // Vérifier que la nonce est valide.
    if ( ! wp_verify_nonce( $nonce, 'apprenant' .$this->meta_name ) ) {
        return $post_id;
    }

    // S'il s'agit d'une sauvegarde automatique, 
    if ( defined( 'DOING_AUTOSAVE' )  ) {
        return $post_id;
    }

    // Vérifier les autorisations de l'utilisateur.
    if ( 'apprenant' == $_POST['post_type'] ) {
        //indique si l'utilisateur actuel a les capacités pour éditer un post
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
    } else { //indique si l'utilisateur actuel a les capacité pour éditer une page 
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    }

    // Assainir l'entrée de l'utilisateur.
    $Ladata = sanitize_text_field( $_POST['apprenant' .$this->meta_name] );

    // Mettez à jour le champ méta.
    update_post_meta( $post_id, '-' .$this->meta_name, $Ladata );
}


