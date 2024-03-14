<?php 
class sqlToJson{
    function sql_to_json($rows){
        $json_output = "{";
        $count1 = 0;
        foreach($rows as $key => $value){
            if($count1!=0){
                $json_output.=",";
            }
            $count2 = 0;
            $json_output.='"'.$key.'": {';
            foreach($value as $key2 => $value2){
                $json_output.='"'.$key2.'":"'.$value2.'"';
                $count2++;
                if($count2!= count($value)){
                    $json_output.=",";
                }
            }
            $count1++;
            // if($count1!= count((array)$rows)){
                $json_output.="}";
            // }else{
                // $json_output.="}";
            // }
        }
        $json_output.="}";
        echo $json_output;
    }
<<<<<<< HEAD


    function sql_to_json_json_embedded($rows){
        $json_output = "{";
        $count1 = 0;
        foreach($rows as $key => $value){
            if($count1!=0){
                $json_output.=",";
            }
            $count2 = 0;
            $json_output.='"'.$key.'": {';
            foreach($value as $key2 => $value2){
                $json_check = json_decode($value2);
                // echo $json_check;
                if($json_check==FALSE){
                   $json_output.='"'.$key2.'":"'.$value2.'"';
                }else{
                   $json_output.='"'.$key2.'":'.$value2.'';
                }
                $count2++;
                if($count2!= count($value)){
                    $json_output.=",";
                }
            }
            $count1++;
            // if($count1!= count((array)$rows)){
                $json_output.="}";
            // }else{
                // $json_output.="}";
            // }
        }
        $json_output.="}";
        echo $json_output;
    }

    function sql_to_json_return($rows){
        // print_r($rows);
        $array_data = array();
        // $json_output = "{";
        // $count1 = 0;
        foreach($rows as $key => $value){
            // if($count1!=0){
                // $json_output.=",";
            // }
            $count2 = 0;
            // print_r($value);
            // echo "<br>";
            $json_output='{';
            foreach($value as $key2 => $value2){
                $json_output.='"'.$key2.'":"'.$value2.'"';
                $count2++;
                if($count2!= count($value)){
                    $json_output.=",";
                }
            }
            $json_output.='}';
            // echo $json_output;
            array_push($array_data ,$json_output);
            // $count1++;
            // if($count1!= count((array)$rows)){
                // $json_output.="}";
            // }else{
                // $json_output.="}";
            // }
        }
        // $json_output.="}";
        return $array_data;
    }
=======
>>>>>>> 5baa88f (final commit)
}
?>