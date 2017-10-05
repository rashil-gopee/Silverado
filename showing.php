<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="./css/general.css"/>
    <link type="text/css" rel="stylesheet" href="./css/style.css"/>
    <title>Silverado | Your new Dolby cinema</title>
</head>

<body onload="generateSessionOptions('CH')">
<?php

include_once('./tpl/menu.tpl.php');

?>

<main id="showing">
    <section>
        <h1>Now showing</h1>
        <div class="movie-box-wrapper">
            <div class="movie-box">
                <div>
                    <img src="https://yts.ag/assets/images/movies/the_lego_batman_movie_2017/medium-cover.jpg">
                    <h3>LEGO Batman</h3>
                    <strong>Genre:&nbsp;</strong>Childrens
                    <br>
                    <strong>Sessions:</strong>
                    <ul>
                        <li>Mon - Tue @ 13.00</li>
                        <li>Wed - Fri @ 18.00</li>
                        <li>Sat - Sun @ 12.00</li>
                    </ul>
                </div>
            </div>
            <div class="movie-box">
                <div>
                    <img src="https://yts.ag/assets/images/movies/a_quiet_passion_2016/medium-cover.jpg">
                    <h3>A Quiet Passion</h3>
                    <strong>Genre:&nbsp;</strong>Art/Foreign
                    <br>
                    <strong>Sessions:</strong>
                    <ul>
                        <li>Mon - Tue @ 18.00</li>
                        <li>Sat - Sun @ 15.00</li>
                    </ul>
                </div>
            </div>
            <div class="movie-box">
                <div>
                    <img src="https://yts.ag/assets/images/movies/la_la_land_2016/medium-cover.jpg">
                    <h3>La La Land</h3>
                    <strong>Genre:&nbsp;</strong>Romantic/Comedy
                    <br>
                    <strong>Sessions:</strong>
                    <ul>
                        <li>Mon - Tue @ 21.00</li>
                        <li>Wed - Fri @ 13.00</li>
                        <li>Sat - Sun @ 18.00</li>
                    </ul>
                </div>
            </div>
            <div class="movie-box">
                <div>
                    <img src="https://yts.ag/assets/images/movies/rambo_first_blood_part_ii_1985/medium-cover.jpg">
                    <h3>John Rambo</h3>
                    <strong>Genre:&nbsp;</strong>Action
                    <br>
                    <strong>Sessions:</strong>
                    <ul>
                        <li>Wed - Fri @ 21.00</li>
                        <li>Sat - Sun @ 21.00</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h1>Seats Pricing</h1>
        <table>
            <tr>
                <th>Seat type</th>
                <th>Seat Option</th>
                <th>Mon - Tue (All Day)<br>Wed - Fri (1pm only)
                </th>
                <th>
                    Wed - Fri (after 1pm)<br>Sat - Sun (All Day)
                </th>
            </tr>
            <tr>
                <td rowspan="3">Standard</td>
                <td>Full</td>
                <td>$12.50</td>
                <td>$18.50</td>
            </tr>
            <tr>
                <td>Concession</td>
                <td>$10.50</td>
                <td>$15.50</td>
            </tr>
            <tr>
                <td>Child</td>
                <td>$8.50</td>
                <td>$12.50</td>
            </tr>
            <tr>
                <td rowspan="2">First Class</td>
                <td>Adult</td>
                <td>$25.00</td>
                <td>$30.00</td>
            </tr>
            <tr>
                <td>Child</td>
                <td>$20.00</td>
                <td>$25.00</td>
            </tr>
            <tr>
                <td rowspan="3">Bean Bags</td>
                <td>Adult</td>
                <td>$22.00</td>
                <td>$33.00</td>
            </tr>
            <tr>
                <td>Family</td>
                <td>$20.00</td>
                <td>$30.00</td>
            </tr>
            <tr>
                <td>Child</td>
                <td>$20.00</td>
                <td>$30.00</td>
            </tr>
        </table>
    </section>

    <section>
        <!-- Starting form code sourced and adapted from https://titan.csit.rmit.edu.au/~e54061/wp/silverado-test.php -->
        <form method="post" action="cart.php">
            <fieldset>
                <legend>
                    <h1>Booking Form</h1>
                </legend>
                <p><label>Movie:</label>&nbsp;
                    <select name="movie" onchange="generateSessionOptions(this.value)">
                        <option value="CH" selected>LEGO Batman</option>
                        <option value="AF">A Quiet Passion</option>
                        <option value="RC">La la land</option>
                        <option value="AC">John Rambo</option>
                    </select></p>
                <p><label>Session:</label>&nbsp;<select name="session" id="session" onchange="updateSeatCosts()">
                    </select></p>
                <fieldset>
                    <legend>
                        <h2>Seats</h2>
                    </legend>
                    <fieldset>
                        <legend>
                            <h3>Standard</h3>
                        </legend>
                        <p><label>Adult:</label>&nbsp;<input type="number" name="seats[SF]" id="SF" value=0 min=0 max=40
                                                             onchange="updateSeatCosts()"></p>
                        <p>$ <span id="SFCost">0.00</span></p>

                        <p><label>Concession:</label>&nbsp;<input type="number" name="seats[SP]" id="SP" value=0 min=0
                                                                  max=40
                                                                  onchange="updateSeatCosts()"></p>
                        <p>$ <span id="SPCost">0.00</span></p>
                        <p><label>Child:</label>&nbsp;<input type="number" name="seats[SC]" id="SC" value=0 min=0 max=40
                                                             onchange="updateSeatCosts()"></p>
                        <p>$ <span id="SCCost">0.00</span></p>
                    </fieldset>
                    <fieldset>
                        <legend>
                            <h3>First Class
                            </h3>
                        </legend>
                        <p><label>Adult</label>&nbsp;<input type="number" name="seats[FA]" id="FA" value=0 min=0 max=12
                                                            onchange="updateSeatCosts()"></p>
                        <p>$ <span id="FACost">0.00</span></p>
                        <p><label>Child</label>&nbsp;<input type="number" name="seats[FC]" id="FC" value=0 min=0 max=12
                                                            onchange="updateSeatCosts()"></p>
                        <p>$ <span id="FCCost">0.00</span></p>
                    </fieldset>
                    <fieldset>
                        <legend>
                            <h3>Bean Bags</h3>
                        </legend>
                        <p><label>Adult</label>&nbsp;<input type="number" name="seats[BA]" id="BA" min=0 max=13
                                                            value=0 onchange="updateSeatCosts()"></p>
                        <p>$ <span id="BACost">0.00</span></p>
                        <p><label>Family</label>&nbsp;<input type="number" name="seats[BF]" id="BF" value=0 min=0 max=13
                                                             onchange="updateSeatCosts()"></p>
                        <p>$ <span id="BFCost">0.00</span></p>
                        <p><label>Child</label>&nbsp;<input type="number" name="seats[BC]" id="BC" value=0 min=0 max=13
                                                            onchange="updateSeatCosts()"></p>
                        <p>$ <span id="BCCost">0.00</span></p>
                    </fieldset>
                    <label>Total Cost:&nbsp;</label>
                    <p>$ <span id="TotalCost">0.00</span></p>
                </fieldset>
                <button type="submit" role="button">Book</button>
            </fieldset>
        </form>
    </section>
    <!-- End of Starting form code -->
