/* This styleswitcher code is taken in its entirety  from:
http://www.mensching.info/program/mootools-styleswitcher-en.html - the website of Achim Mensching */
function styleswitch(mode, setstyle){
	var stylepath = 'templates/flowerpower/css/';
    // setting the path to the CSS directory
    
/* --------------------- No Need to change anything below this line -------------------------------------------*/
    var i, a;
    var cookstyle = Cookie.get('Stylesheet');
    // getting current cookie value for the stylesheet 
    if (cookstyle == false ) {
                              for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
                              if(a.getAttribute("rel").indexOf('style') != -1
                              && a.getAttribute("media").indexOf('screen') != -1
                              && a.getAttribute("title")
                              // find default stylesheet, which is defined in the head section of the document
                              ) {
                                cookstyle = a.getAttribute("title"); 
                                Cookie.set('Stylesheet', cookstyle, {duration:365, path:'/'});
                                //set the default stylesheet as a cookie value
                                }
                               }
                             }
                             
    switch (mode) {
                  case 'set':
                    new Asset.css(stylepath + setstyle +'.css', {id: setstyle});
                    // loads the new stylesheet
                    Cookie.set('Stylesheet', setstyle, {duration:365, path:'/'});
                    // sets the active stylesheet into a cookie value
                  break;
                case 'noset':
                    new Asset.css(stylepath + setstyle +'.css', {id: setstyle});
                    // only apply the new stylesheet, without saving it in a cookie value
                    break;
                default:
                    setstyle = cookstyle
                    new Asset.css(stylepath + cookstyle +'.css', {id: cookstyle});
                    // sets the current cookie value as active stylesheet
                   break;
				   }
  return null;
  }

  window.addEvent('domready', styleswitch);