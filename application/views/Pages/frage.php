<!DOCTYPE html>
<html>
<head>
<script>
    $(document).ready(function(e){   

        //Macht den Frage stellen button aus der Eingabe der Datenbank funktionsfähig 
        $("#submit").click(function(){
            //Ließt das momentane Datum mit Hilfe der eingebauten JavaScript-Funktion aus
            today=new Date();
            //Formatiert das Datum in eine Form, die für SQL verarbeitbar ist
            date=String(today.getFullYear()+"-"+ String(today.getMonth() + 1).padStart(2, '0')+"-" + today.getDate()).padStart(2, '0');

            //DEBUG
            //alert($("#AntwortForm").serialize()+"&Time="+date+"&ID="+<?php echo $this->session->userdata('id_user'); ?>+"&QID="+<?php echo $current_QID?>);
            
            $.ajax({
                type:"POST",
                url: "<?php echo site_url('db/create_Antwort');?>",
                data:$("#AntwortForm").serialize()+"&Time="+date+"&ID="+<?php echo $this->session->userdata('id_user'); ?>+"&QID="+<?php echo $current_QID?>,
                success: function(response){
                    $("#AntwortForm").trigger("reset");
                    window.location.reload();
                }
            });
        });
        
        $(".posBewertung").click(function(){
            $.ajax({
                
                

                type:"POST",
                url: "<?php echo site_url('db/create_bewertungUF');?>",
                data:"&ID="+<?php echo $this->session->userdata('id_user'); ?>+"&QID="+<?php echo $current_QID?>+"&posB=True&negB=False",
                success: function(response){
                    $("#posBewertungForm").trigger("reset");
                    window.location.reload();
                }
            });
        });

        $(".negBewertung").click(function(){
            $.ajax({
                

                type:"POST",
                url: "<?php echo site_url('db/create_bewertungUF');?>",
                data:"&ID="+<?php echo $this->session->userdata('id_user'); ?>+"&QID="+<?php echo $current_QID?>+"&posB=False&negB=True",
                success: function(response){
                    $("#negBewertungForm").trigger("reset");
                    window.location.reload();
                }
            });
        });
        
        

    });
</script>
</head>



<!-- Eingabe in die Datenbank-->
<?php

  $session = $this->session->userdata('id_user');
  if (!empty($session)): ?>
<form  id="AntwortForm" method="post" class="form-horizontal">
    <div class="container">

        <div class="form-group">
            <label for="AntwortForm">Ihre Antwort</label>
            <textarea class="form-control" id="AntwortForm" rows="3" name="Content" placeholder="Ihre Antwort"></textarea>
        </div>
        <input type="hidden"id="updateid" name="AID" value=""class="form-control">
        <button id="submit" type="button" class="btn btn-primary pull-right">Antwort geben</button>
    </div>
</form>
<?php endif;?>

</br>








<div id="entry'.<?php echo $Fragen[$current_QID]['QID']?>.'" class="card">
    <div class="card-header" data-headline=" '. <?php echo $Fragen[$current_QID]['Headline']?>. '">
        <h3><?php echo $Fragen[$current_QID]['Headline']?></h3> Datum:&nbsp <?php echo $Fragen[$current_QID]['Time']?>  &nbsp&nbspVon:&nbsp<b style="color:blue"> <?php echo $User[$Fragen[$current_QID]['ID']-1]['Username']?>  </b>
        <div data-id=" '.<?php echo $Fragen[$current_QID]['QID']?>.  ' "> </div>
                        
            <div class="card-body"  >  
                <p class="card-text"data-content=" ' . $Fragen[$current_QID]['Content'] .'">
                            <?php echo $Fragen[$current_QID]['Content']?>
                        </p> 
            </div>
            <div class="container" >
                <div class="row">
                    <form id="posBewertungForm" method="post" class="form-horizontal">
                        <div class="posBewertung" >
                            <button id="posBewertung type="button" class="btn btn-primary pull-right">↑</button>
                        </div>
                        <?php echo $Fragen[$current_QID]['posBewertung']?> 
                    </form>
                    <form id="negBewertungForm" method="post" class="form-horizontal">
                        <div class="negBewertung" >
                            <button id="negBewertung type="button" class="btn btn-primary pull-right">↓</button>
                        </div>
                        <?php echo $Fragen[$current_QID]['negBewertung']?>
                        
                    </form>
                </div>
            </div>
        </div>
        </p>
            
        <?php foreach($Antworten AS $data_Antw)
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
                ';?>

<head>
</head>
</html>