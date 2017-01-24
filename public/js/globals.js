// var SERVER = 'https://www.giftxoxo.com'
SERVER = 'http://52.74.236.98'
SERVER2 = 'http://52.74.236.98/index.php?route=app2/common/run'
defaultCountry = '99'
defaultCity = SERVER.indexOf("giftxoxo")!==-1? '1319' : '3'

if(!localStorage.currentCountry)
	localStorage.setItem('currentCountry',defaultCountry)

if(!localStorage.currentCity)
{
	localStorage.setItem('currentCity',defaultCity)
	localStorage.setItem('currentCityName','Bangalore')
}

getQueryStringParameters = function()
{
    var json = {}
    location.href.split('?')[1].split('&').map(function(element)
    {
        element = decodeURIComponent(element).replace(/#/g,'')
        var keyAndValue = element.split('=')
        json[keyAndValue[0]] = keyAndValue[1]
    })
    return json
}

$.ajaxSetup({
	url : SERVER2,
	method : 'post',
	dataType : 'json',
	beforeSend : function(request)
	{
		if(localStorage.AuthToken)
			request.setRequestHeader('token',localStorage.AuthToken)
	},
	error : function(xhr,status,error)
	{
		console.log(xhr+' : '+status+' : '+error.toString())
	}
})	

requestAPI  = function(method, callBack, params = {})
{
	$.ajax({
		url : SERVER2,
		method : 'post',
		dataType : 'json',
		data : {
			method : method,
			data : JSON.stringify(params)
		},
		beforeSend : function(request)
		{
			request.setRequestHeader('token',localStorage.AuthToken)
		},
		async : false,
		success : function(response)
        {
			callBack(response);
		},
		error : function(xhr,status,error)
		{
			console.log(xhr+' : '+status+' : '+error.toString())
		}
	})	
}

$.LoadingOverlaySetup({
    color           : "rgba(0, 0, 0, 0.4)",
    image           : "/img/loading.gif",
    maxSize         : "80px",
    minSize         : "20px",
    resizeInterval  : 0,
    size            : "50%"
})

$(document).ajaxStart(function()
{
    $.LoadingOverlay("show")
})

$(document).ajaxStop(function()
{
    $.LoadingOverlay("hide")
})

