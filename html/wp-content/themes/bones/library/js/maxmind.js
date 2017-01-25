var onSuccess = function(location){
  console.log(
      "Lookup successful:\n\n"
      + JSON.stringify(location, undefined, 4)
  );
  
  var ip = location.traits.ip_address;
  var city = location.city.names.en;
  var cityConf = location.city.confidence || 0;
  
  var zip = location.postal.code;
  var zipConf = location.postal.confidence || 0;
  
  $(".code-sandbox#maxmind").text("Your city is " + city + ". Maxmind is " + cityConf + "% sure.\n" + "Your zipcode is "  + zip + ". Maxmind is " + zipConf + "% sure.");
};
 
var onError = function(error){
  console.log(
      "Error:\n\n"
      + JSON.stringify(error, undefined, 4)
  );
};

geoip2.insights(onSuccess, onError);