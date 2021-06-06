<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/all.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'top',
        html : true,
        title : 'User Info <a href="#" class="close" data-dismiss="alert">&times;</a>',
        content : '<div class="media"><img src="relayfinal.png" width="100px" height="100px" border-radius="50%" class="mr-3" alt="Sample Image"><div class="media-body"><h5 class="media-heading">Jhon Carter</h5><p>Excellent Bootstrap popover! I really love it.</p></div></div>'
        //In content you put the html that will be displayed this is a sample code
    });
    $(document).on("click", ".popover .close" , function(){
        $(this).parents(".popover").popover('hide');
    });
});
</script>
<style>
	.bs-example{
    	margin: 200px 150px 0;
    }
    .popover-title .close{
        position: relative;
        bottom: 3px;
    }
</style>
</head>
<body>
    <div class="bs-example">
      <img src="final1.png" width="100px" height="100px" border-radius="50%" data-toggle="popover">  
    </div>
</body>
</html>