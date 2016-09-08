$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'GET':
    //Retrieve with the parameters in this request
    $to = $request['to']; //The endpoint being called
    $from = $request['from']; //The endpoint you are calling from
    $uuid = $request['conversation_uuid']; //The unique ID for this Call

    //For more advanced Conversations you use the paramaters to personalize the NCCO
    //Dynamically create the NCCO to run a conversation from your virtual number
    if( $to == "447520632007")
      $ncco='[
      {
        "action": "talk",
        "text": "Hello Fuckers, welcome to a Call made with Voice API"
      }
      ]';
    else
      $ncco='[
      {
        "action": "talk",
        "text": "Hello Support, welcome to a Call made with Voice API"
      }
      ]';

    header('Content-Type: application/json');
    echo $ncco;
    break;
  default:
    //Handle your errors
    handle_error($request);
    break;
}