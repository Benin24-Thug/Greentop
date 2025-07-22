<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        "First Name" => $_POST['firstname'] ?? '',
        "Last Name" => $_POST['lastname'] ?? '',
        "Email" => $_POST['email'] ?? '',
        "Phone" => $_POST['phone'] ?? '',
        "Gender" => $_POST['gender'] ?? '',
        "Age" => $_POST['age'] ?? '',
        "DOB" => $_POST['dob'] ?? '',
        "Address" => $_POST['address'] ?? '',
        "Applying For" => $_POST['position'] ?? '',
        "Experience" => $_POST['experience'] ?? '',
        "Reason" => $_POST['reason'] ?? '',
    ];

    $filename = "responses.txt";
    $entry = "----- Application -----\n";
    foreach ($data as $key => $value) {
        $entry .= "$key: $value\n";
    }
    $entry .= "Uploaded: " . ($_FILES['resume']['name'] ?? 'No file') . "\n";
    $entry .= "------------------------\n\n";

    file_put_contents($filename, $entry, FILE_APPEND);

    echo "Thank you! Your response has been recorded.";
} else {
    echo "Invalid access.";
}
?>
