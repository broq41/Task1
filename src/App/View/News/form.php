



    <div class="input_row">
        <label for="name">Tytuł</label>
        <input id="name" type="text" name="name" value="<?php
            if(!empty($data['news']['name'])){
                echo $data['news']['name'];
            }
            ?>"
               required>
    </div>

    <div class="input_row">
        <label for="description">Opis</label>
        <textarea id="description" name="description"><?php
            if(!empty($data['news']['description'])){
                echo $data['news']['description'];
            }
            ?></textarea>
    </div>

    <div class="input_row">
        <label for="is_active">Aktywny</label>
        <input id="is_active" type="checkbox" name="is_active"

            <?php
            if(!empty($data['news']['is_active']) && $data['news']['is_active'] == 1){
                echo 'checked';
            }
            ?>
               >

    </div>




