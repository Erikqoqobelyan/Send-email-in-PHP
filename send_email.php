function send_notification_email(array $users): void
    {
        $subject = 'Notification: Test';
        $headers = "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: example@gmail.com\r\n" .
            "Reply-To: example@gmail.com \r\n" .
            'X-Mailer: PHP/' . phpversion();

        foreach ($users as $email => $data) {
            $first_name = $data['first_name'] ?? '';
            $last_name = $data['last_name'] ?? '';

            $message = "Hello, dear $first_name $last_name,\n\n";
            $message .= "Text example.";

            $success = mail($email, $subject, $message, $headers);

            if ($success) {
                echo "Email sent successfully to $email. (Name: $first_name $last_name)<br>";
            } else {
                echo "Failed to send email to $email. (Name: $first_name $last_name)<br>";
            }
        }
    }

    send_notification_email([
            'user1@gmail.com' => ['first_name' => 'User1', 'last_name' => 'User1'],
            'user2@gmail.com' => ['first_name' => 'User2', 'last_name' => 'User2'],
            'user3@example.com' => ['first_name' => 'user3', 'last_name' => 'user3'],
        ]);
