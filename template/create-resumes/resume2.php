<?php

//include autoloader
require_once '../../dompdf/vendor/autoload.php';
require_once '../../fun/config.php';


$num=$_GET['num'];

if(isset($_SESSION['uid'])){
    $uid=$_SESSION['uid'];
}
$res_id='2';

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
        margin-left:35px;
        margin-right:35px;
    }
    
    table{
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<!-- main table -->
<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="table-layout: fixed; width: 100%;">
    <tr>
        <td>
            <!-- full content -->
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <!-- header -->
                <tr>
                    <td style="padding-bottom:20px!important;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="padding-top:20px!important;">
                                    <div style="border-radius:10px!important; padding-bottom:1rem!important; border:1px solid #fc6262 !important; text-align:center!important;">
                                        <div style="margin-top:-15px!important; font-size:24px!important;">
                                            <h3 style="color:#fc6262!important; background:#ffffff!important; padding-left:5rem!important; padding-right:5rem!important; display:inline!important; margin-left:auto!important; margin-right:auto!important; margin-bottom:0!important;">'.$name.'</h3>
                                        </div>';
                                        if($curr_position!=''){
                                            $output.='<p style="margin-bottom:0px!important; font-size:16px!important; color:#4d0000!important;">Full Stack Developer</p>';
                                        }
                                        if($objective!=''){
                                        $output.='<div style="width:80%!important; text-align:center!important; margin-left:auto; margin-right:auto; font-size:14px!important;">
                                            <p style="margin-bottom:0!important; font-size:14px!important;">'.$objective.'</p>
                                        </div>';
                                        }
                                    $output.='</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- social links -->
                <tr>
                    <td style="padding-bottom:25px!important;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="background:#fc6262!important; padding:1rem 2rem !important; border-radius:10px!important;">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td align="left" style="padding-bottom:5px!important; width:50%!important;">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td align="right" style="width:10%">
                                                            <img src="../../img/social-img/red-dark/envelope-fill.svg" style="width:14px!important; height:14px!important;" alt="">
                                                        </td>
                                                        <td align="left" style="font-size:14px!important; color:#fff!important;">
                                                            &nbsp;&nbsp;'.$email.'
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td align="left" style="padding-bottom:5px!important;">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td align="right" style="width:10%">
                                                            <img src="../../img/social-img/red-dark/telephone-fill.svg" style="width:14px!important; height:14px!important;" alt="">
                                                        </td>
                                                        <td align="left" style="font-size:14px!important; color:#fff!important;">
                                                            &nbsp;&nbsp;'.$mobile.'
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="width:50%!important;">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td align="right" style="width:10%">
                                                            <img src="../../img/social-img/red-dark/geo-alt-fill.svg" style="width:14px!important; height:14px!important;" alt="">
                                                        </td>
                                                        <td align="left" style="font-size:14px!important; color:#fff!important;">
                                                            &nbsp;&nbsp;'.$address.'
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>';
                                            if($linkedin!=''){
                                                $output.='<td align="left">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td align="right" style="width:10%">
                                                                <img src="../../img/social-img/red-dark/linkedin.svg" style="width:14px!important; height:14px!important;" alt="">
                                                            </td>
                                                            <td align="left" style="font-size:14px!important; color:#fff!important;">
                                                                &nbsp;&nbsp;'.$linkedin.'
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>';
                                            }
                                        $output.='</tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- body -->
                <tr>
                    <td>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <!-- left -->
                                <td align="left" valign="top" style="width:50%; padding-right:20px!important;">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">';
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
                                        $output.='<!-- education -->
                                        <tr>
                                            <td style="padding-bottom:5px!important;">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td align="right" style="width:5%; padding-bottom:5px!important;"><img src="../../img/social-img/danger/mortarboard-fill.svg" alt="" style="width:20px; height:20px;"></td>
                                                                    <td align="left" style="color:#fc6262!important; font-size:20px!important;text-align:left!important; padding-bottom:5px!important; font-weight:700!important;">&nbsp;&nbsp;'.$edu_title.'</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>';
                                                    if(isset($edu_len) && $edu_len!=''){
                                                        for($i=0; $i<($edu_len-1); $i++){
                                                            $output.='<tr>
                                                                <td style="padding-bottom:15px!important;">
                                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">';
                                                                        if($edu_course[$i]!=''){
                                                                            $output.='<tr>
                                                                                <td colspan="2" style="font-size:18px; ">'.$edu_course[$i].'</td>
                                                                            </tr>';
                                                                        }
                                                                        if($edu_college[$i]!=''){
                                                                        $output.='<tr>
                                                                            <td colspan="2" style="font-size:16px;">'.$edu_college[$i].'</td>
                                                                        </tr>';
                                                                        }
                                                                        if($edu_date[$i]!='' || $edu_address[$i]!=''){
                                                                        $output.='<tr>
                                                                            <td align="left" style="font-size:14px; padding-bottom:5px!important;">'.$edu_date[$i].'</td>
                                                                            <td align="right" style="font-size:14px; padding-bottom:5px!important;">'.$edu_address[$i].'</td>
                                                                        </tr>';
                                                                        }
                                                                        if($edu_desc[$i]!=''){
                                                                        $output.='<tr>
                                                                            <td colspan="2" style="font-size:14px;">'.$edu_desc[$i].'</td>
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
                                            }else if($data_position==2){
                                    
                                                $fa_checked=false;
                                                foreach($hide_block as $fa_check){
                                                    if($fa_check==2){
                                                        $fa_checked=true;
                                                        break;
                                                    }
                                                }
                                                if($fa_checked==false){
                                        $output.='<!-- skills -->
                                        <tr>
                                            <td style="padding-bottom:15px!important;">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td align="right" style="width:5%; padding-bottom:15px!important;"><img src="../../img/social-img/danger/trophy-fill.svg" alt="" style="width:20px; height:20px;"></td>
                                                                    <td align="left" style="color:#fc6262!important; font-size:20px!important;text-align:left!important; padding-bottom:15px!important; font-weight:700!important;">&nbsp;&nbsp;'.$skill_title.'</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>';
                                                    if(isset($skill_len) && $skill_len!=''){
                                                        $output.='<tr>
                                                            <td>';
                                                                for($i=0; $i<($skill_len-1); $i++){
                                                                    $output.='<div style="background:#fc6262!important; color:#fff!important; border-radius:5px!important; font-size:14px!important; padding:2px 10px 8px !important; margin:2px 3px !important; line-height:24px!important; display:inline-block!important;">'.$skill[$i].'</div>';
                                                                }
                                                            $output.='</td>
                                                        </tr>';
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
                                        $output.='<!-- certificate -->
                                        <tr>
                                            <td style="padding-bottom:5px!important;">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td align="right" style="width:5%; padding-bottom:5px!important;"><img src="../../img/social-img/danger/certificate-fill.svg" alt="" style="width:20px; height:20px;"></td>
                                                                    <td align="left" style="color:#fc6262!important; font-size:20px!important;text-align:left!important; padding-bottom:5px!important; font-weight:700!important;">&nbsp;&nbsp;'.$cert_title.'</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>';
                                                    if(isset($cert_len) && $cert_len!=''){
                                                        for($i=0; $i<($cert_len-1); $i++){
                                                            $output.='<tr>
                                                                <td style="padding-bottom:15px!important;">
                                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">';
                                                                        if($cert_name[$i]!='' || $cert_date[$i]!=''){
                                                                            $output.='<tr>
                                                                                <td align="left" style="font-size:14px; padding-bottom:5px!important;">'.$cert_name[$i].'</td>
                                                                                <td align="right" style="font-size:14px; padding-bottom:5px!important;">'.$cert_date[$i].'</td>
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
                                        $output.='<!-- award -->
                                        <tr>
                                            <td style="padding-bottom:5px!important;">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td align="right" style="width:5%; padding-bottom:5px!important;"><img src="../../img/social-img/danger/award-fill.svg" alt="" style="width:20px; height:20px;"></td>
                                                                    <td align="left" style="color:#fc6262!important; font-size:20px!important;text-align:left!important; padding-bottom:5px!important; font-weight:700!important;">&nbsp;&nbsp;'.$award_title.'</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>';
                                                    if(isset($award_len) && $award_len!=''){
                                                        for($i=0; $i<($award_len-1); $i++){
                                                            $output.='<tr>
                                                                <td style="padding-bottom:15px!important;">
                                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">';
                                                                        if($award_name[$i]!='' || $award_date[$i]!=''){
                                                                            $output.='<tr>
                                                                                <td align="left" style="font-size:14px; padding-bottom:5px!important;">'.$award_name[$i].'</td>
                                                                                <td align="right" style="font-size:14px; padding-bottom:5px!important;">'.$award_date[$i].'</td>
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
                                        $output.='<!-- Language -->
                                        <tr>
                                            <td style="padding-bottom:20px!important;">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td align="right" style="width:5%; padding-bottom:15px!important;"><img src="../../img/social-img/danger/translate.svg" alt="" style="width:20px; height:20px;"></td>
                                                                    <td align="left" style="color:#fc6262!important; font-size:20px!important;text-align:left!important; padding-bottom:15px!important; font-weight:700!important;">&nbsp;&nbsp;'.$language_title.'</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>';
                                                            if(isset($language_len) && $language_len!=''){
                                                                for($i=0; $i<($language_len-1); $i++){
                                                                    $output.='<div style="background:#f0f1f2!important; color:black!important; border-radius:5px!important; font-size:14px!important; padding:2px 10px 8px !important; margin:2px 3px !important; line-height:24px!important; display:inline-block!important;">'.$language[$i].'</div>';
                                                                }
                                                            }
                                                        $output.='</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>';
                                                }
                                            }
                                        }
                                    $output.='</table>
                                </td>

                                <!-- right -->
                                <td align="left" valign="top" style="width:50%; padding-left:20px!important;">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">';
                                        foreach($data_pos as $data_position){
                                            if($data_position==6){

                                                $fa_checked=false;
                                                foreach($hide_block as $fa_check){
                                                    if($fa_check==6){
                                                        $fa_checked=true;
                                                        break;
                                                    }
                                                }
                                                if($fa_checked==false){
                                        $output.='<!-- work experience -->
                                        <tr>
                                            <td style="padding-bottom:5px!important;">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td align="right" style="width:5%; padding-bottom:5px!important;"><img src="../../img/social-img/danger/briefcase-fill.svg" alt="" style="width:20px; height:20px;"></td>
                                                                    <td align="left" style="color:#fc6262!important; font-size:20px!important;text-align:left!important; padding-bottom:5px!important; font-weight:700!important;">&nbsp;&nbsp;'.$exp_title.'</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>';
                                                    if(isset($exp_len) && $exp_len>1){
                                                        for($i=0; $i<($exp_len-1); $i++){
                                                            $output.='<tr>
                                                                <td style="padding-bottom:15px!important;">
                                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">';
                                                                        if($exp_pos[$i]!=''){
                                                                            $output.='<tr>
                                                                                <td colspan="2" style="font-size:18px;">'.$exp_pos[$i].'</td>
                                                                            </tr>';
                                                                        }
                                                                        if($exp_comp[$i]!=''){
                                                                            $output.='<tr>
                                                                                <td colspan="2" style="font-size:16px;">'.$exp_comp[$i].'</td>
                                                                            </tr>';
                                                                        }
                                                                        if($exp_date[$i]!='' || $exp_address[$i]!=''){
                                                                            $output.='<tr>
                                                                                <td align="left" style="font-size:14px; padding-bottom:5px!important;">'.$exp_date[$i].'</td>
                                                                                <td align="right" style="font-size:14px; padding-bottom:5px!important;">'.$exp_address[$i].'</td>
                                                                            </tr>';
                                                                        }
                                                                        if($exp_desc[$i]!=''){
                                                                            $output.='<tr>
                                                                                <td colspan="2" style="font-size:14px;">'.$exp_desc[$i].'</td>
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
                                            <td style="padding-bottom:15px!important;">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td align="right" style="width:5%; padding-bottom:15px!important;"><img src="../../img/social-img/danger/heart-fill.svg" alt="" style="width:20px; height:20px;"></td>
                                                                    <td align="left" style="color:#fc6262!important; font-size:20px!important;text-align:left!important; padding-bottom:15px!important; font-weight:700!important;">&nbsp;&nbsp;'.$interest_title.'</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>';
                                                            if(isset($interest_len) && $interest_len!=''){
                                                                for($i=0; $i<($interest_len-1); $i++){
                                                                    $output.='<div style="background:#f0f1f2!important; color:black!important; border-radius:5px!important; font-size:14px!important; padding:2px 10px 8px !important; margin:2px 3px !important; line-height:24px!important; display:inline-block!important;">'.$interest[$i].'</div>';
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
                                        $output.='<!-- Activities -->
                                        <tr>
                                            <td style="padding-bottom:5px!important;">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td align="right" style="width:5%; padding-bottom:5px!important;"><img src="../../img/social-img/danger/user-pen-solid.svg" alt="" style="width:20px; height:20px;"></td>
                                                                    <td align="left" style="color:#fc6262!important; font-size:20px!important;text-align:left!important; padding-bottom:5px!important; font-weight:700!important;">&nbsp;&nbsp;'.$activity_title.'</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>';
                                                    if(isset($activity_len) && $activity_len!=''){
                                                        for($i=0; $i<($activity_len-1); $i++){
                                                            $output.='<tr>
                                                                <td style="padding-bottom:15px!important;">
                                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">';
                                                                        if($activity_org_name[$i]!=''){
                                                                            $output.='<tr>
                                                                                <td colspan="2" style="font-size:18px;">'.$activity_org_name[$i].'</td>
                                                                            </tr>';
                                                                        }
                                                                        if($activity_name[$i]!='' || $activity_date[$i]!=''){
                                                                            $output.='<tr>
                                                                                <td align="left" style="font-size:14px; padding-bottom:5px!important;">'.$activity_name[$i].'</td>
                                                                                <td align="right" style="font-size:14px; padding-bottom:5px!important;">'.$activity_date[$i].'</td>
                                                                            </tr>';
                                                                        }
                                                                        if($activity_desc[$i]!=''){
                                                                            $output.='<tr>
                                                                                <td colspan="2" style="font-size:14px;">'.$activity_desc[$i].'</td>
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
                                            }else if($data_position==9){
                                    
                                                $fa_checked=false;
                                                foreach($hide_block as $fa_check){
                                                    if($fa_check==9){
                                                        $fa_checked=true;
                                                        break;
                                                    }
                                                }
                                                if($fa_checked==false){
                                        $output.='<!-- reference -->
                                        <tr>
                                            <td style="padding-bottom:5px!important;">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td align="right" style="width:5%; padding-bottom:5px!important;"><img src="../../img/social-img/danger/user-tie-solid.svg" alt="" style="width:20px; height:20px;"></td>
                                                                    <td align="left" style="color:#fc6262!important; font-size:20px!important;text-align:left!important; padding-bottom:5px!important; font-weight:700!important;">&nbsp;&nbsp;'.$reference_title.'</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>';
                                                    if(isset($reference_len) && $reference_len!=''){
                                                        for($i=0; $i<($reference_len-1); $i++){
                                                            $output.='<tr>
                                                                <td style="padding-bottom:15px!important;">
                                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">';
                                                                        if($reference[$i]!=''){
                                                                            $output.='<tr>
                                                                                <td style="font-size:14px;">'.$reference[$i].'</td>
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

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
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