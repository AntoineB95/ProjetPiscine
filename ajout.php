<?php
if(isLogged() == 0){
    header("Location:index.php?page=signin");
}

?>
<form method="post" id="regForm">

    <div class="bottom">
        <div class="field field-area">
            <label for="message" class="field-label">Exprimez-vous</label>
            <textarea name="evenement" id="message" rows="2" class="field-input field-textarea"></textarea>
        </div>
        <button type="submit" name="submit">Envoyer</button>

    </div>



</form>