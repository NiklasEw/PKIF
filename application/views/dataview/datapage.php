<html>
 <head>
 <title>CodeIgniter Tutorial</title>
 </head>
 <body>
 <script>
    $(document).ready(function(e){

        $("#submit").click(function(){
            if($("#updateid").val()!=""){
                    var func = "<?php echo site_url("db/update"); ?>";
            } else {
                    var func = "<?php echo site_url("db/create"); ?>";
            }
            $.ajax({
                type:"POST",
                url: func,
                data:$("#myForm").serialize(),
                success: function (response) {

                    $("#myForm").trigger("reset");
                    window.location.reload();


                }
            });
        });


        $(".trash").click(function(){
            var id = $(this).data("id");
            $.ajax({
                type:"POST",
                url: "<?php echo site_url('db/delete');?>",
                data:"id="+id,
                success: function (response) {

                    
                    $("#entry"+id).fadeOut("slow");


                }
            ,})

        }); 
        $(".update").click(function(){
            var id = $(this).data("id");
            console.log($(this).closest('.card-header').data("name"));
            // for debug-console
            console.log($(this).parent().next().find("p").data("content"));
            // for debug-console
            $("#updatename").val($(this).closest('.card-header').data("name"));
            $("#updatecontent").val($(this).parent().next().find("p").data("content"));
            $("#updateid").val(id);
            });
    });
    
</script>

 <?php
    foreach ($query as $data_item){
        ?>
        <div id="entry<?php echo $data_item['id']?>" class="card">
            <h5 class="card-header bg-success" data-name=<?php echo $data_item['name'] ?>><?php echo $data_item['name'].' '.$data_item['rating'].
            '/10★';
            $session = $this->session->userdata('id_user');
            if(!empty($session)){
                $is_admin = "<div data-id=" . $data_item['id'] . " class=\"trash floatright\"><
                            i class=\"fas fa-trash\"></i></div>
                            <div data-id=" . $data_item['id'] . " class=\"edit float-right\"><i class=\"fas faedit\"></i>
                            </div>";
            }
            else{
                $is_admin = "";
            }echo $session?>
            

            <div class="card-body">
                <p class="card-text text-muted" data-content=<?php echo $data_item['content'] ?>><?php echo $data_item['content']?></p>
            </div>
        </div>
        
<?php } ?>
<br>
<div>
    <form id="myForm">
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="email" class="form-control" id="updatename" placeholder="Max Mustermann" name="name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Rezension</label>
            <textarea class="form-control" id="updatecontent" rows="3" name="content"></textarea>
        </div>
        <input type="hidden" id="updateid" name="id" value="" class="form-control">
        <button id="submit" type="button" class="btn btn-primary">Submit</button>
        <div class="form-group">
            <label for="rating">Sterne</label>
            <select id="rating" class="form-control" name="rating">
            <option selected>10</option>
            <option>9</option>
            <option>8</option>
            <option>7</option>
            <option>6</option>
            <option>5</option>
            <option>4</option>
            <option>3</option>
            <option>2</option>
            <option>1</option>
            </select>
        </div>
    </form>
</div>
</body>
