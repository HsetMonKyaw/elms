<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once __DIR__.'/../model/instructor.php';
include_once __DIR__.'/../vender/PHPMailer/src/PHPMailer.php';
include_once __DIR__.'/../vender/PHPMailer/src/SMTP.php';
include_once __DIR__.'/../vender/PHPMailer/src/Exception.php';

class InstructorController extends Instructor{
    public function getInstructor(){
        return $this->getInstructorList();
    }
    public function addInstructor($name,$email,$phone,$address){
        return $this->createInstructor($name,$email,$phone,$address);
    }
    public function getInstructors($id)
    {
        return $this->getInstructorInfo($id);
    }
    public function editInstructor($id,$name,$email,$phone,$address)
    {
        return $this->updateInstructor($id,$name,$email,$phone,$address);
    }
    public function deleteInstructor($id)
    {
        return $this->deleteInstructorInfo($id);
    }
    public function mailInstructor($id)
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
        $mailer->Subject = "Testing for Instructor mail";
        $mailer->Body = 'testing';

        if($mailer->send())
            return true;
    }
}

?>