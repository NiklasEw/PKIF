<!DOCTYPE html>
<html>

<head>
<script>
    $(document).ready(function(e){   

        
        $session = $this->session->userdata('id_user');
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

                
        //Macht den Frage stellen button aus der Eingabe der Datenbank funktionsfähig 
        $("#submit").click(function(){
            today=new Date();
            date=String(today.getFullYear()+"-"+ String(today.getMonth() + 1).padStart(2, '0')+"-" + today.getDate()).padStart(2, '0');
            data=$("#FrageStellenForm").serialize();
            data+="&Time="+date+"&negBewertung=0&posBewertung=0&";
            alert(data);
            $.ajax({
                type:"POST",
                url: "<?php echo site_url('pages/create_frage');?>",
                data:$("#FrageStellenForm").serialize(),
                success: function (response) {
                alert(response);
                }   
            });
        });

         $("#good").click(function(){
            alert("Debug");

            $.ajax({
                type:"POST",
               
                url: "<?php echo site_url('db/create_frage');?>",
                data:$("#myForm").serialize(),
                success: function (response) {
                    $("#myForm").trigger("reset");
                    window.location.reload(); 
                    alert(response);
                }
            });
        });

        $("#bad").click(function(){
            alert("Debug");

            $.ajax({
                type:"POST",
               
                url: "<?php echo site_url('db/');?>",
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
        <input type="hidden"id="updateid" name="QID" value=""class="form-control">
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
                        '.$data_item['QID'].' '. $data_item['Time'] .' '. $data_item['Username'] . ' ' .$data_item['Headline'].' 
                            <div data-id=" '.$data_item['QID'].  ' "> </div>
                            
                        <div class="card-body"  >  
                            <p class="card-text"
                            data-content=" ' . $data_item['Content'] .'">
                            '. $data_item['Content'].'
                            </p> 
                        </div>
                        <div class="card-body"  >  
                            <p class="card-text"
                            data-content=" ' . $data_item['negBewertung'] .'">
                            <div style="display:block; text-align:left; float:left;">' . $data_item['negBewertung']  .'
                                <input type="hidden"id="updateid" name="QID" value=""class="form-control">
                                <button id="good" type="button" class="btn btn-secondary pull-right">Hilfreich</button>
                            </div>
                            <div style="display:block; text-align:right;">' . $data_item['posBewertung'] .'
                                <input type="hidden"id="updateid" name="QID" value=""class="form-control">
                                <button id="bad" type="button" class="btn btn-secondary pull-right">Nich Hilfreich</button>
                            </div> 
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
