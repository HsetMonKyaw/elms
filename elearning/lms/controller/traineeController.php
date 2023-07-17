<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once __DIR__.'/../model/trainee.php';
include_once __DIR__.'/../vender/PHPMailer/src/PHPMailer.php';
include_once __DIR__.'/../vender/PHPMailer/src/SMTP.php';
include_once __DIR__.'/../vender/PHPMailer/src/Exception.php';

class TraineeController extends Trainee{
    public function getTrainee(){
        return $this->getTraineeList();
    }
    public function addTrainee($name,$email,$phone,$city,$education,$remark,$status){
        return $this->createTrainee($name,$email,$phone,$city,$education,$remark,$status);
    }
    public function getTraineeInfos($id)
    {
        return $this->getTraineeInfo($id);
    }
    
    public function editTrainee($id,$name,$email,$phone,$city,$education,$remark,$status)
    {
        return $this->updateTrainee($id,$name,$email,$phone,$city,$education,$remark,$status);
    }
    public function deleteTrainees($id)
    {
        return $this->deleteTraineeInfo($id);
    } 

    public function mailTrainee($id)
    {
        $mailaddress=$this->getMail($id);

        $mailer=new PHPMailer(true);
        #server settings
        $mailer->SMTPDebug = SMTP::DEBUG_SERVER; //for detailed
        $mailer->isSMTP();
        $mailer->Host = 'smtp.gmail.com';
        $mailer->SMTPAuth = true;
        $mailer->SMTPSecure = 'tls';
        $mailer->Port = 587;

        $mailer->Username="hsetmon@gmail.com";
        $mailer->Password="qwmnpuutxgsadjym";

        $mailer->SetFrom("khaingswewin@hostmyanmar.net","Admin");
        $mailer->addAddress("hsetmon@gmail.com","InstructorName");

        $mailer->isHTML(true);
        $mailer->Subject = "Testing for Trainee mail";
        $mailer->Body = 'testing mail';

        if($mailer->send())
            // $sendEmail=$this->emailstatus();
            return true;
    }

    public function getRegistration()
    {
        return $this->registrationInfo();
    }
    public function addRegistration($bname,$tname,$joined_date,$status){
        return $this->createRegistration($bname,$tname,$joined_date,$status);
    }

    
    public function mailRegistration($id)
    {
        $mailaddress=$this->emailstatus($id);

        $mailer=new PHPMailer(true);
        #server settings
        $mailer->SMTPDebug = SMTP::DEBUG_SERVER; //for detailed
        $mailer->isSMTP();
        $mailer->Host = 'smtp.gmail.com';
        $mailer->SMTPAuth = true;
        $mailer->SMTPSecure = 'tls';
        $mailer->Port = 587;

        $mailer->Username="hsetmon@gmail.com";
        $mailer->Password="qwmnpuutxgsadjym";

        $mailer->SetFrom("khaingswewin@hostmyanmar.net","Admin");
        $mailer->addAddress("hsetmon@gmail.com","InstructorName");

        $mailer->isHTML(true);
        $mailer->Subject = "Testing for Registration";
        $mailer->Body = '<html>
                            <body>
                                <p>Hello '.$mailaddress['tname'].'</p>
                                <p> Batch Name : '.$mailaddress['batname'].'</p><br>
                                <p> Course Name : '.$mailaddress['coname'].'</p><br>
                                <p> Outline : '.$mailaddress['outline'].'</p><br>
                                <p> Start Date : '.$mailaddress['date'].'</p><br>
                                <p> Duration : '.$mailaddress['duration'].'</p>
                            </body>
                        </html>';
        $mailer->addEmbeddedImage('../uploads/'.$mailaddress['image'],'image');
        
        if($mailer->send())
            $sendEmail=$this->traineeMail($mailaddress['id']);
            return $sendEmail;
    }
    
    public function traineeMail($id)
    {
        return $this->traineeMailReport($id);
    }
}

?>