</main>
<?php

include_once('./tpl/menu.tpl.php');

?>

<script>
    function generateSessionOptions(value) {
        var select = document.getElementById('session');
        var length = select.options.length;

        for (i = length - 1; i >= 0; i--) {
            select.remove(i);
        }

        var options = [];
        if (value === 'CH') {
            options = [
                {value: 'MON-13', innerHTML: 'Monday 13:00'},
                {value: 'TUE-13', innerHTML: 'Tuesday 13:00'},
                {value: 'WED-18', innerHTML: 'Wednesday 18:00'},
                {value: 'THU-18', innerHTML: 'Thursday 18:00'},
                {value: 'FRI-18', innerHTML: 'Friday 18:00'},
                {value: 'SAT-18', innerHTML: 'Saturday 12:00'},
                {value: 'SUN-18', innerHTML: 'Sunday 12:00'}
            ];
        }
        else if (value === 'AF') {
            options = [
                {value: 'MON-18', innerHTML: 'Monday 18:00'},
                {value: 'TUE-18', innerHTML: 'Tuesday 18:00'},
                {value: 'SAT-15', innerHTML: 'Saturday 15:00'},
                {value: 'SUN-15', innerHTML: 'Sunday 15:00'}
            ];
        }
        else if (value === 'RC') {
            options = [
                {value: 'MON-21', innerHTML: 'Monday 21:00'},
                {value: 'TUE-21', innerHTML: 'Tuesday 21:00'},
                {value: 'WED-13', innerHTML: 'Wednesday 13:00'},
                {value: 'THU-13', innerHTML: 'Thursday 13:00'},
                {value: 'FRI-13', innerHTML: 'Friday 13:00'},
                {value: 'SAT-18', innerHTML: 'Saturday 18:00'},
                {value: 'SUN-18', innerHTML: 'Sunday 18:00'}
            ];
        }
        else {
            options = [
                {value: 'WED-21', innerHTML: 'Wednesday 21:00'},
                {value: 'THU-21', innerHTML: 'Thursday 21:00'},
                {value: 'FRI-21', innerHTML: 'Friday 21:00'},
                {value: 'SAT-21', innerHTML: 'Saturday 21:00'},
                {value: 'SUN-21', innerHTML: 'Sunday 21:00'}
            ];
        }

        for (var i = 0; i < options.length; i++) {
            var opt = document.createElement('option');

            opt.value = options[i].value;
            opt.innerHTML = options[i].innerHTML;
            select.appendChild(opt);
        }
    }

    function updateSeatCosts() {
        var seatCosts = {
            SF: 0,
            SP: 0,
            SC: 0,
            FA: 0,
            FC: 0,
            BA: 0,
            BF: 0,
            BC: 0
        };

        var SFAmount = document.getElementById('SF').value;
        var SPAmount = document.getElementById('SP').value;
        var SCAmount = document.getElementById('SC').value;
        var FAAmount = document.getElementById('FA').value;
        var FCAmount = document.getElementById('FC').value;
        var BAAmount = document.getElementById('BA').value;
        var BFAmount = document.getElementById('BF').value;
        var BCAmount = document.getElementById('BC').value;

        console.log('SFAmount', SFAmount);

        if (isCheap()) {
            seatCosts.SF = SFAmount * 12.50;
            seatCosts.SP = SPAmount * 10.50;
            seatCosts.SC = SCAmount * 8.50;
            seatCosts.FA = FAAmount * 25.00;
            seatCosts.FC = FCAmount * 20.00;
            seatCosts.BA = BAAmount * 22.00;
            seatCosts.BF = BFAmount * 20.00;
            seatCosts.BC = BCAmount * 20.00;
        }
        else {
            seatCosts.SF = SFAmount * 18.50;
            seatCosts.SP = SPAmount * 15.50;
            seatCosts.SC = SCAmount * 12.50;
            seatCosts.FA = FAAmount * 30.00;
            seatCosts.FC = FCAmount * 25.00;
            seatCosts.BA = BAAmount * 33.00;
            seatCosts.BF = BFAmount * 30.00;
            seatCosts.BC = BCAmount * 30.00;
        }

        console.log(seatCosts);
        document.getElementById('SFCost').innerHTML = (seatCosts.SF).toFixed(2);
        document.getElementById('SPCost').innerHTML = (seatCosts.SP).toFixed(2);
        document.getElementById('SCCost').innerHTML = (seatCosts.SC).toFixed(2);
        document.getElementById('FACost').innerHTML = (seatCosts.FA).toFixed(2);
        document.getElementById('FCCost').innerHTML = (seatCosts.FC).toFixed(2);
        document.getElementById('BACost').innerHTML = (seatCosts.BA).toFixed(2);
        document.getElementById('BFCost').innerHTML = (seatCosts.BF).toFixed(2);
        document.getElementById('BCCost').innerHTML = (seatCosts.BC).toFixed(2);
        document.getElementById('TotalCost').innerHTML = (seatCosts.SF + seatCosts.SC + seatCosts.SP + seatCosts.FA + seatCosts.FC + seatCosts.BA + seatCosts.BC + seatCosts.BF).toFixed(2);
    }

    function isCheap() {
        var select = document.getElementById('session');
        var selectedSession = select.options[select.selectedIndex].value;

        var day = selectedSession.substring(0, 3);
        var time = Number(selectedSession.substring(4, 6));

        if (day == 'MON' || day == 'TUE')
            return true;
        else if ((day == 'WED' || day == 'THU' || day == 'FRI') && time <= 13)
            return true;
        else
            return false;
    }

</script>

</body>

</html>