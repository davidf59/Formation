<?php
namespace Models;

use \Mailjet\Resources;

 class Mail {
  private $Mail_expediteur = 'pierrickhauguel@outlook.com';
  private $Mail_destinataire;
  private $Mj;
  private $Body =[
                        'Messages' => [
                          [
                          'From' => [
                             'Email' => "",
                             'Name' => "David"
                          ],
                          'To' => [
                            [
                           'Email' => "",
                           'Name' => "David"
                            ]
                          ],
                          'Subject' => "",
                          'TextPart' => "Commande validee",
                          'HTMLPart' => "",
                          'CustomID' => "AppGettingStartedTest"
                          ]
                        ]   
                      ];

  function __construct($Maildest){
    $this->Mail_destinataire = $Maildest;
    $this->Mj = new \Mailjet\Client('7f855891bc811a7cf507c0f004703e46','6acf884f7556fab5e65c41c162cd8a0f',true,['version' => 'v3.1']);
  } 

  function sendmail($objet,$corps) {
    $email=$this->Body;
    $email['Messages']['From']['Email'] = $this->Mail_expediteur;
    $email['Messages']['To']['Email'] = $this->Mail_destinataire;
    $email['Messages']['Subject'] = $objet;
    $email['Messages']['HTMLPart'] = $corps;

    $response = $this->Mj->post(Resources::$Email, ['body' => $email]);
    $response->success() && print_r($response->getData());
    return true;
  }
}