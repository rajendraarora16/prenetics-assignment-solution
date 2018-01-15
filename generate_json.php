<?php

    

    if($userDetails->policyCode != '' && $userDetails->policyCode != NULL && $userDetails->age != NULL && $userDetails->age != '') {
        header("Location: ./home.php?tag=show_report");
    }

    date_default_timezone_set("Asia/Hong_Kong");
    $date = date('Y-m-d H:i:s');

    $posts[] = array(
        'Physician'=> ucfirst($userDetails->physicianName), 
        'Patient name'=> ucfirst($userDetails->name),
        'Email' => $userDetails->email,
        'Gender' => $userDetails->gender,
        'DOB' => $userDetails->dob,
        'Age' => $userDetails->age,
        'Policyno' => $userDetails->policyCode,
        'reportA' => 'AutismNext: Analyses of 48 Genes Associated with Autism Spectrum Disorders',
        'reportB' => 'Pathogenic Mutation(s): None Detected',
        'reportC' => 'Variant(s) of Unknown Significance: None Detected',
        'reportD' => 'NEGATIVE: No Clinically Significant Variants Detected',
        'reportE' => 'Genes Analyzed: ADNP, ANKRD11, ARID1B, CACNA1C, CDKL5, CHD2, CHD7, CHD8, CNTNAP2, MED12, MEF2C',
        'signedby' => ucfirst($userDetails->physicianName).", PhD (Prenetics), FACGM, CGMBS, on ".$date
    );


    $response['reports'] = $posts;
    
    $fp = fopen("api/".$userDetails->apiGenerator."/reports.json","wb");
    fwrite($fp, json_encode($response));
    fclose($fp);

    header("Location: ./api/".$userDetails->apiGenerator."/reports.json", true, 301);
    exit();

    // $fp = fopen('/'.$userDetails->apiGenerator.'/results.json', 'w');
    // fwrite($fp, json_encode($response));
    // fclose($fp);


?>