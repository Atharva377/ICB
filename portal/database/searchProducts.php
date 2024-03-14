<?php
    include "../config.php";
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }

    $query = $_GET["query"];
    $query = preg_replace('/\p{P}/', '', $query);
    // echo $query;
    $query = preg_replace('/\s+/', ' ', $query);
    $words = explode(" ", $query);

    
    // echo implode(",", $words);
    include "../sql_to_json.php";
    
    $results = [];


    for($i=0;$i<count($words);$i++){
        // echo $words[$i];
        $sql = "select * from searchProduct where product_name like '%".$words[$i]."%' or prod_id like '%".$words[$i]."%' or company_name like '%".$words[$i]."%';";
        $rows  = mysqli_query($mysqli,$sql) or die("error in fetching data");
        // while($)
            
        // $count = 0;
        // foreach($rows as $key => $value){
            // echo $count++;
        // print_r($value);
        // echo "<br>";
        // break;
        // }
        $converter = new sqlToJson();
        $data = $converter->sql_to_json_return($rows);
        // echo implode(";",$data)."<br>";
        for($j=0;$j<count($data);$j++){
            array_push($results, $data[$j]);
            // echo $data[$j]."<br>";
            $results = array_combine($results, $results);
        }
        // break;
    }


    // $unique_data = $results;
    $unique_data = array_combine($results, $results);
    // echo implode(", ",$unique_data);
    // foreach($unique_data as $key => $value){
    //     echo $value;
    // }
    if(count($unique_data)<1){
        mysqli_close($mysqli);
        echo "No product found";
        // http_response_code(404);
    }else{
        if(count($unique_data)==1){
            echo '{"0": '.implode(",",$unique_data)."}";
        }else{
            $fetchedList = "{";
            $count = 0;
            foreach($unique_data as $key => $value){
                $fetchedList.='"'.$count.'":'.$value;
                $count++;
                if($count!=count($unique_data)){
                    $fetchedList.=", ";
                }
            }
            // for($i=0;$i<count($unique_data);$i++){
            //     $fetchedList.='"'.$i.'":'.$unique_data[$i];
            //     // echo implode("", $unique_data);
            //     if($i!=count($unique_data)-1){
            //         $fetchedList.=", ";
            //     }
            // }
        $fetchedList.="}";
        echo $fetchedList;
        // $fetchedList.="}";
        mysqli_close($mysqli);
    }}
    // echo $fetchedList;
    // }
?>