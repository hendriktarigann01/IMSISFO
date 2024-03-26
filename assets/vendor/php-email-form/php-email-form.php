<?php

class PHP_Email_Form {
  public $to;
  public $from_name;
  public $from_email;
  public $subject;
  public $message;
  public $headers;
  public $smtp;

  function add_message($content, $label = '') {
    $this->message .= ($label ? $label . ": " : "") . $content . "\n";
  }

  function send() {
    $this->headers = "From: $this->from_name <$this->from_email>\r\n";
    $this->headers .= "Reply-To: $this->from_email\r\n";
    $this->headers .= "MIME-Version: 1.0\r\n";
    $this->headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    if (isset($this->smtp)) {
      $this->send_smtp();
    } else {
      $this->send_mail();
    }
  }

  private function send_mail() {
    mail($this->to, $this->subject, $this->message, $this->headers);
  }

  private function send_smtp() {
    $host = $this->smtp['host'];
    $username = $this->smtp['username'];
    $password = $this->smtp['password'];
    $port = $this->smtp['port'];

    ini_set('SMTP', $host);
    ini_set('smtp_port', $port);
    ini_set('sendmail_from', $this->from_email);

    $additional_headers = "From: $this->from_name <$this->from_email>\r\n";
    $additional_headers .= "Reply-To: $this->from_email\r\n";

    mail($this->to, $this->subject, $this->message, $additional_headers);
  }
}

?>
