<!DOCTYPE html>
<html>

<head>
<script>
    $(document).ready(function(e){
        $("#submit").click(function(){
            //Ließt das momentane Datum mit Hilfe der eingebauten JavaScript-Funktion aus
            today=new Date();
            //Formatiert das Datum in eine Form, die für SQL verarbeitbar ist
            date=String(today.getFullYear()+"-"+ String(today.getMonth() + 1).padStart(2, '0')+"-" + today.getDate()).padStart(2, '0');

            //Debug
            //frage=$("#FrageStellenForm").serialize()+"&Time="+date+"&negBewertung=0&posBewertung=0&ID="+<?php// echo $this->session->userdata('id_user'); ?>;
            //alert(frage);

            $.ajax({
                type:"POST",
                url: "<?php echo site_url('db/create_frage');?>",
                data:$("#FrageStellenForm").serialize()+"&Time="+date+"&negBewertung=0&posBewertung=0&ID="+<?php echo $this->session->userdata('id_user'); ?>,
                
            });
        });
        
        $("#posBewertung0").click(function(){

            alert($("#posBewertungForm").serialize());
            $.ajax({
                type:"POST",
                url: "<?php echo site_url('db/create_bewertungUF');?>",
                data:$("#posBewertungForm").serialize(),
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
                        <h3>'.$data_item['Headline']. '</h3>'. 'Datum:&nbsp'. $data_item['Time'] . '&nbsp&nbspVon:&nbsp<b style="color:blue">' .$User[$data_item['ID']-1]['Username'] . '</b>
                            <div data-id=" '.$data_item['QID'].  ' "> </div>
                            
                        <div class="card-body"  >  
                            <p class="card-text"
                            data-content=" ' . $data_item['Content'] .'">
                             '. $data_item['Content'].'
                            </p> 
                        </div>
                        <div class="card-body"  >  
                            <form id="posBewertungForm" method="post" class="form-horizontal">
                                <div align="left">
                                    <button id="posBewertung'.$data_item['QID'].' type="button" class="btn btn-primary pull-right">↑</button>
                                </div> 
                                <div align="left"> ' . 
                                    $data_item['posBewertung'] .'
                                </div> 
                            </form>
                            <form id="negBewertungForm" method="post" class="form-horizontal">
                                <div align="right">
                                    <button id="negBewertung'.$data_item['QID'].' type="button" class="btn btn-primary pull-right">↓</button>
                                </div> 
                                <div align="right"> ' . 
                                $data_item['negBewertung'] .'
                                </div>
                            </form>
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
