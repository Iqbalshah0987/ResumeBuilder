<?php
//index.php
//include autoloader

require_once 'dompdf/autoload.inc.php';

require_once '../config.php';

// reference the Dompdf namespace

use Dompdf\Dompdf;
//initialize dompdf class

$document = new Dompdf();
$html = '';


if(isset($_GET['id'])){
     $_SESSION['resume_user'] = $_GET['id'];
}

$q = mysqli_query($db,"select * from resume_builder where user_id = '$user'");
if(mysqli_num_rows($q)>0) {


$r = mysqli_fetch_array($q);

$d = json_decode($r['resume_data'],true);

$basic = $d['basic'];
$social = $d['social'];
$award = $d['certification'];
$lang = $d['languages'];


//print_r($d);

$sk = rtrim($d['skills'],", ");
$sk = explode(",",$sk);

$hb = str_replace(",,",",",$d['hobby']);

$awt =  explode(",",$award['title']);
$awd =  explode(",",$award['date']);


$ltitle =  explode(",",$lang['lang']);
$level =  explode(",",$lang['level']);

$workExp = $d['workExp'];

$wtitle = explode(",",$workExp['title']);
$wcomp = explode(",",$workExp['comp']);
$wdate = explode(",",$workExp['date']);
$wloc = explode(",",$workExp['loc']);
$wachi = explode(",",$workExp['achivement']);

$eduExp = $d['eduExp'];

$etitle = explode(",",$eduExp['title']);
$ecollege = explode(",",$eduExp['college']);
$edate = explode(",",$eduExp['date']);
$eloc = explode(",",$eduExp['loc']);

    $i=0;
    if($sk!='') {
    foreach($sk as $k) { 
        if($k!='') {
        $skills .='<span class="sk">'.$k.'</span>';
        $i++;
        } 
     }
    }else{
      $skills ='<span class="sk">No Skills</span>';; 
    }
    
    if($social['link'] != '')
    $ss.='<span class="d"><img src="icons/ld.png" style="margin-right:3px;margin-top:5px;width:18px;"/>'.$social['link'].'</span>';
    
    $ss.="<br style='height:10px;'>";
    
    if($social['web'] != '')
    $ss .='<span class="d"><img src="icons/web.png" style="margin-right:3px !important;width:18px;margin-top:5px;"/>'.$social['web'].'</span>';
  
     
    if($social['git'] != '')
    $ss .='<span class="d"><img src="icons/git.png" style="margin-right:3px !important;width:18px;margin-top:5px;"/>'.$social['git'].'</span>';
    
    if($social['twitter'] != '')
    $ss .='<span class="d"><img src="icons/pt.png" style="margin-right:3px !important;width:18px;margin-top:5px;"/>'.$social['twitter'].'</span>';
     
    
    if($social['skype'] != '')
    $ss .='<span class="d"><img src="icons/sk.png" style="margin-right:3px !important;width:18px;margin-top:5px;"/>'.$social['skype'].'</span>';
    


    
        $i=0;
        while(sizeof($ltitle)!=$i){
         $langs .= '<td>
                     <p class="langs" style="font-size: 10px; padding: 6px 15px; margin: 2px 5px; line-height: 24px; display: inline-block; -webkit-print-color-adjust: exact;">'.$ltitle[$i].' </p><br>
                     <p class="ty" style="font-size: 8px;  color:#336699;  padding: 6px 15px; margin-left: 5px!important; margin-top: -10px!important; line-height: 24px; display: inline-block; -webkit-print-color-adjust: exact;">
                     '.$level[$i].'</p>
                     </td>';
        $i++; } 
                
           
        $i=0;
        while(sizeof($awt)!=$i){
              $awards .= '<td>
          <p class="langs" style="font-size: 10px; padding: 6px 15px; margin: 2px 5px; line-height: 24px; display: inline-block; -webkit-print-color-adjust: exact;">'.$awt[$i].'</p><br>
          <p class="ty" style="font-size: 8px;  color:#336699;  padding: 6px 15px;font-weight:600 !important; margin-left: 5px!important; margin-top: -10px!important; line-height: 24px; display: inline-block; -webkit-print-color-adjust: exact;">
          '.$awd[$i].'</p>
          </td>
          <td>';
         $i++; } 
       
        $w_i=0;
        while(sizeof($wtitle)!=$w_i){
            $works.='<div style="margin-bottom: 1rem;">
                          <h5 style="margin-bottom:0; font-family: Helvetica !important;font-weight:700!important ">'.$wtitle[$w_i].'</h5>
                          <h6 style="display: inline-block; margin-bottom:0; margin-top:5px; font-family: Helvetica !important; ">'.$wcomp[$w_i].'</h6>
                          <table width="100%" style="margin-top:-5px;">
                          <tr>
                          <td width="70%">
                          <span style="color:#868686;  font-style: italic !important;font-weight:600!important;font-size:13px !important;font-family: Helvetica !important;">'.$wdate[$w_i].'</span>
                          </td>
                          <td  width="20%" style="text-align:right">
                          <span style="color:#868686;  font-style: italic !important;font-weight:600!important;font-size:13px !important;font-family: Helvetica !important;">'.$wloc[$w_i].'</span>
                          </td>
                          </tr>
                          </table>
                          <p style="font-size:14px !important;font-family:Helvetica !important;font-weight:600!important; margin-top: 5px !important;margin-left:-17px !important;font-family: Helvetica !important;">
                           '.$wachi[$w_i].'
                          </p>
                      </div>';
       $w_i++; } 
         
        $e_i=0;
        while(sizeof($etitle)!=$e_i){
            
           $edu.='<div style="margin-bottom: .5rem;">
          <h5 style="margin-bottom:0; font-family: Helvetica !important;font-weight:700!important ">'.$etitle[$e_i].'</h5>
          <h6 style="display: inline-block; margin-bottom:0; margin-top:5px; font-weight:600 !important;font-family: Helvetica !important; ">'.$ecollege[$e_i].'</h6>
          <table width="100%" style="margin-top:-5px;">
              <tr>
                  <td width="70%">
                  <span style="color:#868686;  font-style: italic !important;font-weight:600 !important;font-size:13px !important;font-family: Helvetica !important;">'.$edate[$e_i].'</span>
                  </td>
                  <td  width="20%" style="text-align:right">
                  <span style="color:#868686;  font-style: italic !important;font-weight:600 !important;font-size:13px !important;font-family: Helvetica !important;">'.$eloc[$e_i].'</span>
                  </td>
              </tr>
          </table>
        </div>';
          $e_i++; }
             
    $bio = "Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.";

    
}       

