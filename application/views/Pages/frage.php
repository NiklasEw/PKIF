<!DOCTYPE html>
<html>

<?php
//Debug
//print_r($Fragen);
//print_r($Antworten);

echo'
    <div id="entry'.$Fragen[$current_QID]['QID'].'" class="card">
        <div class="card-header" data-headline=" '. $Fragen[$current_QID]['Headline']. '">
            <h3>'.$Fragen[$current_QID]['Headline']. '</h3>'. 'Datum:&nbsp'. $Fragen[$current_QID]['Time'] . '&nbsp&nbspVon:&nbsp<b style="color:blue">' .$User[$Fragen[$current_QID]['ID']-1]['Username'] . '</b>
            <div data-id=" '.$Fragen[$current_QID]['QID'].  ' "> </div>
                            
                <div class="card-body"  >  
                    <p class="card-text"data-content=" ' . $Fragen[$current_QID]['Content'] .'">
                             '. $Fragen[$current_QID]['Content'].'
                            </p> 
                </div>
                <div class="container">
                        <button id="posBewertung type="button" class="btn btn-primary pull-right">↑</button>
                        '.$Fragen[$current_QID]['posBewertung'] .'
                        <button id="negBewertung type="button" class="btn btn-primary pull-right">↓</button>
                        '.$Fragen[$current_QID]['negBewertung'] .'
                    </div>
                </div>
                </p>
            ';
        foreach($Antworten AS $data_Antw)
        echo'
        <div id="entry'.$data_Antw['AID'].'" class="card">
            <div class="card-header" data-headline="'.$data_Antw['AID'].'">
                <h4>Antwort von&nbsp<b style="color:blue">'.$User[$data_Antw['ID']-1]['Username'].'</b> </h4>'. 'Datum:&nbsp'. $data_Antw['Time'] . '
                <div data-id=" '.$data_Antw['AID'].  ' "> </div>
                                
                    <div class="card-body"  >  
                        <p class="card-text"data-content=" ' . $data_Antw['Content'] .'">
                                    '. $data_Antw['Content'].'
                                </p> 
                    </div>
                    </div>
                    </p>
                ';
?>
<head>
</head>
</html>