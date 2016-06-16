<?php

class ContactsGateway {
    
    public function selectAll($order) {
        if ( !isset($order) ) {
            $order = "name";
        }
        $dbOrder =  mysql_real_escape_string($order);
        $dbres = mysql_query("SELECT * FROM contacts ORDER BY $dbOrder ASC");
        
        $contacts = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $contacts[] = $obj;
        }
        
        return $contacts;
    }
    
  
 
    
}

?>