//$document->loadHtml($page);

$output = ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">

<style>
  
  * {
   
    font-size: 12px;
    

  }

  table {
    
  }

  tr {
    
  }

  thead {
    display: table-header-group
  }
  .d{
  font-size: 14px; margin: 2px 2px; line-height: 24px; display: inline-block; -webkit-print-color-adjust: exact;
       font-family: Helvetica !important;
       font-size:12px !important;
       font-weight:550!important;
       margin-right:30px;
       word-wrap:break-all !important;
  }
   .sk{
       font-family: Helvetica !important;
       background:#336699; color:#ffffff; border-radius: 5px; font-size: 12px; padding: 4px 15px;  line-height: 24px; display: inline-block; -webkit-print-color-adjust: exact;
       margin-right:7px !Important;
  }
  .langs {
       font-family: Helvetica !important;
       font-size:14px !important;
       font-weight:600 !important;
  }
  .ty {
       font-family: Helvetica !important;
       font-size:12px !important;
       font-style:italic !important;
  }

  tfoot {
    display: table-footer-group
  }
  
</style>


<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse:separate; border-spacing:0 10px;margin-top:-40px !important;">
  <tr>
    <td>
      <div style="text-align: left; margin-bottom:.5rem;">
        <h1 style="color: #577ea5; margin-bottom:0px; font-size:35px!important; font-family: Helvetica !important;">'.$basic['first_name'].' '.$basic['last_name'].'</h1>
        <p style="color: #868686;margin-bottom:.5px; font-size:17px !important; font-family: Helvetica !important;">'.$basic['title'].'</p>
        <p style="margin-top: 0; margin-bottom:0; line-height:1; font-weight: 600 !important;margin-top:5px !important;font-family: Helvetica !important;font-size:13px !important">'.$basic['about'].'</p>
      </div>
    </td>
  </tr>

  <tr>
    <td>
    <div  style="align-items:center;margin-left:-40px !important;margin-right:-40px !important  font-size:14px; margin-bottom:1rem!important; padding-top:0rem; padding-bottom:-.5rem!important; border:2px solid #212529!important; border-left:none!important; border-right:none!important;">
      <div style="margin-bottom: .5rem;margin-left:30px !important;">
        <span class="d"><img src="icons/mail.png" style="margin-right:3px;margin-top:5px;width:18px;"/>'.$basic['email'].'</span>
        <span class="d"><img src="icons/m.png" style="margin-right:3px;margin-top:5px;width:18px;"/>'.$basic['phone'].'</span>
        <span class="d"><img src="icons/loc.png" style="margin-right:3px;margin-top:5px;width:18px;"/>'.$basic['address'].', '.$basic['city'].'</span>
        '.$ss.'
      </div>
    </div>
    
    </td>
  </tr>

  <tr>
    <td>
      <div style="margin-bottom: 1rem;">
        <h4 style="color: #577ea5;font-size:18px !important; font-family: Helvetica !important;  font-weight:bold!important;margin-bottom:1rem !important;">SKILLS</h4>
        
        '.$skills.'
     </div>
    </td>
  </tr>

  <tr>
    <td>
      <div style="margin-bottom: -.5rem!important;">
        <h4 style="color: #577ea5;font-size:18px !important; font-family: Helvetica !important;  font-weight:bold!important;"margin-bottom: .2rem!important;">WORK EXPERIENCE</h4>
        '.$works.'
      </div>
    </td>
  </tr>

  <tr>
    <td>
      <div style="margin-bottom: .5rem;">
        <h4 style="color: #577ea5;font-size:18px !important; font-weight:bold!important; font-family: Helvetica !important; ">EDUCATION</h4>
       '.$edu.'
      </div>
    </td>

  </tr>
   <tr>
    <td>

      <div style="margin-bottom: .5rem;;">
      <h4 style="color: #577ea5;font-size:18px !important; font-weight:bold!important; font-family: Helvetica !important; ">CERTIFICATIONS</h4>

      <table width="100%" style="margin-left:-15px">
      <tr>
         '.$awards.'
      </tr>
      
      </table>

        
      </div>
    
    </td>
  </tr>
  
  
  

  <tr>
    <td>
      <div style="margin-bottom: 0px;;">
      <h4 style="color: #577ea5;font-size:18px !important; font-weight:bold!important; font-family: Helvetica !important; ">LANGUAGES</h4>

      <table width="100%" style="margin-left:-15px">
      <tr>
      '.$langs.'
      </tr>
      </table>

      </div>
    
    </td>
  </tr>
  
  
  

</table>';

//echo $output;

$document->loadHtml($output);

//set page size and orientation

$document->setPaper('A4', 'potrait');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser

$document->stream("ResumeJobaaj", array("Attachment"=>0));
//1  = Download
//0 = Preview
?>