/*********************************************************************
  #### Twitter Post Fetcher! ####
  Coded by Jason Mayes 2013.
  www.jasonmayes.com
  Please keep this disclaimer with my code if you use it. Thanks. :-)
  Got feedback or questions, ask here: http://goo.gl/JinwJ
  http://jsfiddle.net/abenlumley/xRwam/4/
  Ammended by Ben Lumley and djb31st 2013
  www.dijitul.com
  Ammended to display latest tweet only with links
********************************************************************/
var twitterFetcher=function(){var d=null;return{fetch:function(a,b){d=b;var c=document.createElement("script");c.type="text/javascript";c.src="http://cdn.syndication.twimg.com/widgets/timelines/"+a+"?&lang=en&callback=twitterFetcher.callback&suppress_response_codes=true&rnd="+Math.random();document.getElementsByTagName("head")[0].appendChild(c)},callback:function(a){var b=document.createElement("div");b.innerHTML=a.body;a=b.getElementsByClassName("e-entry-title");d(a)}}}();

/*
* ### HOW TO USE: ###
* Create an ID:
* Go to www.twitter.com and sign in as normal, go to your settings page.
* Go to "Widgets" on the left hand side.
* Create a new widget for "user timeline". Feel free to check "exclude replies"
* if you dont want replies in results.
* Now go back to settings page, and then go back to widgets page, you should
* see the widget you just created. Click edit.
* Now look at the URL in your web browser, you will see a long number like this:
* 345735908357048478
* Use this as your ID below instead!
*/

//READY
$(document).ready(function(){

  //GLOBALS
  var max = 1;
  var element = $("#intro_text"); 
  var mentions = '354313019863465987';
  var timeline = '354313019863465987';
  

  
//TWITTER FETCH
twitterFetcher.fetch(mentions, function(tweets){
  
  //VARS
  var x = tweets.length;
  
    //DEBUG
  //console.log(x);

  //FOR LOOP
  for(var n = 0; n < max; n++){
  
    
    //START HTML
    var html = '<div class="slide">';
    if (tweets[n].innerHTML) {
      html += tweets[n].innerHTML ;
    } else {
      html += tweets[n].textContent ;
    }
   
    //END HTML
    html += '</div>';
    
    //APPEND TWEETS
    element.append(html);
  
  //END FOR
  }
  
  //CYCLE PLUGIN
  $("#intro_text").cycle();

//END FETCH
});



//END DOC
});