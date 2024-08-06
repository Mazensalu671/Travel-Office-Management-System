<?php

// include '../connection.php';

// $sqlQuery = "SELECT offices.office_id, offices.office_name, offices.office_location, offices.office_image,
// offices.bank_account , offices.office_rate , offices.date_create ,offices.office_type, offices.office_state ,
//  offices.office_details, offices.phone_number ,
//  services_table.service_name, services_table.service_image, services_table.service_current_price,
//   services_table.service_new_price,
//  services_table.service_notes, services_table.isavailable, services_table.service_type
//              FROM offices 
//              LEFT JOIN services_table ON offices.office_id = services_table.service_office ";

// $resultOfQuery = $connectNow->query($sqlQuery);

// if($resultOfQuery->num_rows > 0){
//      $allOfficesData = array();

//      while($rowFound = $resultOfQuery->fetch_assoc()){
//           $officeId = $rowFound['office_id'];
//           if (!isset($allOfficesData[$officeId])) {
//                $allOfficesData[$officeId] = array(
//                     'office_id' => $officeId,
//                     'office_name' => $rowFound['office_name'],
//                     'office_location' => $rowFound['office_location'],
//                     'office_image' => $rowFound['office_image'],
//                     'bank_account' => $rowFound['bank_account'],
//                     'office_rate' => $rowFound['office_rate'],
//                     'date_create' => $rowFound['date_create'],
//                     'office_type' => $rowFound['office_type'],
//                     'office_state' => $rowFound['office_state'],
//                     'office_details' => $rowFound['office_details'],
//                     'phone_number' => $rowFound['phone_number'],

//                     'services_table' => array()
//                );
//           }
//           if ($rowFound['service_name'] != null) {
//                $allOfficesData[$officeId]['services_table'][] = array(
//                     'service_name' => $rowFound['service_name'],
//                     'service_current_price' => $rowFound['service_current_price'],
//                     'service_new_price' => $rowFound['service_new_price'],
//                     'service_type' => $rowFound['service_type'],
//                     'service_image' => $rowFound['service_image'],
//                     'service_notes' => $rowFound['service_notes'],
//                     'isavailable' => $rowFound['isavailable'],

//                );
//           }
//      }

//      echo json_encode(
//           array("success"=> true,
//                "allOfficesData"=> array_values($allOfficesData),
//                  )
//             );

// }else{
//      echo json_encode(array("success"=> false));
// }


include 'db_conn.php';

$sqlQuery = "SELECT offices.office_id, offices.office_name, offices.office_secondname, offices.office_location, offices.office_image,
offices.bank_account , offices.office_rate , offices.date_create ,offices.office_type, offices.office_state ,
 offices.office_details, offices.phone_number ,
 services_table.service_id, services_table.service_name, services_table.service_image, services_table.service_current_price,
  services_table.service_new_price,
 services_table.service_notes, services_table.isavailable, services_table.service_type
             FROM offices 
             LEFT JOIN services_table ON offices.office_id = services_table.service_office ";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0){
     $allOfficesData = array();

     while($rowFound = $resultOfQuery->fetch_assoc()){
          $officeId = $rowFound['office_id'];
          if (!isset($allOfficesData[$officeId])) {
               $allOfficesData[$officeId] = array(
                    'office_id' => $officeId,
                    'office_name' => $rowFound['office_name'],
                    'office_secondname' => $rowFound['office_secondname'],
                    'office_location' => $rowFound['office_location'],
                    'office_image' => $rowFound['office_image'],
                    'bank_account' => $rowFound['bank_account'],
                    'office_rate' => $rowFound['office_rate'],
                    'date_create' => $rowFound['date_create'],
                    'office_type' => $rowFound['office_type'],
                    'office_state' => $rowFound['office_state'],
                    'office_details' => $rowFound['office_details'],
                    'phone_number' => $rowFound['phone_number'],

                    'services_table' => array()
               );
          }
          if ($rowFound['service_name'] != null) {
               $allOfficesData[$officeId]['services_table'][] = array(
                    'service_id' => $rowFound['service_id'],
                    'service_name' => $rowFound['service_name'],
                    'service_current_price' => $rowFound['service_current_price'],
                    'service_new_price' => $rowFound['service_new_price'],
                    'service_type' => $rowFound['service_type'],
                    'service_image' => $rowFound['service_image'],
                    'service_notes' => $rowFound['service_notes'],
                    'isavailable' => $rowFound['isavailable'],
               );
          }
     }

     echo json_encode(
          array("success"=> true,
               "allOfficesData"=> array_values($allOfficesData),
                 )
            );

}else{
     echo json_encode(array("success"=> false));
}
?>





