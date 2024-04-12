<?php
// récupère les catégories
$categories = get_categories( [
    'taxonomy'     => 'category',
    'type'         => 'post',
    'child_of'     => 0,
    'parent'       => '',
    'orderby'      => 'name',
    'order'        => 'ASC',
    'hide_empty'   => 0,
    'hierarchical' => 1,
    'exclude'      => '',
    'include'      => '',
    'number'       => 0,
    'pad_counts'   => false,
] );

?>

<div>
    <h1 id="title">Welcome to my theme</h1>
    <div id="selectContainer">
        <form method="post" action="options.php">
            <label for="theme_exo_slider_setting">Choisis la catégorie de posts pour le carousel:</label>
            <select id="theme_exo_slider_setting" name="theme_exo_slider_setting">
                <option value="">--Choisissez une catégorie--</option>
                <?php
                $selectOption = get_option('theme_exo_slider_setting');
                if ($categories){
                    foreach($categories as $cat) {
                        echo "<option value='" . $cat->cat_ID . "'" . ($cat->cat_ID == $selectOption ? " selected" : "") . ">" . $cat->name . "</option>";
                    }
                }
                ?>
            </select>
            <div class="flex-end">
                <?php
                    // Ajoutez une vérification nonce pour la sécurité
                    settings_fields('theme_exo_settings');
                    // Bouton de sauvegarde
                    submit_button('Enregistrer');
                ?>
            </div>
        </form>
    </div>
</div>
