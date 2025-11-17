<?php
// Form submission handler
// This is a basic example - in production, add proper validation and security

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $telegram = htmlspecialchars($_POST['telegram'] ?? '');
    $website = filter_var($_POST['website'] ?? '', FILTER_SANITIZE_URL);
    $subject = htmlspecialchars($_POST['subject'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    // Basic validation
    $errors = [];

    if (empty($name) || strlen($name) < 2) {
        $errors[] = '이름은 최소 2자 이상이어야 합니다.';
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = '유효한 이메일 주소를 입력해주세요.';
    }

    if (!empty($website) && !filter_var($website, FILTER_VALIDATE_URL)) {
        $errors[] = '유효한 웹사이트 URL을 입력해주세요.';
    }

    if (empty($errors)) {
        // In production, send email or save to database
        // For now, just redirect with success message

        // Example: Send email (uncomment and configure)
        /*
        $to = 'support@heleket.com';
        $emailSubject = $subject ?: 'New Contact Form Submission';
        $emailBody = "Name: $name\nEmail: $email\nTelegram: $telegram\nWebsite: $website\n\nMessage:\n$message";
        $headers = "From: $email";

        mail($to, $emailSubject, $emailBody, $headers);
        */

        // Redirect with success
        header('Location: /?success=1');
        exit;
    } else {
        // Redirect with errors
        $errorMsg = implode('<br>', $errors);
        header('Location: /?error=' . urlencode($errorMsg));
        exit;
    }
} else {
    // If not POST request, redirect to home
    header('Location: /');
    exit;
}
