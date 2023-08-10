<?php
  $vezeteknev = htmlspecialchars($_POST['vezeteknev']);
  $keresztnev = htmlspecialchars($_POST['keresztnev']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $details = htmlspecialchars($_POST['details']);
  if(!empty($email) && !empty($details)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "csernilevente@gmail.com"; //enter that email address where you want to receive all messages
      $subject = "Árajánlat kérelem: $vezeteknev $keresztnev - $email";
      $body = "Teljes név: $vezeteknev $keresztnev\nEmail cím: $email\nTelefonszám: $phone\nRészletek:\n$details\n\nÜdvözlettel,\n$vezeteknev $keresztnev";
      $sender = "Küldve innen: $email";
      if(mail($receiver, $subject, $body, $sender)){
         echo "Kérés elküldve.";
      }else{
         echo "Sajnáljuk, üzenet küldése sikertelen!";
      }
    }else{
      echo "Adjon meg egy létező email címet!";
    }
  }else{
    echo "Email és részletek kitöltése kötelező!";
  }
?>