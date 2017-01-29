<?php
/**
 * Example input:
 * Names:   Louise|Arthur|Roy|Kathryn|Louis|Patrick|Lillian|Frank|Nicholas|Sandra|Virginia|Ralph|Julia|Shirley|Keith|Antonio|Philip|Betty|Brenda|Jacqueline|Bobby|Jimmy|Wayne|Jane|Mark|Lawrence
 * Ages:    47|41|17|49|64|29|66|35|45|41|75|23|73|17|79|22|40|45|61|43|77|72|48|75|39|44
 */

session_start();

$page = 0;
if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
    $page = $page >= 0 ? $page : 0;
    if (isset($_SESSION['students']) && !empty($_SESSION['students'])) {
        $students = json_decode($_SESSION['students']);
        if ($page * 5 >= sizeof($students)) {
            unset($students);
        }
    } else {
        session_unset();
    }
} else {
    if (isset($_GET['names']) && isset($_GET['ages']) && isset($_GET['delimiter'])) {
        $studentData = buildStudentData();
        if ($studentData !== false) {
            $students = $studentData;
            $_SESSION['students'] = json_encode($studentData);
        }
    } else {
        session_unset();
    }
}

function buildStudentData() {
    $delimiter = trim($_GET['delimiter']);
    $names = array_filter(array_map('trim', explode($delimiter, $_GET['names'])));
    $ages =  array_map('intval', array_filter(array_map('trim', explode($delimiter, $_GET['ages']))));

    if (strpos($_GET['names'], $_GET['delimiter']) !== false  &&
        strpos($_GET['ages'], $_GET['delimiter']) !== false &&
        sizeof($names) == sizeof($ages)) {
        $students = [];
        for ($i = 0; $i < sizeof($ages); $i++) {
            $student = (object)[];
            $student->name = $names[$i];
            $student->age = $ages[$i];
            array_push($students, $student);
        }

        return $students;
    }

    return false;
}

include 'layout.php';