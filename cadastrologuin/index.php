<?php
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("dbtables.inc.php");
use_unit("db.inc.php");

//Class definition
class Page1 extends Page
{
    public $dsbuscausuarios = null;
    public $qrbuscausuarios = null;
    public $Button1 = null;
    public $Edit1 = null;
    public $Edit2 = null;
    public $Label1 = null;
    public $Label2 = null;
    public $Button2 = null;
    public $qrusuarios = null;
    public $database = null;
    public $dsusuarios = null;
    public $Label3 = null;

    function Button2Click($sender, $params)
    {
         $login = $this->Edit1->Text;
         $senha = $this->Edit2->Text;

         if(!empty($login) && !empty($senha))
         {
             $sql = "insert into usuarios (login, senha) values ('$login', '$senha')";

             $this->qrusuarios->Close();
             $this->qrusuarios->Sql = $sql;
             $this->qrusuarios->Open();
             $this->qrusuarios->Close();

             $this->Label3->Visible = true;
             $this->Label3->Caption = "Usu�rio cadastrado com sucesso!";
         }

         else if(empty($login) && !empty($senha))
         {
             $this->Label3->Visible = true;
             $this->Label3->Caption = "Falha ao cadastrar usu�rio, preencha o login!";
         }

         else if(!empty($login) && empty($senha))
         {
             $this->Label3->Visible = true;
             $this->Label3->Caption = "Falha ao cadastrar usu�rio, preencha a senha!";
         }

         $this->LimparCampos();
    }

    function Button1Click($sender, $params)
    {
         $login = $this->Edit1->Text;
         $senha = $this->Edit2->Text;

         if(!empty($login) && !empty($senha))
         {
             $query = "select count(*) from usuarios where login = '$login' and senha = '$senha'";

             $consulta = mysql_query($query);
             $resultado = mysql_fetch_array($consulta);

             if($resultado[0])
             {
                  $this->Label3->Visible = true;
                  $this->Label3->Caption = "Usu�rio encontrado no sistema!";

                  header('location: http://www.google.com');
             }

             else
             {
                  $this->Label3->Visible = true;
                  $this->Label3->Caption = "Usu�rio n�o encontrado no sistema!";
             }
         }

         else if(empty($login) && !empty($senha))
         {
             $this->Label3->Visible = true;
             $this->Label3->Caption = "Falha ao buscar usu�rio, preencha o login!";
         }

         else if(!empty($login) && empty($senha))
         {
             $this->Label3->Visible = true;
             $this->Label3->Caption = "Falha ao buscar usu�rio, preencha a senha!";
         }

         $this->LimparCampos();
    }

    function LimparCampos()
    {
         $this->Edit1->Text = '';
         $this->Edit2->Text = '';
    }
}

global $application;

global $Page1;

//Creates the form
$Page1=new Page1($application);

//Read from resource file
$Page1->loadResource(__FILE__);

$Page1->database->Connected = false;
$Page1->database->DatabaseName = "cadastrologuin";
$Page1->database->Host = "localhost";
$Page1->database->UserName = "root";
$Page1->database->UserPassword = "";
$Page1->database->Connected = true;

//Shows the form
$Page1->show();

?>