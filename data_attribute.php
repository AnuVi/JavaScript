<?php 
     include "yhendus andmebaasiga";
     mysql_set_charset('utf8'); 
   $output.='<select name="values" id="val" onChange="showTranslation()">';
   $q_olemas = mysql_query('SELECT ID, Nimi3, Nimi1,Nimi, Grupp
              FROM Tabel
              WHERE ID LIKE "%AR%"
              GROUP BY Grupp
              ORDER BY Nimi1');
    while ( $olemas = mysql_fetch_array($q_olemas)){
      
        $output.='<option  data-est="'.$olemas['Nimi3'].'" value="'.$olemas['ID'].'" data-full="'.$olemas['Nimi'].'">'.$olemas['Nimi1'].' </option>';   
    
    }
   $output.='</select>'; 

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Tõlkefail</title>
</head>
<body>
	   <?=$output ?>
	    <p id="fullName"></p>
	   <p id="result"></p>
	   
<script type="text/javascript">

  function showTranslation(){
  
       var srch = document.getElementById("val"),
           selected = srch.options[srch.selectedIndex];
            fullName = document.getElementById("fullName"),
            result = document.getElementById("result");
            
          // data - attribute
          // see also getAttribute (IE) https://developer.mozilla.org/en-US/docs/Web/API/element.dataset
             dataEst = selected.dataset.est;
             dataFull = selected.dataset.full;
             
         // adding text  
           fullName.innerHTML = dataFull;
           result.innerHTML = dataEst; 
     
  
  }
    
</script>
</body>
</html>
