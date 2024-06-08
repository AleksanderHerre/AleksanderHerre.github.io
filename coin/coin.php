<?php

?>
<html>
    <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Coin Flip</title>
            <link rel="stylesheet" href="../menu/menu.css">
        <link rel="stylesheet" href="../coin/coin.css">
    </head>

        <body>
            <!-- Bakgrunns Bilde -->
            <img id="falling-coin" src="falling-coins.gif"></img>
            <!-- Meny -->
            <div id="topBarContainer"></div>
            <!-- Bakgrunns box og Side A - B til mynten -->
            <div id="box"></div>
            
            <div id="coin">
                <div class="side-a">
                    H
                </div>
                <div class="side-b">
                    T
                </div>
            </div>
            
            <!-- Tekst -->
            <h1 id="result_coin">It is  </h1>
            <h1 id="tails_result">Tails: </h1>
            <h1 id="heads_result">Heads: </h1>
            <button id="reset">Start på Nytt</button>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="../coin/coin.js"></script>
            <script src="../menu/menu.js"></script>
        </body>

</html>