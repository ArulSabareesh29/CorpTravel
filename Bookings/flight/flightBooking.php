<?php
include_once 'flightBooking_connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../../img/LogoV1.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <!--Import Google Icon Font-->
        <link
              href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet"
              />
        <!-- Compiled and minified CSS -->
        <link
              rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
              />
        <link
              rel="stylesheet"
              href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
              integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
              crossorigin="anonymous"
              />
        <link rel="stylesheet" href="css/flight.css" />
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>CorpTravel</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <form class="col s12 m12" method="POST" action=" ">
                    <h4>Passenger Details</h4>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">account_circle</i>
                            <input
                                   id="first_name"
                                   type="text"
                                   name="first_name"
                                   class="validate"
                                   />
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="last_name" type="text" class="validate" />
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="email" class="validate" />
                            <label for="email">Email</label>
                            <span class="helper-text" data-error="Enter Valid E-mail"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">phone</i>
                            <input id="number" type="number" class="validate" />
                            <label for="number">Phone Number</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">alternate_email</i>
                            <input id="emailLm" type="email" class="validate" />
                            <label for="email">Line Manager's Email</label>
                            <span class="helper-text" data-error="Enter Valid E-mail"></span>
                        </div>
                    </div>
                    <form class="col s12 m12" method="POST" action=" ">
                        <h4>Flight Booking Form</h4>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">local_airport</i>
                                <input
                                       id="from"
                                       type="text"
                                       name="from" 
                                       class="validate"
                                       />
                                <label for="From">From</label>
                                <div id="fromList"></div>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">local_airport</i>
                                <input name="to" id="to" type="text" class="validate" />
                                <label for="To">To</label>
                                <div id="toList"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12">
                                <i class="material-icons prefix">calendar_today</i>
                                <input type="date" name="departureDate" id="departureDate" class="validate" />
                                <label for="Departure">Departure</label>
                                <div id="departureDateList"></div>
                                <span class="helper-text" data-error="Enter Valid E-mail"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">calendar_today</i>
                                <input type="date" name="arrivalDate" id="arrivalDate" class="validate" />
                                <label for="number">Arrival</label>
                                <div id="arrivalDateList"></div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <i class="material-icons prefix">card_travel</i>
                                    <select name="class" id="class" required>
                                        <option value="economy">Economy</option>
                                        <option value="business">Business</option>
                                        <option value="luxury">Luxury</option>
                                    </select>
                                </div>
                            </div>
                            <h4>Booking for additional Travellers in the Trip</h4>
                            <table class="striped responsive-table">
                                <tr>
                                    <th>Title</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Employee No.</th>
                                    <th>Cost Center</th>
                                </tr>
                                <tr>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                </tr>
                                <tr>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                </tr>
                                <tr>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                </tr>
                                <tr>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                </tr>
                            </table>

                            <h4>Flight Request</h4>
                            <table class="striped responsive-table">
                                <tr>
                                    <th>Title</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Employee No.</th>
                                    <th>Cost Center</th>
                                </tr>
                                <tr>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                </tr>
                                <tr>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                </tr>
                                <tr>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                </tr>
                                <tr>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                    <td><input type="text" /></td>
                                </tr>
                            </table>
                            </form>
                        </div>
                    </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
                <script>

                    $(document).ready(function () {
                        $('#from').keyup(function () {
                            let fromQuery = $(this).val();
                            if(fromQuery !== '') {
                                $.ajax({
                                    url:"flightBooking_connection.php",
                                    method:"POST",
                                    data:{fromQuery:fromQuery},
                                    success:function (data) {
                                        $('#fromList').fadeIn();
                                        $('#fromList').html(data);
                                    }
                                })
                            }else {
                                $('#fromList').fadeOut();
                                $('#fromList').html("");
                            }
                        });
                        $(document).on('click', 'li.from', function () {
                            $('#from').val($(this).text().split('|', 1));
                            $('#fromList').fadeOut();
                        })
                    });

                    $(document).ready(function () {
                        $('#to').keyup(function () {
                            let toQuery = $(this).val();
                            if(toQuery !== '') {
                                $.ajax({
                                    url:"flightBooking_connection.php",
                                    method:"POST",
                                    data:{toQuery:toQuery},
                                    success:function (data) {
                                        $('#toList').fadeIn();
                                        $('#toList').html(data);
                                    }
                                })
                            }else {
                                $('#toList').fadeOut();
                                $('#toList').html("");
                            }
                        });
                        $(document).on('click', 'li.to', function () {
                            $('#to').val($(this).text().split('|', 1));
                            $('#toList').fadeOut();
                        })
                    });

                    $(function () {

                        $('form').on('submit', function (e) {
                            let from = $("#from").val();
                            let to = $("#to").val();
                            let pullDDate = $("#departureDate").val();
                            let reorderD = pullDDate.split("-");
                            let departureDate = reorderD[2]+'/'+reorderD[1]+'/'+reorderD[0];
                            let pullADate = $("#arrivalDate").val();
                            let reorderA = pullADate.split("-");
                            let arrivalDate = reorderA[2]+'/'+reorderA[1]+'/'+reorderA[0];
                            /*let arrivalDate = $("#arrivalDate").val();*/
                            let classVal = $("#class").val();

                            e.preventDefault();

                            $.ajax({
                                url: 'flightBooking_connection.php',
                                method:"POST",
                                data: /*$('form').serialize()*/ {from:from, to:to, departureDate:departureDate, arrivalDate:arrivalDate, classVal:classVal},
                                success: function (data) {
                                    console.log($('form').serialize());
                                    console.log(departureDate);
                                    console.log(arrivalDate);
                                    $('#check').html(data);

                                }
                            });

                        });

                    });
                </script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var elems = document.querySelectorAll('select');
                        var instances = M.FormSelect.init(elems, options);
                    });

                    // Or with jQuery

                    $(document).ready(function(){
                        $('select').formSelect();
                    });
                </script>
                </body>
            </html>
