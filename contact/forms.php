<?php
function contactUpdateForm($contactId){
return "<form method='get' action='contact/update.php'>
            <input type='hidden' name='id' value=".$contactId." >
            <input type='submit' name='updateContact' value='update'>
        </form>";
}

function contactDeleteForm($contactId){
return "<form method='post' action='contact/delete.php'>
            <input type='hidden' name='contactId' value=".$contactId." >
            <input type='submit' name='deleteContact' value='delete'>
        </form>";
}

function contactCreateForm(){
    return "<a href='contact/new.php'>New contact</a>";
}
?>