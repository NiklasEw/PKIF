<html>
 <head>
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
    foreach($Fragen as $data_item){
        print_r($Fragen);
    }
    foreach ($User as $data_item){
        print_r($User);
        ?>
        
        
<?php } ?>
<br>

</body>
