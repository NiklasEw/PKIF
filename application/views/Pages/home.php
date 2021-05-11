<!DOCTYPE html>
<html>

<head>
<script>
    $(document).ready(function(e){
        
        $session = $this->session->userdata('id_user');
                if($("#updateid").val()!=""){
                    var func="<?php echo site_url("db/update");?>";
                }
                else{
                    var func="<?php echo site_url("db/create");?>";
                }
                
        //Macht den Frage stellen button aus der Eingabe der Datenbank funktionsfähig 
        //und den Controller Database zur Funktion create
        $("#FrageStellen").click(function(){
            alert("Debug");
            $.ajax({
                type:"POST",
                url: "<?php echo site_url('db/create_Frage');?>",
                data:$("#myForm").serialize(),
                success: function (response) {
                    $("#myForm").trigger("reset");
                    alert(response);
                }
            });
        });
    });

</script>
</head>

<body>

<!-- Eingabe in die Datenbank-->
<form  id="myForm">
    <div class="container">
        <div class="form-group" >
            <label for="exampleFormControlInput1">Frage</label>
            <input class="form-control" id="exampleFormControlInput1" placeholder="Ihre Frage" name="Headline">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Beschreibung</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Content"></textarea>
        </div>
        <input type="hidden"id="updateid"name="id" value=""class="form-control">
        <button id="FrageStellen" type="button" class="btn btn-primary pull-right">Frage stellen</button>
    </div>
</form>

   <!-- Ausgabe der Datenbank in Karten-->
   <div class="container" >
        <?php
            foreach($Fragen AS $data_item) {
            echo'
                    <div id="entry'.$data_item['id'].'" class="card">
                        <div class="card-header" data-headline=" '. $data_item['Name']. '">
                        '.$data_item['Name']. '
                            <div data-id=" '.$data_item['id'].  ' " class="trash float-right"> <i class="fas fa-trash"></i> </div>
                            <div class="edit float-right"> <i class="fas fa-edit"></i> </div>
                        <div class="card-body"  >  
                            <p class="card-text"
                            data-content=" ' . $data_item['Eintrag'] .'">
                            ' . $data_item['Eintrag'] .$data_item['id'].'
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