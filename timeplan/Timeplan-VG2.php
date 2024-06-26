<?php include '../menu/connect.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gand IT</title>
    <link rel="stylesheet" href="../timeplan/style2.css">
    <link rel="stylesheet" href="../menu/menu.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="topBarContainer"></div>
    
    <h1 id="welcome" class="hidden">VG 2 Timeplan 2023 - 2024 IT</h1>
    <main>

        <!-- Tabell -->
        <table>
            <tr>
                <!-- Første Rad med info om va som kommer etter neste rad -->
                <th>Tid</th>
                <th>Mandag</th>
                <th>Tirsdag</th>
                <th>Onsdag</th>
                <th>Torsdag</th>
                <th>Fredag</th>
            </tr>
            <!-- Resten av tabellen  -->
            <tr>
                <td>08:05</td>
                <td class="event" rowspan="3" id="driftstøtte">Driftstøtte</td>
                <td class="event" rowspan="3" id="samfunnsfag">Samfunnskunnskap</td>
                <td class="event" rowspan="3" id="brukerstøtte">Brukerstøtte</td>
                <td class="event" rowspan="3" id="utvikling">Utvikling</td>
                <td class="event" rowspan="3" id="driftstøtte">Driftstøtte</td>
            </tr>
            <tr>
                <td>09:00</td>
            </tr>
            <tr>
                <td>09:35</td>
            </tr>
            <tr>
                <td>Pause 15 Min</td>
            </tr>
            <tr>
                <td>09:50</td>
                <td class="event" rowspan="4" id="kroppsøving">Kroppsøving</td>
                <td class="event" rowspan="4" id="utvikling">Utvikling</td>
                <td class="event" rowspan="4" id="samfunnsfag">Samfunnskunnskap</td>
                <td class="event" rowspan="4" id="brukerstøtte">Brukerstøtte</td>
                <td class="event" rowspan="4" id="norsk">Norsk</td>
            </tr>
            <tr>
                <td>10:00</td>
            </tr>
            <tr>
                <td>11:00</td>     
            </tr>
            <tr>
                <td>11:20</td>
            </tr>
            <tr>
                <td>Pause 30 Min</td>
            </tr>
            <tr>
                <td>11:50</td>
                <td class="event" rowspan="6" id="brukerstøtte">Brukerstøtte</td>
                <td class="event" rowspan="3" id="utvikling">Utvikling</td>
                <td></td>
                <td class="event" rowspan="6" id="norsk">Norsk</td>
                
            </tr>
            <tr>
                <td>12:00</td>
                <td></td>
            </tr>
            <tr>
                <td>12:05</td>
                <td class="event" rowspan="7" id="utvikling">Utvikling</td>
            </tr>
            <tr>
                <td>12:35</td>
                <td class="split-cell">
                    <div class="top-half" id="utvikling"></div>
                    <div class="bottom-half" id="driftstøtte"></div>
                </td>
            </tr>
            <tr>
                <td>13:00</td>
                <td class="event" rowspan="2" id="driftstøtte">Driftstøtte</td>
            </tr>
            <tr>
                <td>13:20</td>

            </tr>
            <tr>
                <td>Pause 10 Min</td>
            </tr>
            <tr>
                <td>13:30</td>
                <td class="event" rowspan="3" id="norsk">Norsk</td>
                <td class="event" rowspan="5" id="driftstøtte">Driftstøtte</td>
            </tr>
            <tr>
                <td>13:35</td>
            </tr>
            <tr>
                <td>14:00</td>
                <tr>
                    <td>14:15</td>
                    <td class="split-cell">
                        <div class="top-half" id="norsk"></div>
                        <div class="bottom-half" id="YFF"></div>
                    </td>

                </tr>
              <tr>
                  <td>15:00</td>
                  <td id="YFF" rowspan="3">YFF</td>
              </tr>
    </main>
    <script src="../timeplan/script2.js"></script>
    <script src="../menu/menu.js"></script>
</body>
</html>