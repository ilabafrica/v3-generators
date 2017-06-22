<?php
include('Pluralizer.php');

/**
* Connect to database
*/
include('UnittestsGen.php');
$servername = "localhost";
$username = "root";
$password = "xp";
$database= "homestead";

// Create connection to db
$conn = new mysqli($servername, $username, $password,$database);

//Get the tables in the DB and loop through each table obtaining the database structure
$query2="show tables";
// Perform Query
$result = mysqli_query($conn, $query2);

//Clear the routes file api.php
$myfile = fopen("api.php", "a") or die("Unable to open file!");
ftruncate($myfile, 0);
fclose($myfile);


while ($row = mysqli_fetch_assoc($result)) {
    //Generate tests;
    generateTest($conn,$row["Tables_in_".$database]);
    echo "Test for table ".$row["Tables_in_blisv3"]." has been generated\n";
    echo "--------------------------------------------------------------\n";
    getTableStructure($conn,$row["Tables_in_".$database])."\n";
    echo "Controller for table ".$row["Tables_in_blisv3"]." has been generated\n";
    echo "--------------------------------------------------------------\n";
   
}

function getTableStructure($conn,$table){
    //headers
    $controller='<?php
namespace App\Http\Controllers;
/**
* This script is used to generate controllers based on the model structure
* Created by Derrick Rono, Brian Maiyo, Ann Chemutai,
* Emmanuel Kitsao, Winnie Mbaka and Ken Mutuma
* The system is developed by @iLabAfrica Team 
* and is supported by the opensource community.
*/

use Illuminate\Http\Request;';
    $Request;
    $describe="describe ".$table;
    $table_structure = mysqli_query($conn, $describe);
    $modelName = Pluralizer::singular(ucwords(preg_replace_callback('/_([a-z]?)/', function($match) {
            return strtoupper($match[1]);
        }, $table)));
    $controller.="
use App\Models\\".$modelName.";\n\n";
    $controller.="class ".$modelName."Controller extends Controller\n{\n";

    //instantiate the index class
    $controller.="\tpublic function index()\n\t{\n\n";
    $controller.="\t  $".strtolower($modelName)."=".$modelName."::orderBy('id', 'ASC')->paginate(20);\n\n";
    $controller.="\t  return response()->json(".$modelName.");";
    $controller.="\n\t}\n\n";
    //Store function
    $controller.="
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request
    * @return \Illuminate\Http\Response
    */\n";
    $controller.="
    public function store(Request $".""."request)\n\t{\n\n";
    $rules_set="\n";
    $update_fields="\t\t\t$".strtolower($modelName)."=".$modelName."::findorfail($"."id);\n";
    $stored_fields="\t\t\t$".strtolower($modelName)."= new ".$modelName.";\n";
        while ($row2 = mysqli_fetch_assoc($table_structure)) {
        $myfile = fopen("Controllers/".$modelName."Controller.php", "w") or die("Unable to open file!");
        //$txt = generateController($row2,$modelName);
        //Generate validation rules
        if($row2['Field']=="id" || $row2['Field']=="created_at" || $row2['Field']=="updated_at" || $row2['Field']=="deleted_at"){
            
        }else{
            if($row2['Null']!='YES'){
                $rules_set.="\t\t".'"'.$row2['Field'].'"'." => 'required',\n";
            }
             //generate store objects and exlude id and other autogenerated fields
            $stored_fields.="\t\t\t$".strtolower($modelName)."->".$row2['Field']." = $"."request->input('".$row2['Field']."');\n";
            $update_fields.="\t\t\t$".strtolower($modelName)."->".$row2['Field']." = $"."request->input('".$row2['Field']."');\n";
    
        }
    }
    $controller.="
        $".""."rules=array(".$rules_set."\n\t\t);
        ";
    $controller.="$".""."validator = \\Validator::make($"."request->all(),$"."rules);\n";
    $controller.="\t\t if ($".""."validator->fails()) {\n";
    $controller.="\t\t\t return response()->json($"."validator);\n\t\t} else {\n";
    $controller.=$stored_fields."\n\t";
    $controller.="\t\ttry{\n";
    $controller.="\t\t\t\t$".strtolower($modelName)."->save();\n";
    $controller.="\t\t\t\treturn response()->json($".strtolower($modelName).");\n";
    $controller.="\t\t\t}\n";
    $controller.="\t\t\tcatch (\Illuminate\Database\QueryException $".""."e){\n";
    $controller.="\t\t\t\treturn response()->json(array('status' => 'error', 'message' => $".""."e->getMessage()));\n";
    $controller.="\t\t\t}\n";
    $controller.="\t\t}\n";
    $controller.="\t}\n";

    //Show one record function
    $controller.="
    /**
     * Display the specified resource.
     *
     * @param  int  id
     * @return \Illuminate\Http\Response
     */";
    $controller.="
    public function show($"."id){\n\t\t
    ";
    $controller.="  $".strtolower($modelName)."=".$modelName."::findorfails($"."id);\n\n";
    $controller.="\t  return response()->json($".strtolower($modelName).");";
    $controller.="\n\t}\n\n";


    //Update function
  
    $controller.="
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  request
     * @param  int  id
     * @return \Illuminate\Http\Response
     */";
    $controller.="
    public function update(Request $"."request, $"."id)\n\t{
    ";
    $controller.="
        $".""."rules=array(".$rules_set."\n\t\t);
        ";
    $controller.="$".""."validator = \\Validator::make($"."request->all(),$"."rules);\n";
    $controller.="\t\t if ($".""."validator->fails()) {\n";
    $controller.="\t\t\t return response()->json($"."validator,422);\n\t\t} else {\n";
    $controller.=$update_fields."\n\t";
    $controller.="\t\ttry{\n";
    $controller.="\t\t\t\t$".strtolower($modelName)."->save();\n";
    $controller.="\t\t\t\treturn response()->json($".strtolower($modelName).");\n";
    $controller.="\t\t\t}\n";
    $controller.="\t\t\tcatch (\Illuminate\Database\QueryException $".""."e){\n";
    $controller.="\t\t\t\treturn response()->json(array('status' => 'error', 'message' => $".""."e->getMessage()));\n";
    $controller.="\t\t\t}\n";
    $controller.="\t\t}\n";
    $controller.="\t}\n";
    
   
    
    
    //Function to delete item
    $controller.="
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    ";
    $controller.="
    public function destroy($"."id){\n\t\t
    ";
    $controller.="\ttry{\n";
    $controller.="\t\t\t$".strtolower($modelName)."=".$modelName."::findorfails($"."id);\n";
    $controller.="\t\t\t$".strtolower($modelName)."->delete();\n";
    $controller.="\t\t\treturn response()->json($".strtolower($modelName).",200);\n";
    $controller.="\t\t}\n";
    $controller.="\t\tcatch (\Illuminate\Database\QueryException $".""."e){\n";
    $controller.="\t\t\treturn response()->json(array('status' => 'error', 'message' => $".""."e->getMessage()));\n";
    $controller.="\t\t}\n";
    $controller.="\t}\n}";


   fwrite($myfile, $controller);
   fclose($myfile);
}
