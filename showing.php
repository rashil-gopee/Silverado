<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="./css/general.css" />
    <link type="text/css" rel="stylesheet" href="./css/style.css" />
    <title>Silverado | Your new Dolby cinema</title>
</head>

<body>
<?php

include_once ('./tpl/menu.tpl.php');

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
                    <th>Mon - Tue (All Day)<br>Mon - Fri (1pm only)
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
                    <td rowspan="2">Standard</td>
                    <td>Adult</td>
                    <td>$25.00</td>
                    <td>$30.00</td>
                </tr>
                <tr>
                    <td>Full</td>
                    <td>$20.00</td>
                    <td>$25.00</td>
                </tr>
                <tr>
                    <td rowspan="3">FirstClass</td>
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
                        <select name="movie">
                            <option value="CH">LEGO Batman</option>
                            <option value="AF">A Quiet Passion</option>
                            <option value="RC">La la land</option>
                            <option value="AC">John Rambo</option>
                        </select></p>
                    <p><label>Session:</label>&nbsp;<select name="session">
                        <option value="MON-12">Monday 13.00</option>
                        <option value="MON-18">Monday 18.00</option>
                        <option value="MON-21">Monday 21.00</option>
                        <option value="TUE-13">Tuesday 13.00</option>
                        <option value="TUE-18">Tuesday 18.00</option>
                        <option value="TUE-21">Tuesday 21.00</option>
                        <option value="WED-13">Wednesday 13.00</option>
                        <option value="WED-18">Wednesday 18.00</option>
                        <option value="WED-21">Wednesday 21.00</option>
                        <option value="THU-13">Thursday 13.00</option>
                        <option value="THU-18">Thursday 18.00</option>
                        <option value="THU-21">Thursday 21.00</option>
                        <option value="FRI-13">Friday 13.00</option>
                        <option value="FRI-18">Friday 18.00</option>
                        <option value="FRI-21">Friday 21.00</option>
                        <option value="SAT-12">Saturday 12.00</option>
                        <option value="SAT-15">Saturday 15.00</option>
                        <option value="SAT-18">Saturday 18.00</option>
                        <option value="SAT-21">Saturday 21.00</option>
                        <option value="SUN-12">Sunday 12.00</option>
                        <option value="SUN-15">Sunday 15.00</option>
                        <option value="SUN-18">Sunday 18.00</option>
                        <option value="SUN-21">Sunday 21.00</option>
                        </select></p>
                    <fieldset>
                        <legend>
                            <h2>Seats</h2>
                        </legend>
                        <fieldset>
                            <legend>
                                <h3>Standard</h3>
                            </legend>
                            <p><label>Adult:</label>&nbsp;<input type="number" name="seats[SF]" value=0></p>
                            <p><label>Concession:</label>&nbsp;<input type="number" name="seats[SP]" value=0></p>
                            <p><label>Child:</label>&nbsp;<input type="number" name="seats[SC]" value=0></p>
                        </fieldset>
                        <fieldset>
                            <legend>
                                <h3>First Class
                                </h3>
                            </legend>
                            <p><label>Adult</label>&nbsp;<input type="number" name="seats[FA]" value=0></p>
                            <p><label>Child</label>&nbsp;<input type="number" name="seats[FC]" value=0></p>
                        </fieldset>
                        <fieldset>
                            <legend>
                                <h3>Bean Bags</h3>
                            </legend>
                            <p><label>Adult</label>&nbsp;<input type="number" name="seats[BA]" value=0></p>
                            <p><label>Family</label>&nbsp;<input type="number" name="seats[BF]" value=0></p>
                            <p><label>Child</label>&nbsp;<input type="number" name="seats[BC]" value=0></p>
                        </fieldset>
                    </fieldset>
                    <button type="submit" role="button">Book</button>
                </fieldset>
            </form>
        </section>
        <!-- End of Starting form code -->
    </main>
<?php

include_once ('./tpl/menu.tpl.php');

?>
</body>

</html>