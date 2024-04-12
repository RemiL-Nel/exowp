<?php
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

if (isset($_POST['categoryOption'])) {
    $selectOption = $_POST['categoryOption'];
    update_option('categoryOption', $selectOption);
    echo $selectOption;
}

?>

<div>
    <h1 id="title">Welcome to my theme</h1>
    <div id="selectContainer">
        <form method="POST" action="#">
            <label for="categoryOption">Choisis la catégorie de posts pour le carousel:</label>
            <select id="categoryOption" name="categoryOption">
                <?php
                $selectOption = get_option('categoryOption');
                if ($categories){
                    foreach($categories as $cat) {
                        echo "<option value='" . $cat->cat_ID . "'" . ($cat->cat_ID == $selectOption ? " selected" : "") . ">" . $cat->name . "</option>";
                    }
                }
                ?>
            </select>
            <input type="submit" value="Choisir" />
        </form>
    </div>
</div>
