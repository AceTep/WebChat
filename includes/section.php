<div id="empty">
    <div id="wrapper">
            <div class="chat_wrapper">
                <div id="chat">
    
                </div>
            <form method="POST" id="messageForm">  
                <textarea name="message" cols="30" rows="7" class="textarea"></textarea>
            </form>

            </div>

    </div> 
</div>

<script>

    LoadChat();


    setInterval(function(){

            LoadChat();

    }, 1000);


    function LoadChat()
    {
        $.post('handlers/messages.php?action=getMessages', function(response){
            
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
            $('form').submit();
        }
    });


    $('form').submit(function(){

        var message = $('.textarea').val();

        $.post('handlers/messages.php?action=sendMessage&message='+message, function(response){

            if( response==1 ){
                LoadChat();
                document.getElementById('messageForm').reset();
            }

        });

        return false;

    });


</script>
