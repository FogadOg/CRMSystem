<?php
function updateForm($companyId){
return "<form method='get' action='apprenticecompany/update.php'>
            <input type='hidden' name='id' value=".$companyId." >
            <input type='submit' name='deleteCompany' value='update'>
        </form>";
}

function deleteForm($companyId){
return "<form method='post' action='apprenticecompany/delete.php'>
            <input type='hidden' name='companyId' value=".$companyId." >
            <input type='submit' name='deleteCompany' value='delete'>
        </form>";
}

function createForm(){
    return "<a href='apprenticecompany/new.php' target='_blank' rel='noopener noreferrer'>New company</a>";
}
?>