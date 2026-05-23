<?php
if(isset($_POST['email'])) {
    $email_to = "myName@myMail.fi"; /* Kirjoita tähän sähköpostiosoite johon lomake lähetetään.*/
    $email_subject = "Palautelomake"; 
    
    function alert_died($_email,$_message) {
        $domain_name = 'https://my.wikipedia.org/wiki/%E1%80%97%E1%80%9F%E1%80%AD%E1%80%AF%E1%80%85%E1%80%AC%E1%80%99%E1%80%BB%E1%80%80%E1%80%BA%E1%80%94%E1%80%BE%E1%80%AC';
        if (strlen($_message) > 10) {
            $_message = substr($_message,0,200);
        }
        
        echo "<script>alert('YOUR FEEDBACK WAS REJECTED & DELETED!');</script>";
        //
        $spam_headers   = array();
        $spam_headers[] = "MIME-Version: 1.0";
        $spam_headers[] = "Content-type: text/plain; charset=utf-8";
        $spam_headers[] = "From: {$_email}";
        $spam_headers[] = "Reply-To: {$_email}";
        $spam_headers[] = "X-Mailer: PHP/".phpversion();
        $spam_subject = "Wicked feedback!!!";
        $spam_message .= 'You are spammer ! Get the @$%K out.';
        mail($_email, $spam_subject, $spam_message, implode("\r\n", $spam_headers));
        //
        echo "<script type='text/javascript'>window.location.href = '$domain_name';</script>";
        die();
    }   
    
    function died($_message) {
        echo "<script>alert('$_message');</script>";
        echo "<script type='text/javascript'>window.history.go(-1);</script>";      
        die();
    }
    
    // Tarkista
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('Pahoittelemme ongelmia lomakkeen lähettämisessä.');       
        }
 
    $my_name = $_POST['name'];      // Pakollinen
    $email_from = $_POST['email'];  // Pakollinen
    $message = $_POST['message'];   // Pakollinen
 
    $alert_message = "";
    $error_message = "";
    
    //=========================================================================
    // Estä lomakkeen lähetys jos lähettäjän osoitteessa esiintyy seuraavia.
    // Poista tarpeettomat / lisää uusia.
    //=========================================================================
    if ((preg_match("/.ru/",            $email_from)) ||
        (preg_match("/aol/",            $email_from)) ||
        (preg_match("/adamsalehworldwide/", $email_from)) ||
        (preg_match("/electricinsurance/",  $email_from)) ||
        (preg_match("/girl/",           $email_from)) ||
        (preg_match("/hdbinsurance/",   $email_from)) ||
        (preg_match("/mac/",            $email_from)) ||
        (preg_match("/mdhnetwork/",     $email_from)) ||
        (preg_match("/me/",             $email_from)) ||
        (preg_match("/naver/",          $email_from)) ||
        (preg_match("/.online/",        $email_from)) ||
        (preg_match("/plastiq/",        $email_from)) ||
        (preg_match("/stardatagroup/",  $email_from)) ||
        (preg_match("/sunsports1988/",  $email_from)) ||
        (preg_match("/yandex/",         $email_from)) ||
        (preg_match("/yahoo/",          $email_from)) ||
        (preg_match("/yourmail/",       $email_from))){
        $alert_message .= 'Kiitos! Emme vastaa viestiisi.';
    }
    
    //=========================================================================
    // Estä lomakkeen lähetys seuraavilla ehdoilla.
    //=========================================================================
    if ((preg_match("/.ru/",            $email_from)) &&
        (preg_match("/.com/",           $message))){
        $alert_message .= 'Kiitos! Emme vastaa viestiisi.';
    }   
    if ((preg_match("/gmail/",          $email_from)) &&
        (preg_match("/.com/",           $message))){
        $error_message .= 'Huomautus! Älä laita verkko-osoitetta tekstikenttään.';
    }   
    if ((preg_match("/gmail/",          $email_from)) &&
        (preg_match("/www./",           $message))){
        $error_message .= 'Huomautus! Älä laita verkko-osoitetta tekstikenttään.';
    }
    //=========================================================================
    // Estä lomakkeen lähetys jos viestiosassa löytyy seuraavia.
    // Poista tarpeettomat / lisää uusia.
    //=========================================================================
    if ((preg_match("/.ru/",            $message)) ||
        (preg_match("/sex/",            $message)) ||
        (preg_match("/about/",          $message)) ||
        (preg_match("/accountservices/",$message)) ||
        (preg_match("/Adidas/",         $message)) ||
        (preg_match("/adidas/",         $message)) ||
        (preg_match("/also/",           $message)) ||
        (preg_match("/ and /",          $message)) ||
        (preg_match("/androidspacy/",   $message)) ||
        (preg_match("/article/",        $message)) ||
        (preg_match("/auto-agentur/",   $message)) ||
        (preg_match("/binding/",        $message)) ||
        (preg_match("/bonus/",          $message)) ||
        (preg_match("/Bonus/",          $message)) ||
        (preg_match("/book/",           $message)) ||
        (preg_match("/Book/",           $message)) ||
        (preg_match("/case/",           $message)) ||
        (preg_match("/casino/",         $message)) ||
        (preg_match("/charlestongroup/",$message)) ||
        (preg_match("/dating/",         $message)) ||
        (preg_match("/Dating/",         $message)) ||
        (preg_match("/dog/",            $message)) ||
        (preg_match("/Dog/",            $message)) ||
        (preg_match("/.edu/",           $message)) ||
        (preg_match("/electricinsurance/",  $message)) ||
        (preg_match("/elements/",       $message)) ||
        (preg_match("/erotic/",         $message)) ||
        (preg_match("/especially/",     $message)) ||
        (preg_match("/expensive/",      $message)) ||
        (preg_match("/ free /",         $message)) ||
        (preg_match("/ Free /",         $message)) ||
        (preg_match("/ FREE /",         $message)) ||
        (preg_match("/ from /",         $message)) ||
        (preg_match("/ From /",         $message)) ||
        (preg_match("/game/",           $message)) ||
        (preg_match("/Game/",           $message)) ||
        (preg_match("/Garcinia/",       $message)) ||
        (preg_match("/garcinia/",       $message)) ||
        (preg_match("/girl/",           $message)) ||
        (preg_match("/Girl/",           $message)) ||
        (preg_match("/gmail.com/",      $message)) ||
        (preg_match("/googlee/",        $message)) ||
        (preg_match("/googlee.te/",     $message)) ||
        (preg_match("/handwritten/",    $message)) ||
        (preg_match("/health/",         $message)) ||
        (preg_match("/http:/",          $message)) ||
        (preg_match("/https:/",         $message)) ||
        (preg_match("/ in /",           $message)) ||
        (preg_match("/ is /",           $message)) ||
        (preg_match("/italy-mail/",     $message)) ||
        (preg_match("/jelly/",          $message)) ||
        (preg_match("/late/",           $message)) ||
        (preg_match("/libido/",         $message)) ||
        (preg_match("/make money/",     $message)) ||
        (preg_match("/manuscript/",     $message)) ||
        (preg_match("/manuscripts/",    $message)) ||
        (preg_match("/material/",       $message)) ||
        (preg_match("/medical/",        $message)) ||
        (preg_match("/mjdoherty2230/",  $message)) ||
        (preg_match("/Mp3/",            $message)) ||
        (preg_match("/Mp4/",            $message)) ||
        (preg_match("/Nike/",           $message)) ||
        (preg_match("/ number /",       $message)) ||
        (preg_match("/ of /",           $message)) ||
        (preg_match("/optimizer/",      $message)) ||
        (preg_match("/only/",           $message)) ||
        (preg_match("/oral/",           $message)) ||
        (preg_match("/pills/",          $message)) ||
        (preg_match("/Porn/",           $message)) ||
        (preg_match("/Ray-Ban/",        $message)) ||
        (preg_match("/save/",           $message)) ||
        (preg_match("/Save/",           $message)) ||
        (preg_match("/sale/",           $message)) ||
        (preg_match("/Sale/",           $message)) ||
        (preg_match("/search engines/", $message)) ||
        (preg_match("/see/",            $message)) ||
        (preg_match("/SEO/",            $message)) ||
        (preg_match("/shipping/",       $message)) ||
        (preg_match("/Shipping/",       $message)) ||
        (preg_match("/shoes/",          $message)) ||
        (preg_match("/store/",          $message)) ||
        (preg_match("/sunsports1988/",  $message)) ||
        (preg_match("/Sunglasses /",    $message)) ||
        (preg_match("/term/",           $message)) ||
        (preg_match("/text/",           $message)) ||
        (preg_match("/testosteron/",    $message)) ||
        (preg_match("/ the /",          $message)) ||
        (preg_match("/tmstitanium/",    $message)) ||
        (preg_match("/viagra/",         $message)) ||
        (preg_match("/www./",           $message)) ||
        (preg_match("/vk.com/",         $message)) ||
        (preg_match("/И/",              $message)) ||
        (preg_match("/и/",              $message)) ||
        (preg_match("/Д/",              $message)) ||
        (preg_match("/д/",              $message)) ||
        (preg_match("/9binaryoptions/", $message))){
        $alert_message .= 'Kiitos! Emme vastaa viestiisi.';
    }
    else {
        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
        if(!preg_match($email_exp,$email_from)) {
            $error_message .= 'Virheellinen tai puuttuva sähköpostiosoite.'.'\r\n';
        }
        $string_exp = "/^[A-Za-z .'-]+$åÅäÄöÖ/";
        if(!preg_match($string_exp,$my_name)) {
            $error_message .= 'Virheellinen tai puuttuva nimi.'.'\r\n';
        }
        if(strlen($message) < 3) {
            $error_message .= 'Virheellinen tai puuttuva viesti.'.'\r\n';
        }
    }
    
    if(strlen($alert_message) > 0) {
        alert_died($email_from,$message);
    }   
    
    if(strlen($error_message) > 0) {
        died($error_message);
    }
    
    if(strlen($message) > 200) {
        $error_len = 'Liian pitkä viesti.'.'\r\n';
        died($error_len);
    }
    
    $email_message = "Lomakkeen tiedot.\n\n";

    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
        }
 
    $email_message .= "Nimi: ".clean_string($my_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Viesti: ".clean_string($message)."\n";
    
    $headers   = array();
    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-type: text/plain; charset=utf-8";
    $headers[] = "From: {$email_from}";
    $headers[] = "Reply-To: {$email_from}";
    $headers[] = "X-Mailer: PHP/".phpversion(); 
    
    mail($email_to, $email_subject, $email_message, implode("\r\n", $headers));
    
    $viesti = "Kiitos! Vastaamme viestiisi mahdollisimman pian.";
    echo "<script>alert('$viesti');</script>";
    echo "<script type='text/javascript'> window.location.href = './index.html'; </script>";
}
 
?>