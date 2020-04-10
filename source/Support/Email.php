<?php

    namespace Source\Support;

    use Exception;
    use stdClass;
    use PHPMailer\PHPMailer\PHPMailer;

    class Email 
    {
        /** @var PHPMailer */
        private $mail;
        
        /** @var stdClass */
        private $data;

        /** @var Exception */
        private $error;

        public function __construct()
        {
            $this->mail = new PHPMailer(true);
            $this->data = new stdClass();

            $this->mail->isSMTP();
            $this->mail->isHTML();
            $this->mail->setLanguage("br");

            $this->mail->SMTPAuth = true;
            $this->mail->SMTPSecure = "tls";
            $this->mail->CharSet = "utf-8";

            $this->mail->Host = CONF_SMTP_MAIL["host"];
            $this->mail->Port = CONF_SMTP_MAIL["port"];
            $this->mail->Username = CONF_SMTP_MAIL["user"];
            $this->mail->Password = CONF_SMTP_MAIL["pass"];
        }

        public function add(string $subject, string $body, string $recipent_name, string $recipent_email) : Email
        {
            $this->data->subject = $subject;
            $this->data->body = $body;
            $this->data->recipent_name = $recipent_name;
            $this->data->recipent_email = $recipent_email;

            return $this;
        }

        public function attach(string $filePath, string $fileName): Email
        {
            $this->data->attach[$filePath] = $fileName;
            return $this;            
        }

        public function send(string $from_name = CONF_SMTP_MAIL["from_name"], string $from_email = CONF_SMTP_MAIL["from_email"]):bool
        {
            try{

                $this->mail->Subject = $this->data->Subject;
                $this->mail->msgHTML($this->data->body);
                $this->mail->addAddress($this->data->recipent_email, $this->data->recipent_name);
                $this->mail->setFrom($from_email, $from_name);

                if(!empty($this->data->attach)){
                    foreach($this->data->attach as $path => $name){
                        $this->mail->addAttachment($path,$name);
                    }
                }

                $this->mail->send();
                return true;

            }catch(Exception $exception){
                $this->error  = $exception;
                return false;
            }
        }

        public function error(): ?Exception
        {
            return $this->error;
        }

    }
    