<?php require 'database/config.php';
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
<?php
   $title = "Chat";
   $description = "Besplatno dopisivanje na webu"; 
   $keywords = "besplatno, dopisivanje, chat, web"; 
    include "includes/head.php";	
?>
</head>
<body>


    <main class="main">
            <?php include "includes/navigation.php"; ?>

<section class="section" id="sadrzaj">
            
    <div id="empty">
        <div id="wrapper"> 
            <div class="chat_wrapper">
                    <div id="chat"> </div>
                <form method="POST" id="messageForm">  
                    <textarea name="poruka" cols="30" rows="7" class="textarea" placeholder="Unesite porku..."></textarea>
                </form>

            </div>

        </div> 
    </div>
    <?
$_SESSION["id_kategorije"] = 3; 
?>
    <script>

        LoadChat();
        setInterval(function(){
                LoadChat();
        }, 1000);

        
        function LoadChat()
		{
			$.post('includes/messages.php?action=getMessages', function(response){
				
				var scrollpos = $('#chat').scrollTop();
				var scrollpos = parseInt(scrollpos) + 520;
				var scrollHeight = $('#chat').prop('scrollHeight');

				$('#chat').html(response);

				if( scrollpos < scrollHeight ){
					
				}else{
					$('#chat').scrollTop( $('#chat').prop('scrollHeight') );
				}

			});
		}
		
		$('.textarea').keyup(function(e){
			if( e.which == 13 ){
				var poruka = $('.textarea').val();

                $.post('includes/messages.php?action=sendMessage&poruka='+poruka, function(response){

                    if( response==1 ){
                        LoadChat();
                        document.getElementById('messageForm').reset();
                    }

                });

                return false;
			}
		});





    </script>

</section>
<aside class="aside">
            <?php
            if($_SESSION['id_grupe']== 1){
               
                include "includes/banhammer.php";
                include "includes/mod.php";
                include "includes/delete.php";
            }
            elseif($_SESSION['id_grupe']== 2){
                include "includes/banhammer.php";
            }
?>
</aside>
    </main>
    </div>
</body>
</html>