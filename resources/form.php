<?php
/**
 * Created by PhpStorm.
 * User: maud
 * Date: 8-4-2019
 * Time: 15:30
 */

if(isset($_GET['edit'])){

}
?>
<form method="post" action="<?php echo $action; ?>">
    <div class="form-group">
        <label for="name">Naam van evenement</label>
        <input name="name" type="text" class="form-control" id="name" aria-describedby="name"
               placeholder="<?php echo $name; ?>" value="<?php if(isset($_GET['edit'])){echo $name;} ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Omschrijving</label>
        <textarea name="description" class="form-control" id="description" placeholder="<?php echo $des; ?>"
                  required><?php if(isset($_GET['edit'])){ echo $des;} ?></textarea>
    </div>
    <?php
    if (isset($_GET['city'])) {
        echo "<div class='alert alert-danger'>Kies een stad of voer een niewe stad in</div>";
    }
    ?>
    <div class="row">
        <div class="col">
            <label for="address">Adres</label>
            <input name="address" type="text" class="form-control" id="address" value="<?php if(isset($_GET['edit'])){ echo $adres;} ?>" placeholder="<?php echo $adres; ?>"
                   required>
        </div>

        <div class="col">
            <label for="state">Stad</label>
            <select name="state" id="state" class="form-control" onchange="Check(this);" required>
                <option value="choose" selected><?php echo $sel_city; ?></option>
                <?php
                $cities = $event->getCities();
                foreach ($cities as $city) {
                    $place = $city['plaats'];
                    echo " <option value='" . $city['plaats_id'] . "'>" . $place . "</option>";
                }
                ?>
                <option value="anders">Anders</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div id="ifYes" class="mt-2" style="display: none;">
            <label>
                <input class="form-control" value="<?php if(isset($_GET['edit'])){ echo $place_city; }?>" placeholder="<?php echo $place_city; ?>" id="city" name="city"/>
            </label>
            <br/>
        </div>
    </div>
    <div class="form-group">
        <label>
            <input class="form-control" value="<?php if(isset($_GET['edit'])){ echo $date;} ?>" placeholder="<?php echo $date; ?>" id="date_picker" name="date_picker"
                   required/>
        </label>
    </div>
    <div class="row">
        <div class="col">
            <label for="start_time">Start tijd</label>
            <input name="start_time" type="text" class="form-control" id="start_time" aria-describedby="start_time"
                   value="<?php if(isset($_GET['edit'])){ echo $start_tm; } ?>" placeholder="<?php echo $start_tm; ?>" required></div>
        <div class="col">
            <label for="end_time">Eind tijd</label>
            <input name="end_time" type="text" class="form-control" id="end_time" aria-describedby="end_time"
                   value="<?php if(isset($_GET['edit'])){ echo $end_tm; }?>" placeholder="<?php echo $end_tm; ?>" required>
        </div>
    </div>
    <div id="dynamicInput">
        <div class="row mt-3">
            <div class="col">
                <label for="role">Rol 1</label><select name="role[]" id="role" class="form-control" required>
                    <option value="choose" selected></option>
                    <option value="ober">Ober</option>
                    <option value="gast">Gastheer/vrouw</option>
                    <option value="receptie">Receptie</option>
                </select>
            </div>
            <div class="col">
              <label for="all_roles">Aantal mensen voor deze rol</label><input class="form-control" type="text" name="all_roles[]" placeholder="Aantal">
            </div>
            </div>
        </div>
    <input  type="button" class="btn btn-info" value="Add another text input" onClick="addInput('dynamicInput');"><br>
    <button id="submit" type="submit" class="btn btn-primary mt-2 mb-4"><?php echo $button; ?></button>
</form>