/*
 *  Place this script at event_url for your Nexmo application
 */
$method = $_SERVER['REQUEST_METHOD'];
// work with get or post
$request = array_merge($_GET, $_POST);

/*
 *  Do something for changed call status
*/
function handle_call_status()
{
  $decoded_request = json_decode(file_get_contents('php://input'), true);
  // Work with the call status
  if (isset($decoded_request['status'])) {
    switch ($decoded_request['status']) {
      case 'started':
          echo("Morning Fuckers");
          break;
      case 'answered':
          echo("I think you answered");
          break;
      case 'complete':
          //if you set eventUrl in your NCCO. The URL to download
          //the recording from is set in recording_url.
          //To download the recording
          // curl recording_url&api_key=***&api_secret=***” -o “recording.mp3”
          recording_url
          break;
      default:
          ;
  }
      return;
  }
}

/*
  Send the 200 OK to Platform and handle changes to the call
*/
switch ($method) {
  case 'POST':
    //Retrieve your dynamically generated NCCO.
    $ncco = handle_call_status();
    header("HTTP/1.1 200 OK");
    break;
  default:
    //Handle your errors
    handle_error($request);
    break;
}
