<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    
    if (empty($_POST['first-name'])) {
        $errors[] = 'First Name is required.';
    }
    if (empty($_POST['last-name'])) {
        $errors[] = 'Last Name is required.';
    }
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required.';
    }
    if (empty($_POST['message'])) {
        $errors[] = 'Message is required.';
    }
    if (!isset($_POST['terms'])) {
        $errors[] = 'You must agree to the Terms & Conditions.';
    }

    if (count($errors) > 0) {
        echo implode('<br>', $errors);
        exit;
    }

    $formData = [
        'first_name' => htmlspecialchars($_POST['first-name']),
        'last_name' => htmlspecialchars($_POST['last-name']),
        'email' => htmlspecialchars($_POST['email']),
        'phone' => htmlspecialchars($_POST['phone']),
        'message' => htmlspecialchars($_POST['message']),
        'submitted_at' => date("Y-m-d H:i:s")
    ];

    $jsonFile = 'submissions.json';
    $currentData = file_get_contents($jsonFile);
    $data = json_decode($currentData, true);
    if (!$data) {
        $data = [];
    }
    $data[] = $formData;
    file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));

    $adminEmails = ['dumidu.kodithuwakku@ebeyonds.com', 'prabhath.senadheera@ebeyonds.com'];

    
    $subjectUser = "Thank you for your submission";
    $messageUser = "Hello " . $formData['first_name'] . ",\n\nThank you for reaching out. We have received your message and will get back to you shortly.\n\nYour submission details:\nFirst Name: " . $formData['first_name'] . "\nLast Name: " . $formData['last_name'] . "\nMessage: " . $formData['message'] . "\n\nBest regards,\nThe Team";
    $headersUser = 'From: no-reply@yourdomain.com' . "\r\n" .
                  'Reply-To: no-reply@yourdomain.com' . "\r\n" .
                  'X-Mailer: PHP/' . phpversion();
    mail($formData['email'], $subjectUser, $messageUser, $headersUser);

    // Email to Admin
    $subjectAdmin = "New Contact Form Submission";
    $messageAdmin = "A new contact form submission has been received. Here are the details:\n\n" .
                    "First Name: " . $formData['first_name'] . "\n" .
                    "Last Name: " . $formData['last_name'] . "\n" .
                    "Email: " . $formData['email'] . "\n" .
                    "Phone: " . $formData['phone'] . "\n" .
                    "Message: " . $formData['message'] . "\n" .
                    "Submitted at: " . $formData['submitted_at'] . "\n\n" .
                    "Please respond to the user accordingly.";

    $headersAdmin = 'From: no-reply@yourdomain.com' . "\r\n" .
                   'Reply-To: no-reply@yourdomain.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

    foreach ($adminEmails as $adminEmail) {
        mail($adminEmail, $subjectAdmin, $messageAdmin, $headersAdmin);
    }

    echo "Thank you for your submission!";
}
?>
