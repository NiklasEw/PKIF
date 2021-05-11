<!DOCTYPE html>
<html>

<head>
<script>
    $(document).ready(function(e){   
        
        $session = $this->session->userdata('id_user');
<<<<<<< HEAD
                if($("#updateid").val()!=""){
                    var func="<?php echo site_url("db/update");?>";
                }
                else{
                    var func="<?php echo site_url("db/create");?>";
                }
=======
        if(!empty($session)){
            $is_admin = "<div data-id=" . $data_item['QID'] . " ></div>";
            <div data-id=" . $data_item['QID'] . "></div>;
        }
        else{
        $is_admin = "";
        }

        if($("#updateid").val()!=""){
            var func="<?php echo site_url("db/frage_update");?>";
        }
        else{
            var func="<?php echo site_url("db/frage_create");?>";
        }

>>>>>>> 6b4b60c0a0155a7aba3d927b75d01fe1f707ea82
                
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
                    window.location.reload(); 
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
        <input type="hidden"id="updateid"name="QID" value=""class="form-control">
        <button id="FrageStellen" type="button" class="btn btn-primary pull-right">Frage stellen</button>
    </div>
</form>

</br>

   <!-- Ausgabe der Datenbank in Karten-->
   <div class="container" >
        <?php
<<<<<<< HEAD
=======
       
>>>>>>> 6b4b60c0a0155a7aba3d927b75d01fe1f707ea82
            foreach($Fragen AS $data_item) {
            echo'
                    <div id="entry'.$data_item['QID'].'" class="card">
                        <div class="card-header" data-headline=" '. $data_item['Headline']. '">
                        '.$data_item['Headline']. '
                            <div data-id=" '.$data_item['QID'].  ' "> </div>
                            
                        <div class="card-body"  >  
                            <p class="card-text"
                            data-content=" ' . $data_item['Content'] .'">
                            ' . $data_item['Content'] .$data_item['QID'].'
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