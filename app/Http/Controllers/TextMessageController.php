<?php

namespace Jivoni\Http\Controllers;

use Illuminate\Http\Request;

class TextMessageController extends Controller
{
     public function SendMessage()
    {
    	//Your authentication key
// String authkey = "179537A8dc5PRixK59e43aea";
//Multiple mobiles numbers separated by comma
String mobiles = "8399822464";
//Sender ID,While using route4 sender id should be 6 characters long.
String senderId = "102234";
//Your message to send, Add URL encoding here.
String message = "Test message";
//define route
String route="default";

URLConnection myURLConnection=null;
URL myURL=null;
BufferedReader reader=null;

//encoding message
String encoded_message=URLEncoder.encode(message);

//Send SMS API
String mainUrl="	";

//Prepare parameter string
StringBuilder sbPostData= new StringBuilder(mainUrl);
sbPostData.append("authkey="+authkey);
sbPostData.append("&mobiles="+mobiles);
sbPostData.append("&message="+encoded_message);
sbPostData.append("&route="+route);
sbPostData.append("&sender="+senderId);

//final string
mainUrl = sbPostData.toString();
try
{
    //prepare connection
    myURL = new URL(mainUrl);
    myURLConnection = myURL.openConnection();
    myURLConnection.connect();
    reader= new BufferedReader(new InputStreamReader(myURLConnection.getInputStream()));

    //reading response
    String response;
    while ((response = reader.readLine()) != null)
    //print response
    Log.d("RESPONSE", ""+response);

    //finally close connection
    reader.close();
}
catch (IOException e)
{
	e.printStackTrace();
}

    public function text()
    {
    	return view('textmessage');
    }


}
