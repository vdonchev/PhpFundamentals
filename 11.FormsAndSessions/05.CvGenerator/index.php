<?php
if (!isset($_GET["submit"])) {
    require_once "views/form.php";
    exit;
}

$get = &$_GET;

$firstName = trim($get["firstName"]);
$lastName = trim($get["lastName"]);
$email = trim($get["email"]);
$phoneNumber = trim($get["phoneNumber"]);
$sex = trim($get["sex"]);
$birthDay = trim($get["birthDate"]);
$nationality = trim($get["nationality"]);
$companyName = trim($get["companyName"]);
$companyFrom = trim($get["companyFrom"]);
$companyTo = trim($get["companyTo"]);

$languages = [];
for ($i = 0; $i < count($get["language"]); $i++) {
    if (empty(trim($get["language"][$i])))
        continue;

    $languages[$get["language"][$i]] = $get["languageLevel"][$i];
}

$otherLang = [];
for ($i = 0; $i < count($get["otherLang"]); $i++) {
    if (empty(trim($get["otherLang"][$i])))
        continue;

    $otherLang[$get["otherLang"][$i]] = [
        "comprehension" => $get["comprehension"][$i],
        "reading" => $get["reading"][$i],
        "writing" => $get["writing"][$i]
    ];
}

$drivingLicense = $get["drivingLicense"];

if (regexValidate($firstName, "[a-zA-Z]{2,20}") &&
    regexValidate($lastName, "[a-zA-Z]{2,20}") &&
    regexValidate($companyName, "[a-zA-Z0-9]{2,20}") &&
    regexValidate($phoneNumber, "[0-9\\+\\-\\s]+") &&
    regexValidate($email, "[a-zA-Z0-9]+@[a-zA-Z0-9]+\\.[a-zA-Z0-9]+")){

    $formData = [];
    $formData["firstName"] = $firstName;
    $formData["lastName"] = $lastName;
    $formData["email"] = $email;
    $formData["phoneNumber"] = $phoneNumber;
    $formData["sex"] = $sex;
    $formData["birthDate"] = $birthDay;
    $formData["nationality"] = $nationality;
    $formData["companyName"] = $companyName;
    $formData["companyFrom"] = $companyFrom;
    $formData["companyTo"] = $companyTo;
    $formData["languages"] = $languages;
    $formData["speakingLanguages"] = $otherLang;
    $formData["drivingLicense"] = $drivingLicense;
}


function regexValidate(string $text, string $regExp): bool
{
    return preg_match("/{$regExp}/", $text);
}

require_once "views/cv.php";