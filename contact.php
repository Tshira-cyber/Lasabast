<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Adresse où le message sera envoyé
    $to = "chiraclasaba@gmail.com"; // Remplace par ton adresse e-mail
    $subject = "Nouveau message de $name";
    $body = "Nom : $name\nE-mail : $email\n\nMessage :\n$message";
    $headers = "From: $email";

    // Envoyer l'email
    if (mail($to, $subject, $body, $headers)) {
        // Envoyer un e-mail de confirmation au visiteur
        $visitorSubject = "Nous avons bien reçu votre message";
        $visitorBody = "Bonjour $name,\n\nMerci pour votre message ! Nous vous répondrons dès que possible.\n\nCordialement,\nL'équipe du site.";
        $visitorHeaders = "From: noreply@example.com";

        mail($email, $visitorSubject, $visitorBody, $visitorHeaders);

        // Rediriger vers merci.html
        header("Location: merci.html");
        exit();
    } else {
        echo "Erreur : Le message n'a pas pu être envoyé.";
    }
}
?>