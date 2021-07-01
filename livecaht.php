<?php
include 'config.php';
$conn44 =new config();
$sql44= "SELECT * FROM livechat WHERE UID=$uid";
$result44 = $conn44->datacon()->query($sql44);
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <style>
        .hhhhh2{
            padding: 0px;
            margin: 0px;
            font-family: 'Fira Code';
        }
        .chat-box{
            position: fixed;
            right: 20px;
            bottom: 0px;
            background: white;
            width: 300px;
            border-radius: 5px 5px 0px 0px;
            border: 1px;
            border-style: inset;
        }
        .chat-head{
            width: inherit;
            height: 45px;
            background: #2a57a5;
            border-radius: 5px 5px 0px 0px;
        }
        .chat-head h2{
            color: white;
            padding: 8px;
            display: inline-block;
        }
        .chat-head img{
            cursor: pointer;
            float: right;
            width: 25px;
            margin: 10px;
        }
        .chat-body{
            height: 355px;
            width: inherit;
            overflow: auto;
            margin-bottom: 45px;
        }
        .chat-text{
            position: fixed;
            bottom: 0px;
            height: 45px;
            width: inherit;
        }
        .chat-text textarea{
            width: inherit;
            height: inherit;
            box-sizing: border-box;
            border: 1px solid #bdc3c7;
            padding: 10px;
            resize: none;
        }
        .chat-text textarea:active, .chat-text textarea:focus, .chat-text textarea:hover{
            border-color: royalblue;
        }
        .msg-send{
            background: #e81f25;
        }
        .msg-receive{
            background: #2a57a5;
        }
        .msg-send, .msg-receive{
            width: 200px;
            height: 35px;
            padding: 5px 5px 5px 10px;
            margin: 10px auto;
            border-radius: 3px;
            line-height: 30px;
            position: relative;
            color: white;
        }
        .msg-receive:before{
            content: '';
            width: 0px;
            height: 0px;
            position: absolute;
            border: 15px solid;
            border-color: transparent #2a57a5 transparent transparent;
            left: -29px;
            top: 3px;
        }
        .msg-send:after{
            content: '';
            width: 0px;
            height: 0px;
            position: absolute;
            border: 15px solid;
            border-color: transparent transparent transparent #e81f25;
            right: -29px;
            top: 3px;
        }
        .msg-receive:hover, .msg-send:hover{
            opacity: .9;
        }


    </style>
    <script>
        $(function(){
            var arrow = $('.chat-head img');
            var textarea = $('.chat-text textarea');

            arrow.on('click', function(){
                var src = arrow.attr('src');

                $('.chat-body').slideToggle('fast');
                if(src == 'https://maxcdn.icons8.com/windows10/PNG/16/Arrows/angle_down-16.png'){
                    arrow.attr('src', 'https://maxcdn.icons8.com/windows10/PNG/16/Arrows/angle_up-16.png');
                }
                else{
                    arrow.attr('src', 'https://maxcdn.icons8.com/windows10/PNG/16/Arrows/angle_down-16.png');
                }
            });

            textarea.keypress(function(event) {
                var $this = $(this);

                if(event.keyCode == 13){
                    var msg = $this.val();
                    $this.val('');
                    $('.msg-insert').prepend("<div class='msg-send'>"+msg+"</div>");
                }
            });

        });
    </script>
<script>
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementsByClassName()
        }

    }
</script>
<div class="wrapperrr" >
    <div class="chat-box">
        <div class="chat-head">
            <h2 class="hhhhh2">Shaheen  Live Chat</h2>
            <img src="https://maxcdn.icons8.com/windows10/PNG/16/Arrows/angle_down-16.png" title="Expand Arrow" width="16">
        </div>
        <div class="chat-body">
            <div class="msg-insert">
                <?php while($row44 = $result44->fetch_assoc()) {
                    if($row44['Amsg']=="")
                    {
                ?>
                <div class="msg-send"><?php echo $row44['Umsg'];}else{?></div>
                <div class="msg-receive"><?php echo $row44['Amsg'];}?></div>

                <?php } ?>
            </div>
            <div class="chat-text">
                <textarea placeholder="Send"></textarea>
            </div>
        </div>
    </div>
</div>