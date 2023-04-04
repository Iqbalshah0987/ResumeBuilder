<?php

//include autoloader
require_once '../../dompdf/vendor/autoload.php';
require_once '../../fun/config.php';


$num=$_GET['num'];

if(isset($_SESSION['uid'])){
    $uid=$_SESSION['uid'];
}
$res_id='1';

include "../supported-files/resume-fetch.php";
$user_name=str_replace(" ","-",$name);


// reference the Dompdf namespace
use Dompdf\Dompdf;

//initialize dompdf class
$document = new Dompdf();


$output='
<style>
    @page{
        margin-top:10px;
        margin-bottom:10px;
    }
    
    table{
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<!-- main table -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
    <!-- personal details -->
    <tr>
        <td>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="font-size:24px!important; text-align:left!important; font-weight:700!important; color:#0599fc!important;">'.$name.'</td>
                </tr>';
                if($curr_position!=''){
                    $output.='<tr>
                        <td style="font-size:18px!important; font-weight:700!important; text-align:left!important;">'.$curr_position.'</td>
                    </tr>';
                }
                if($objective!=''){
                    $output.='<tr>
                        <td style="font-size:15px!important; text-align:justify!important; padding-top:3px!important">'.$objective.'</td>
                    </tr>';
                }
            $output.='</table>
        </td>
    </tr>
    <!-- border -->
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="padding-top:20px!important; padding-bottom:5px!important;">
                        <div style="width:100%!important; height:3px!important; background-color:#000!important;"></div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- social details -->
    <tr>
        <td>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="left">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="right">
                                    <img src="../../img/social-img/primary/envelope-fill.svg" style="width:14px!important; height:14px!important;" alt="">
                                </td>
                                <td align="left" style="font-size:14px!important;">
                                    &nbsp;&nbsp;'.$email.'
                                </td>
                            </tr>

                        </table>
                    </td>
                    <td align="left">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="right">
                                    <img src="../../img/social-img/primary/telephone-fill.svg" style="width:14px!important; height:14px!important;" alt="">
                                </td>
                                <td align="left" style="font-size:14px!important;">
                                    &nbsp;&nbsp;'.$mobile.'
                                </td>
                            </tr>

                        </table>
                    </td>
                    <td align="left">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="right">
                                    <img src="../../img/social-img/primary/location-fill.svg" style="width:14px!important; height:14px!important;" alt="">
                                </td>
                                <td align="left" style="font-size:14px!important;">
                                    &nbsp;&nbsp;'.$address.'
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>';
                    if($website!=''){
                        $output.='<td align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="right" style="padding-top:5px!important;">
                                        <img src="../../img/social-img/primary/globe.svg" style="width:14px!important; height:14px!important;" alt="">
                                    </td>
                                    <td align="left" style="font-size:14px!important;">&nbsp;&nbsp;'.$website.'</td>
                                </tr>
                            </table>
                        </td>';
                    }
                    if($github!=''){
                        $output.='<td align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="right" style="padding-top:5px!important;">
                                        <img src="../../img/social-img/primary/github.svg" style="width:14px!important; height:14px!important;" alt="">
                                    </td>
                                    <td align="left" style="font-size:14px!important;">&nbsp;&nbsp;'.$github.'
                                    </td>
                                </tr>
                            </table>
                        </td>';
                    }
                    if($linkedin!=''){
                        $output.='<td align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="right" style="padding-top:5px!important;">
                                        <img src="../../img/social-img/primary/linkedin.svg" style="width:14px!important; height:14px!important;" alt="">
                                    </td>
                                    <td align="left" style="font-size:14px!important;">&nbsp;&nbsp;'.$linkedin.'</td>
                                </tr>
                            </table>
                        </td>';
                    }
                $output.='</tr>
            </table>
        </td>
    </tr>
    <!-- border -->
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="padding-top:5px!important; padding-bottom:20px!important;">
                        <div style="width:100%!important; height:3px!important; background-color:#000!important;"></div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>';
    foreach($data_pos as $data_position){

        if($data_position==1){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==1){
                    $fa_checked=true;
                    break;
                }
            }
            if($fa_checked==false){
    $output.='<!-- skills -->
    <tr>
        <td style="padding-bottom:10px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="font-size:20px!important; text-align:left!important; font-weight:700!important; color:#0599fc!important; padding-bottom:10px!important;">'.$skill_title.'</td>
                </tr>';
                if(isset($skill_len) && $skill_len>1){
                $output.='<tr>
                    <td>';
                            for($i=0; $i<($skill_len-1); $i++){
                                $output.='<div style="background:#1b6ae8!important; color:#fff!important; border-radius:5px!important; font-size:14px!important; padding:2px 10px 8px !important; margin:2px 3px !important; line-height:24px!important; display:inline-block!important;">'.$skill[$i].'</div>';
                            }
                    $output.='</td>
                        </tr>';
                }
            $output.='</table>
        </td>
    </tr>';
            }
        }else if($data_position==2){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==2){
                    $fa_checked=true;
                    break;
                }
            }
            if($fa_checked==false){
    $output.='<!-- work experience -->
    <tr>
        <td style="padding-bottom:5px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="font-size:20px!important; font-weight:700!important; text-align:left!important; color:#0599fc!important;">'.$exp_title.'</td>
                </tr>';
                if(isset($exp_len) && $exp_len>1){
                    for($i=0; $i<($exp_len-1); $i++){
                        $output.='<tr>
                            <td style="padding-top:3px!important; padding-bottom:15px!important;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">';
                                    if($exp_pos[$i]!=''){
                                        $output.='<tr>
                                            <td colspan="2" style="font-size:16px!important; font-weight:700!important; text-align:left!important;">'.$exp_pos[$i].'</td>
                                        </tr>';
                                    }
                                    if($exp_comp[$i]!=''){
                                        $output.='<tr>
                                            <td colspan="2" style="font-size:14px!important; font-weight:700!important; text-align:left!important; padding-bottom:2px!important">'.$exp_comp[$i].'</td>
                                        </tr>';
                                    }
                                    if($exp_date[$i]!='' || $exp_address[$i]!=''){
                                        $output.='<tr>
                                            <td style="font-size:14px!important; text-align:left!important;">'.$exp_date[$i].'</td>
                                            <td style="font-size:14px!important; text-align:right!important;">'.$exp_address[$i].'</td>
                                        </tr>';
                                    }
                                    if($exp_desc[$i]!=''){
                                    $output.='<tr>
                                        <td colspan="2" style="font-size:14px!important; text-align:left!important; padding-top:5px!important;">'.$exp_desc[$i].'</td>
                                    </tr>';
                                    }
                                $output.='</table>
                            </td>
                        </tr>';
                    }
                }
            $output.='</table>
        </td>
    </tr>';
            }
        }else if($data_position==3){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==3){
                    $fa_checked=true;
                    break;
                }
            }
            if($fa_checked==false){
    $output.='<!-- education  -->
    <tr>
        <td style="padding-bottom:5px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="font-size:20px!important; font-weight:700!important; text-align:left!important; color:#0599fc!important;">'.$edu_title.'</td>
                </tr>';
                if(isset($edu_len) && $edu_len!=''){
                    for($i=0; $i<($edu_len-1); $i++){
                    $output.='<tr>
                        <td style=" padding-top:3px!important; padding-bottom:15px!important;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">';
                                if($edu_course[$i]!=''){
                                    $output.='<tr>
                                        <td colspan="2" style="font-size:16px!important; font-weight:600!important; text-align:left!important;">'.$edu_course[$i].'</td>
                                    </tr>';
                                }
                                if($edu_college[$i]!=''){
                                    $output.='<tr>
                                        <td colspan="2" style="font-size:14px!important; font-weight:600!important; text-align:left!important; padding-bottom:2px!important">'.$edu_college[$i].'</td>
                                    </tr>';
                                }
                                if($edu_date[$i]!='' || $edu_address[$i]!=''){
                                    $output.='<tr>
                                        <td style="font-size:14px!important; text-align:left!important;">'.$edu_date[$i].'</td>
                                        <td style="font-size:14px!important; text-align:right!important;">'.$edu_address[$i].'</td>
                                    </tr>';
                                }
                                if($edu_desc[$i]!=''){
                                    $output.='<tr>
                                        <td colspan="2" style="font-size:14px!important; text-align:left!important; padding-top:5px!important;">'.$edu_desc[$i].'</td>
                                    </tr>';
                                }
                            $output.='</table>
                        </td>
                    </tr>';
                    }
                }
            $output.='</table>
        </td>
    </tr>';
            }
        }else if($data_position==4){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==4){
                    $fa_checked=true;
                    break;
                }
            }
            if($fa_checked==false){
    $output.='<!-- activities  -->
    <tr>
        <td style="padding-bottom:5px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="font-size:20px!important; font-weight:700!important; text-align:left!important; color:#0599fc!important;">'.$activity_title.'</td>
                </tr>';
                if(isset($activity_len) && $activity_len!=''){
                    for($i=0; $i<($activity_len-1); $i++){
                        $output.='<tr>
                            <td style=" padding-top:3px!important; padding-bottom:15px!important;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">';
                                if($activity_org_name[$i]!=''){
                                    $output.='<tr>
                                        <td colspan="2" style="font-size:16px!important; font-weight:600!important; text-align:left!important;">'.$activity_org_name[$i].'</td>
                                    </tr>';
                                }
                                if($activity_name[$i]!='' || $activity_date[$i]!=''){
                                    $output.='<tr>
                                        <td style="font-size:14px!important; text-align:left!important;">'.$activity_name[$i].'</td>
                                        <td style="font-size:14px!important; text-align:right!important;">'.$activity_date[$i].'</td>
                                    </tr>';
                                }
                                if($activity_desc[$i]!=''){
                                    $output.='<tr>
                                        <td colspan="2" style="font-size:14px!important; text-align:left!important;">'.$activity_desc[$i].'</td>
                                    </tr>';
                                }
                                $output.='</table>
                            </td>
                        </tr>';
                    }
                }

            $output.='</table>
        </td>
    </tr>';
            }
        }else if($data_position==5){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==5){
                    $fa_checked=true;
                    break;
                }
            }
            if($fa_checked==false){
    $output.='<!-- certifications  -->
    <tr>
        <td style="padding-bottom:5px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="font-size:20px!important; font-weight:700!important; text-align:left!important; color:#0599fc!important;">'.$cert_title.'</td>
                </tr>';
                if(isset($cert_len) && $cert_len!=''){
                    for($i=0; $i<($cert_len-1); $i++){
                        $output.='<tr>
                            <td style="padding-top:3px!important; padding-bottom:15px!important;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">';
                                if($cert_name[$i]!='' || $cert_date[$i]!=''){
                                    $output.='<tr>
                                        <td style="font-size:14px!important; text-align:left!important;">'.$cert_name[$i].'</td>
                                        <td style="font-size:14px!important; text-align:right!important;">'.$cert_date[$i].'</td>
                                    </tr>';
                                }
                                $output.='</table>
                            </td>
                        </tr>';
                    }
                }
            $output.='</table>
        </td>
    </tr>';
            }
        }else if($data_position==6){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==6){
                    $fa_checked=true;
                    break;
                }
            }
            if($fa_checked==false){
    $output.='<!-- award  -->
    <tr>
        <td style="padding-bottom:5px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="font-size:20px!important; font-weight:700!important; text-align:left!important; color:#0599fc!important;">'.$award_title.'</td>
                </tr>';
                if(isset($award_len) && $award_len!=''){
                    for($i=0; $i<($award_len-1); $i++){
                        $output.='<tr>
                            <td style="padding-top:3px!important; padding-bottom:15px!important;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">';
                                if($award_name[$i]!='' || $award_date[$i]!=''){
                                    $output.='<tr>
                                        <td style="font-size:14px!important; text-align:left!important;">'.$award_name[$i].'</td>
                                        <td style="font-size:14px!important; text-align:right!important;">'.$award_name[$i].'</td>
                                    </tr>';
                                }
                                $output.='</table>
                            </td>
                        </tr>';
                    }
                }
            $output.='</table>
        </td>
    </tr>';
            }
        }else if($data_position==7){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==7){
                    $fa_checked=true;
                    break;
                }
            }
            if($fa_checked==false){
    $output.='<!-- Interest -->
    <tr>
        <td style="padding-bottom:10px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="font-size:24px!important; text-align:left!important; font-weight:700!important; color:#0599fc!important; padding-bottom:10px!important;">'.$interest_title.'</td>
                </tr>
                <tr>
                    <td>';
                        if(isset($interest_len) && $interest_len!=''){
                            for($i=0; $i<($interest_len-1); $i++){
                                $output.='<div style="background:#f0f1f2!important; color:#000!important; border-radius:5px!important; font-size:14px!important; padding:2px 10px 8px !important; margin:2px 3px !important; line-height:24px!important; display:inline-block!important;">'.$interest[$i].'</div>';
                            }
                        }
                    $output.='</td>
                </tr>
            </table>
        </td>
    </tr>';
            }
        }else if($data_position==8){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==8){
                    $fa_checked=true;
                    break;
                }
            }
            if($fa_checked==false){
    $output.='<!-- Language -->
    <tr>
        <td style="padding-bottom:10px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="font-size:24px!important; text-align:left!important; font-weight:700!important; color:#0599fc!important; padding-bottom:10px!important;">'.$language_title.'</td>
                </tr>
                <tr>
                    <td>';
                        if(isset($language_len) && $language_len!=''){
                            for($i=0; $i<($language_len-1); $i++){
                                $output.='<div style="background:#f0f1f2!important; color:#000!important; border-radius:5px!important; font-size:14px!important; padding:2px 10px 8px !important; margin:2px 3px !important; line-height:24px!important; display:inline-block!important;">'.$language[$i].'</div>';
                            }
                        }
                    $output.='</td>
                </tr>
            </table>
        </td>
    </tr>';
            }
        }else if($data_position==9){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==9){
                    $fa_checked=true;
                    break;
                }
            }
            if($fa_checked==false){
    $output.='<!-- reference  -->
    <tr>
        <td style="padding-bottom:5px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="font-size:20px!important; font-weight:700!important; text-align:left!important; color:#0599fc!important;">'.$reference_title.'</td>
                </tr>';
                if(isset($reference_len) && $reference_len!=''){
                    for($i=0; $i<($reference_len-1); $i++){
                        $output.='<tr>
                            <td style="padding-top:3px!important; padding-bottom:15px!important;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">';
                                if($reference[$i]!=''){
                                    $output.='<tr>
                                        <td style="font-size:14px!important; text-align:left!important;">'.$reference[$i].'</td>
                                    </tr>';
                                }
                                $output.='</table>
                            </td>
                        </tr>';
                    }
                }
            $output.='</table>
        </td>
    </tr>';
            }
        }
    }

$output.='</table>
';



//echo $output;
$document->loadHtml($output);

//set page size and orientation
$document->setPaper('A4', 'potrait');

//Render the HTML as PDF
$document->render();

//Get output of generated pdf in Browser
$document->stream($user_name, array("Attachment"=>$num));

//1  = Download
//0 = Preview
?>