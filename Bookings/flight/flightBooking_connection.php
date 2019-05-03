<?php
$connect = mysqli_connect("localhost", "root", "", "corptravel");

if (isset($_POST["fromQuery"])) {
    $output = '';
    $query = "SELECT * FROM flight_data1 WHERE Code LIKE '%" . $_POST["fromQuery"] . "%' OR Airport LIKE '%" . $_POST["fromQuery"] . "%'";
    $result = mysqli_query($connect, $query);
    $output = '<ul class="list-unstyled">';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '<li class="from">' . $row["Code"] . '|' . $row["Airport"] . '|' . $row["Countries"] . '|' . $row["Cities"] . '</li>';
        }
    } else {
        $output .= '<li>City Not Listed</li>';
    }
    $output .= '</ul>';
    echo $output;
}

if (isset($_POST["toQuery"])) {
    $output = '';
    $query = "SELECT * FROM flight_data1 WHERE Code LIKE '%" . $_POST["toQuery"] . "%' OR Airport LIKE '%" . $_POST["toQuery"] . "%'";
    $result = mysqli_query($connect, $query);
    $output = '<ul class="list-unstyled">';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '<li class="to">' . $row["Code"] . '|' . $row["Airport"] . '|' . $row["Countries"] . '|' . $row["Cities"] . '</li>';
        }
    } else {
        $output .= '<li>City Not Listed</li>';
    }
    $output .= '</ul>';
    echo $output;
}

if (!empty($_POST["from"]) && !empty($_POST["to"]) && !empty($_POST["departureDate"]) && !empty($_POST["arrivalDate"]) && !empty($_POST["classVal"])) {
    $from = $_POST["from"];
    $to = $_POST["to"];
    $departureDate = $_POST["departureDate"];
    $arrivalDate = $_POST["arrivalDate"];
    $classVal = $_POST["classVal"];

    $output = '';
    $query = "SELECT * FROM flight_data3 WHERE `Departure Country` = '$from' AND `Arrival Country` = '$to' 
                             AND `Date` >= '$departureDate' AND `Date` <= '$arrivalDate'";
    $result = mysqli_query($connect, $query);
    $output = '<table id="testtss">

        <tr>
            <td>Arrival Airport</td>
            <td>Departure Airport</td>
            <td>Date</td>
            <td>Departure Time</td>
            <td>Arrival Time</td>
            <td>Plane ID</td>
            <td>Airlines Name</td>
            <td>Airport</td>
            <td>Departure Country</td>
            <td>Departure City</td>
        </tr>';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '<tr>
            <th id="arrCoun" class="clickable">' . $row["Arrival Country"] . '</th>
            <th>' . $row["Departure Country"] . '</th>
            <th>' . $row["Date"] . '</th>
            <th>' . $row["Departure Time"] . '</th>
            <th>' . $row["Arrival Time"] . '</th>
            <th>' . $row["Plane ID"] . '</th>';
            $query2 = "SELECT `Airlines Name` FROM flight_data2 WHERE `Plane ID` = '$row[0]'";
            $result1 = mysqli_query($connect, $query2);
            if (mysqli_num_rows($result1) > 0) {
                while ($row1 = mysqli_fetch_array($result1)) {
                    $output .= '<th>' . $row1[0] . '</th>';

                    $query3 = "SELECT * FROM flight_data1 WHERE `Code` = '$row[2]'";
                    $result2 = mysqli_query($connect, $query3);
                    if (mysqli_num_rows($result2) > 0) {
                        while ($row2 = mysqli_fetch_array($result2)) {
                            $output .= '<th>' . $row2[1] . '</th>';
                            $output .= '<th>' . $row2[2] . '</th>';
                            $output .= '<th>' . $row2[3] . '</th>';
                            $output .= '<th><button type="button" onclick="exportData('.$row2[1].')">Select</button></th>';
                            '</tr>';
                        }
                    }
                }
            } else {
                $output .= '<tr>
            <th colspan="6">City Not Listed</th>
            </tr>';
                /*echo $query;*/
            }
            $output .= '</table>';;
            echo $output;
        }

    }

}
?>
