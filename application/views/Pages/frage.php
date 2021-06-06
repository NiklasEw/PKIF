<!DOCTYPE html>
<html>
<head>
<script>
    $(document).ready(function(e){   
        
        $(".posBewertung").click(function(){
            $.ajax({
                
                

                type:"POST",
                url: "<?php echo site_url('db/create_bewertungUF');?>",
                data:"&ID="+<?php echo $this->session->userdata('id_user'); ?>+"&QID="+<?php echo $current_QID?>+"&posB=True&negB=False",
                success: function(response){
                    $("#FrageStellenForm").trigger("reset");
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
                    $("#FrageStellenForm").trigger("reset");
                    window.location.reload();
                }
            });
        });
        
        

    });
</script>
</head>









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