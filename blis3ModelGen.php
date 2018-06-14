<?php
// todo: strtolower(str) not the standard lower only the first letter
// todo: several fixes on indentins before any further ado


$models = [
"Instrument",
// "QualityControlResult",
// "QualityControlTest",
// "QualityControlMeasureRange",
// "QualityControlMeasure",
// "Lot",
// "QualityControl",
// "AdhocCategory",
// "AdhocOption",
// "AnalyticSpecimenRejection",
// "AnalyticSpecimenRejectionReason",
// "Antibiotic",
// "AntibioticSusceptibility",
// "Breed",
// "Counter",
// "EncounterClass",
// "Encounter",
// "EncounterStatus",
// "Gender",
// "Interpretation",
// "Location",
// "MaritalStatus",
// "Measure",
// "MeasureRange",
// "MeasureType",
// "Permission",
// "PreAnalyticSpecimenRejection",
// "ReferralReason",
// "RejectionReason",
// "Result",
// "Role",
// "SpeciesBreed",
// "Species",
// "SpecimenStatus",
// "SpecimenType",
// "SusceptibilityBreakPoint",
// "SusceptibilityRange",
// "Telecom",
// "TestPhase",
// "TestStatus",
// "TestTypeCategory",
];


foreach ($models as $key => $value) {
    echo "-------------------------".$value."\tcreated\n";
    //headers
    $model="<?php
namespace App\Models;
/**
 * (c) @iLabAfrica
 * BLIS\t\t\t - a port of the Basic Laboratory Information System (BLIS) to Laravel.
 * Team Lead\t - Emmanuel Kweyu.
 * Devs\t\t\t - Brian Maiyo|Ann Chemutai|Winnie Mbaka|Ken Mutuma|Anthony Ereng
 */

use Illuminate\Database\Eloquent\Model;

class ".$value." extends Model
{
\t//
}";

    $myfile = fopen("/var/www/Blis-V3/app/Models/".$value.".php", "w") or die("Unable to open file!");

    fwrite($myfile, $model);
    fclose($myfile);
}
