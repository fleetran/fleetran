<?php 
function setIncludeFiles($arrayInc = array()){ 
    $incFiles = get_included_files(); 
    if((count($arrayInc)>0)&&(count($incFiles)>0)){ 
        $aInt = array_intersect($arrayInc,$incFiles); 
        if(count($aInt)>0){ 
            return false; 
       }elseif(count($aInt)<1) { 
        foreach($arrayInc as $inc){ 
            if(is_file($inc)) 
                include($inc); 
            else{ 
                return false; 
            } 
        } 
       }    
    }else{ 
        return false; 
    } 
} 
?> 

<?php 
$toBeInclude = array('index.php', 
'/data/your_include_files_2.php', 
'/data/your_include_files_3.php', 
); 
setIncludeFiles($toBeInclude); 
?> 