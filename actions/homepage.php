<?php

require_once("header.php");


session_start();
if (!isset($_SESSION['userid']) ||(trim ($_SESSION['userid']) == '')) {
header('location:index.php');
exit();
}

$uquery=mysqli_query($conn,"select * from `users` where id='".$_SESSION['id']."'");
$urow=mysqli_fetch_assoc($uquery);
?>

<div>
<h4>Welcome, <?php echo $urow['first_name']; ?> <a href="logout.php">Logout</a></h4>
<?php
    $query=mysqli_query($conn,"select * from `chat_room`");
    while($row=mysqli_fetch_array($query)){
        ?>
            <div>
            Chat Room Name: <?php echo $row['chat_room_name']; ?><br><br>
            </div>
            <div id="result" style="overflow-y:scroll; height:800px;"></div>
            <form>
                <input type="text" id="msg">
                <input type="hidden" value="<?php echo $row['chat_room_id']; ?>" id="id">
                <button type="button" id="send_msg">Send</button>
            </form>
        <?php
    }
?>
</div>

<script src = "jquery-3.1.1.js"></script>	
<script type = "text/javascript">

$(document).ready(function(){
displayResult();
/* Send Message	*/	

    $('#send_msg').on('click', function(){
        if($('#msg').val() == ""){
            alert('Please write message first');
        }else{
            $msg = $('#msg').val();
            $id = $('#id').val();
            $.ajax({
                type: "POST",
                url: "send_message.php",
                data: {
                    msg: $msg,
                    id: $id,
                },
                success: function(){
                    displayResult();
                }
            });
        }	
    });
/*****	*****/
});

function displayResult(){
    $id = $('#id').val();
    $.ajax({
        url: 'send_message.php',
        type: 'POST',
        async: false,
        data:{
            id: $id,
            res: 1,
        },
        success: function(response){
            $('#result').html(response);
        }
    });
}

</script>

<?php
require_once("footer.php");

?>