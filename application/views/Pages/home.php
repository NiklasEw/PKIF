<!DOCTYPE html>
<html>

<head>
<script>
    $(document).ready(function(e){
        $("#submit").click(function(){
            today=new Date();
            date=String(today.getFullYear()+"-"+ String(today.getMonth() + 1).padStart(2, '0')+"-" + today.getDate()).padStart(2, '0');
            alert(<?php echo $this->session->userdata('id_user'); ?>);
            frage=$("#FrageStellenForm").serialize();
            frage+="&Time="+date+"&negBewertung=0&posBewertung=0&";


            //WICHTIG FÜR NÄCHSTE WOCHE HIER DRAN WEITER ARBEITEN NIKLAS DAS IST NOCH NICHT FERTIG
            //FINDE HERAUS WARUM DER DIE ID ANZEIGEN WILL ABER NICHT DEN USERNAME


            alert(frage);
            $.ajax({
                type:"POST",
                url: "<?php echo site_url('pages/create_frage');?>",
                data:$("#FrageStellenForm").serialize()+"&Time="+date+"&negBewertung=0&posBewertung=0&",
                success: function (response) {
                alert(response);
                }   
            });
        });
    });
</script>
</head>

<body>

<!-- Eingabe in die Datenbank-->
<?php

  $session = $this->session->userdata('id_user');
  if (!empty($session)): ?>
<form  id="FrageStellenForm" method="post" class="form-horizontal">
    <div class="container">
        <div class="form-group" >
            <label for="exampleFormControlInput1">Titel</label>
            <input class="form-control" id="exampleFormControlInput1" placeholder="Ihre Frage" name="Headline">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Frage</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Content"></textarea>
        </div>
        <button id="submit" type="button" class="btn btn-primary pull-right">Frage stellen</button>
    </div>
</form>
<?php endif;?>

</br>

   <!-- Ausgabe der Datenbank in Karten-->
   <div class="container" >
        <?php
            foreach($Fragen AS $data_item) {
            echo'
                    <div id="entry'.$data_item['QID'].'" class="card">
                        <div class="card-header" data-headline=" '. $data_item['Headline']. '">
                        '.$data_item['Headline']. $data_item['Time'] . $data_item['Username'] . '
                            <div data-id=" '.$data_item['QID'].  ' "> </div>
                            
                        <div class="card-body"  >  
                            <p class="card-text"
                            data-content=" ' . $data_item['Content'] .'">
                            ' .$data_item['QID'].' '. $data_item['Content'].'
                            </p> 
                        </div>
                        <div class="card-body"  >  
                            <p class="card-text"
                            data-content=" ' . $data_item['negBewertung'] .'">
                            <div align="right"> ' . $data_item['negBewertung'] .'</div> <div align="right"> ' . $data_item['posBewertung'] .'</div> 
                            </p> 
                        </div>
                    </div>
                </div>
            '; 
            }
        ?>
    </div>

</body>
</html>
