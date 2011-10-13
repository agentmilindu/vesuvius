<?
/**
 * @name         PL User Services
 * @version      2.0
 * @package      plus
 * @author       Greg Miernicki <g@miernicki.com> <gregory.miernicki@nih.gov>
 * @about        Developed in whole or part by the U.S. National Library of Medicine
 * @link         https://pl.nlm.nih.gov/about
 * @license	 http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL)
 * @lastModified 2011.1007
 */

// INTERNAL PLUS TESTER //

$user  = "testDontDelete";
$pass  = "dontDelete99";
$email = "testCase@email.com";
$eventShortName = "test";
$personXML = "";
$xmlFormat = "TRIAGEPIC";
$number = 2;
$uuid = "pl.nlm.nih.gov/person.0";
$mcid = "0";
$newMcid = "1";

// load nusoap client library
require_once("../../3rd/nusoap/lib/nusoap.php");
require_once("unitTestLib.php");
require_once("conf.inc");

global $sites;
global $conf;
global $count;
$count = 0;
init();
if(!isset($_GET['api'])) {
	showEntry();
} else {
	$api = "&api=".$_GET['api'];

	$sites = array(
		"PL"      => "https://pl.nlm.nih.gov/?wsdl".$api,
		"PLstage" => "https://plstage.nlm.nih.gov/?wsdl".$api,
		"devGreg" => "http://plstage.nlm.nih.gov/~miernickig/vesuvius/vesuvius/www/index.php?wsdl".$api,
	);
	init2();

	// perform tests...
	switch($_GET['api']) {
		case '2.0':
			revisePerson($personXML, $uuid, $xmlFormat, $user, $pass);
			expirePerson($uuid, $user, $pass);
			getUuidByMassCasualtyId($mcid, $user, $pass);
			changeMassCasualtyId($newMcid, $uuid, $user, $pass);
			hasRecordBeenRevised($uuid, $user, $pass);
		case '1.9.9':
			getHospitalLegalese("1");
			getHospitalLegaleseAnon("1");
			getHospitalLegaleseTimestamps("1");
		case '1.9.5':
			reportPerson($personXML, $eventShortName, $xmlFormat, $user, $pass);
			createPersonUuid($user, $pass);
			createPersonUuidBatch($number, $user, $pass);
			createNoteUuid($user, $pass);
			createNoteUuidBatch($number, $user, $pass);
			search("test", "t");
			searchWithAuth("test", "t", $user, $pass);
			getSessionTimeout();
			registerUser("testCaseUser", "testCase@email.com", "testPassword99", "testCaseGiven", "testCaseFamily");
			changeUserPassword($user, $pass, $pass);
			resetUserPassword($user);
			forgotUsername($email);
			checkUserAuth($user, $pass);
			getUserStatus($user);
			getUserGroup($user);
			getEventList();
			getEventListUser($user, $pass);
			getGroupList();
			getHospitalList();
			getHospitalData("1");
			getHospitalPolicy("1");
			version();
	}
	echo "</table><h2>Note: deprecated functions are not listed/tested.</h2></body>";
}




