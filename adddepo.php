<?php
    require_once("header.php");
    if(isset($_POST["kwota"]))
    {
        $kwota=$_POST["kwota"];
        $client=$_POST["id"];
        $sql=sql("SELECT * FROM clients WHERE id=$client");
        $row=mysql_fetch_array($sql);
        $newbalance=$row{"balance"}+$kwota;
        $sql=sql("UPDATE clients SET balance = $newbalance WHERE id=$client");
        $tanhis=sql("INSERT INTO tranhistory (user_id, TType, Amount, Balance_user) VALUES ($client, 'D', $kwota, $newbalance)");
    }
    echo'
        <div class="container">
            <div class="row" style="padding-top:100px">
                <div class="col">
                    <h2 style="color:green">
                        Doładowano '.$kwota.' PLN!
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h6>
                       Za chwilę zostaniesz przeniesiony na swój terminal.
                    </h6>
                </div>
            </div>
        </div>
    ';
?>
<script>
    var num = <?php echo $client ?>; 
    setTimeout(function(){location.href="clienterminal.php?id="+num+""} , 3000);  
</script>